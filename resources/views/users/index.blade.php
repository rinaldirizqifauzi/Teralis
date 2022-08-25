@extends('layouts.backend')

@section('title')
    Pengguna
@endsection

@section('title-page')
    Data Pengguna
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('user') }}
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
       <div class="card">
          <div class="card-header">
             <div class="row">
                <div class="col-md-6">
                   <form action="{{ route('users.index') }}" method="GET">
                      <div class="input-group">
                         <input name="keyword" value="{{ request()->get('keyword') }}" type="search" class="form-control" placeholder="Masukkan Nama">
                         <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                               <i class="fas fa-search"></i>
                            </button>
                         </div>
                      </div>
                   </form>
                </div>
                <div class="col-md-6">
                    @can('Buat Data Pengguna')
                    <a href="{{ route('users.create') }}" class="btn btn-primary float-right" role="button">
                       Tambah
                       <i class="fas fa-plus-square"></i>
                    </a>
                    @endcan
                </div>
             </div>
          </div>
          <div class="card-body">
             <div class="row">
                <!-- list users -->
                @forelse ($users as $user)
                <div class="col-md-4">
                    <div class="card my-1">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <i class="fas fa-id-badge fa-5x"></i>
                            </div>
                            <div class="col-md-10">
                                <table>
                                <tr>
                                    <th>
                                        Nama
                                    </th>
                                    <td>:</td>
                                    <td>
                                        <!-- show user name -->
                                        {{ $user->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Email
                                    </th>
                                    <td>:</td>
                                    <td>
                                        <!-- show user email -->
                                        {{ $user->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Role
                                    </th>
                                    <td>:</td>
                                    <td>
                                            <!-- show user roles -->
                                        {{ $user->roles->first()->name }}
                                    </td>
                                </tr>
                                </table>
                            </div>
                        </div>
                        <div class="float-right">
                            @can('Ubah Data Pengguna')
                                <a href="{{ route('users.edit', ['user' => $user]) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                            @endcan
                            @can('Tampil Data Pengguna')
                            <!-- delete -->
                            <form action="{{ route('users.destroy', ['user' => $user]) }}" method="POST" role="alert" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i>
                                </button>
                            </form>
                            @endcan
                        </div>
                    </div>
                    </div>
                </div>
                @empty
                    <p>
                        <strong>
                            @if (request()->get('keyword'))
                                    Keyword  {{  request()->get('keyword')  }} Tidak Ditemukan
                            @else
                                    User Tidak Ada
                            @endif
                        </strong>
                    </p>
                @endforelse
            </div>
        </div>
        <div class="card-footer">
            <!-- Todo:paginate -->
        </div>
    </div>
    </div>
</div>
@endsection
