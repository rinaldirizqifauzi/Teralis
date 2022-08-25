@extends('layouts.backend')

@section('title')
    Hak Akses
@endsection

@section('title-page')
   Detail | Data Hak Akses
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('show_role',  $role) }}
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
       <div class="card">
          <div class="card-body">
             <div class="form-group">
                <label for="input_role_name" class="font-weight-bold">
                   Nama Hak Akses
                </label>
                <input id="input_role_name" value="{{ $role->name }}" name="name" type="text" class="form-control" readonly />
             </div>
             <!-- permission -->
             <div class="form-group">
                <label for="input_role_permission" class="font-weight-bold">
                   Hak Akses
                </label>
                <div class="form-control overflow-auto h-100 @error('permissions') is-invalid @enderror" id="input_role_permission">
                    <div class="row">
                        <!-- list manage name:start -->
                            @forelse ($authorities as $manageName => $permissions)
                            <div class="col-lg-3 my-2">
                                <ul class="list-group mx-1">
                                    <li class="list-group-item bg-dark text-white" style=" background-image: linear-gradient(to right, #06283D,skyblue);">
                                        {{ $manageName }}
                                    </li>
                                    @foreach ($permissions as $permission)
                                    <!-- list permission:start -->
                                        <li class="list-group-item">
                                            <div class="form-group">
                                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                    <input class="custom-control-input" type="checkbox" value="" onclick="return false;" {{ in_array($permission, $rolePermissions) ? "checked" : null }}>
                                                    <label class="custom-control-label">
                                                        {{ $permission }}
                                                    </label>
                                                </div>
                                            </div>
                                        </li>
                                    <!-- list permission:end -->
                                    @endforeach
                                </ul>
                            </div>
                            @empty

                            @endforelse
                            <!-- list manage name:end  -->
                    </div>
                </div>
                <div class="row">
                </div>
             </div>
             <!-- button  -->
             <div class="d-flex justify-content-end">
                <a href="{{ route('roles.index') }}" class="btn btn-primary mx-1" role="button">
                   Kembali
                </a>
             </div>
          </div>
       </div>
    </div>
 </div>
@endsection
