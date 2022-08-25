<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Tampil Data Pengguna',['only' => 'index']);
        $this->middleware('permission:Buat Data Pengguna',['only' => 'create','store']);
        $this->middleware('permission:Ubah Data Pengguna',['only' => 'edit','update']);
        $this->middleware('permission:Hapus Data Pengguna',['only' => 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = [];
        if ($request->has('keyword')) {
            $users = User::search($request->keyword)->get();
        }else {
            $users = User::all();
        }
        return view('users.index',[
            'users' => $users,
        ]);
    }

    public function selectRole(Request $request)
    {
        $roles = Role::select('id', 'name')->limit(7);
        if ($request->has('q')) {
            $roles->where('name','LIKE', "%{$request->q}%");
        }

        return response()->json($roles->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            "name" => "required|string|max:30",
            "role" => "required",
            'email' => "required|email|unique:users,email",
            "password" => "required|min:6|confirmed"
        ],[
            'name.required' => 'Nama Wajib Diisi !',
            'name.string' => 'Karakter Nama Berupa Huruf !',
            'name.max' => 'Karakter Nama Maksimal 30 !',
            'role.required' => 'Hak Akses Wajib Diisi !',
            'email.required' => 'Email Wajib Diisi !',
            'email.email' => 'Harap Isi Email Dengan Format "@" Email !',
            'email.unique' => 'Email Sudah Ada !',
            'password.required' => 'Password Wajib Diisi !',
            'password.min' => 'Password Minimal 6 Karakter !',
            'password.confirmed' => 'Konfirmasi Password Tidak Sesuai',
        ]);


        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $user->assignRole($request->role);
            return redirect()->route('users.index');
        } catch (\Throwable $th) {
            DB::rollback();
            $request['role'] = Role::select('id','name')->find($request->role);
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }finally{
            DB::commit();
        }
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit',[
            'user' => $user,
            'roleSelected' => $user->id,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(),[
            "role" => "required",
        ],[
            'role.required' => 'Hak Akses Wajib Diisi !',
        ]);

        DB::beginTransaction();
        try {
            $user->syncRoles($request->role);
            Alert::success('Data Pengguna', 'Berhasil Diubah !');
            return redirect()->route('users.index');
        } catch (\Throwable $th) {
            DB::rollback();
            Alert::error('Data Pengguna', 'Gagal Diubah !');
            $request['role'] = Role::select('id','name')->find($request->role);
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }finally{
            DB::commit();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        DB::beginTransaction();
        try {
            if ('roles' == $user->first()) {
                $user->removeRole($user->roles->first());
            }else {
                $user->delete();
            }
        } catch (\Throwable $th) {
            DB::rollBack();
        }finally{
            DB::commit();
            return redirect()->back();
        }
    }
}
