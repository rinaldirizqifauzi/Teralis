@extends('layouts.backend')

@section('title')
    Hak Akses
@endsection

@section('title-page')
   Edit |  Data Hak Akses
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('edit_role_name', $role) }}
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
       <div class="card">
          <form action="{{ route('roles.update',['role' => $role]) }}" method="POST">
            @csrf
            @method('PUT')
             <div class="card-body">
                <div class="form-group">
                   <label for="input_role_name" class="font-weight-bold">
                      Nama Hak Akses
                   </label>
                   <input id="input_role_name" value="{{ old('name', $role->name) }}" name="name" type="text" class="form-control @error('name') is-invalid @enderror"  />
                   @error('name')
                        <span style="color: red">
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>
                   @enderror
                </div>
                <!-- permission -->
                <div class="form-group">
                   <label for="input_role_permission" class="font-weight-bold">
                      Hak Akses
                   </label>
                       <div class="row">
                           <!-- list manage name:start -->
                        @foreach ($authorities as $manageName => $permissions)
                           <div class="col-lg-3 my-2">
                                <ul class="list-group mx-1">
                                    <li class="list-group-item bg-dark text-white" style=" background-image: linear-gradient(to right, #06283D,skyblue);">
                                    {{ $manageName }}
                                    </li>
                                    <!-- list permission:start -->
                                    @foreach ($permissions as $permission)
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                @if (old('permissions', $permissionChecked))
                                                    <input id="{{ $permission }}" name="permissions[]" type="checkbox" class="custom-control-input" value="{{ $permission }}" {{ in_array($permission,old('permissions',$permissionChecked)) ? "checked" : null }}>
                                                @else
                                                    <input id="{{ $permission }}" name="permissions[]" type="checkbox" class="custom-control-input" value="{{ $permission }}">
                                                @endif
                                                <label for="{{ $permission }}" class="custom-control-label">
                                                    {{ $permission }}
                                                </label>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                    <!-- list permission:end -->
                                </ul>
                            </div>
                        @endforeach
                        <!-- list manage name:end  -->
                       </div>
                   @error('permissions')
                        <span style="color: red">
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>
                   @enderror
                </div>
                <div class="float-right">
                   <a class="btn btn-warning px-4 mx-2" href="{{ route('roles.index') }}">
                      Kembali
                   </a>
                   <button type="submit" class="btn btn-primary px-4">
                      Edit
                   </button>
                </div>
             </div>
          </form>
       </div>
    </div>
 </div>
@endsection
