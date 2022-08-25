<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Tampil Data Hak Akses',['only' => 'index']);
        $this->middleware('permission:Ubah Data Hak Akses',['only' => 'edit','update']);
        $this->middleware('permission:Detail Data Hak Akses',['only' => 'show', 'create','store']);
        $this->middleware('permission:Hapus Data Hak Akses',['only' => 'role_delete']);
    }

    private $perPage = 6;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = [];
        if ($request->has('keyword')) {
            $roles = Role::where('name', 'LIKE', "%{$request->keyword}%")->paginate($this->perPage);
        }else {
            $roles = Role::paginate($this->perPage);
        }
        return view('role.index',[
            'roles' => $roles->appends(['keyword' => $request->keyword]),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('role.create',[
            'authorities' => config('permission.authorities'),
        ]);
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
            'name' => "required|string|max:50|unique:roles,name",
            'permissions' => 'required',
        ],[
            'name.required' => 'Nama Wajib Diisi !',
            'name.string' => 'Karakter Nama Berupa Huruf !',
            'name.max' => 'Karakter Nama Maksimal 50 !',
            'name.unique' => 'Nama Sudah Ada !',
            'permissions.required' => 'Hak Akses Wajib Diisi !',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        DB::beginTransaction();
        try {
            $role = Role::create(['name' =>  $request->name]);
            $role->givePermissionTo($request->permissions);

            return redirect()->route('roles.index');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->withInput($request->all());
        }finally{
            DB::commit();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('role.show',[
            'role' => $role,
            'authorities' => config('permission.authorities'),
            'rolePermissions' => $role->permissions->pluck('name')->toArray(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('role.edit', [
            'role' => $role,
            'authorities' => config('permission.authorities'),
            'permissionChecked' => $role->permissions->pluck('name')->toArray()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $validator = Validator::make($request->all(),[
            'name' => "required|string|max:50|unique:roles,name," . $role->id,
            'permissions' => 'required',
        ],[
            'name.required' => 'Nama Wajib Diisi !',
            'name.string' => 'Karakter Nama Berupa Huruf !',
            'name.max' => 'Karakter Nama Maksimal 50 !',
            'name.unique' => 'Nama Sudah Ada !',
            'permissions.required' => 'Hak Akses Wajib Diisi !',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        DB::beginTransaction();
        try {
            $role->name = $request->name;
            $role->syncPermissions($request->permissions);
            $role->save();
            return redirect()->route('roles.index');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->withInput($request->all());
        }finally{
            DB::commit();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        DB::beginTransaction();
        try {
            $role->revokePermissionTo($role->permissions->pluck('name')->toArray());
            $role->delete();
        } catch (\Throwable $th) {
            DB::rollback();
        }finally{
            DB::commit();
        }
        return redirect()->route('roles.index');
    }
}
