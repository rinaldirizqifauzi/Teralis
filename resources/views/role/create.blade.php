@extends('layouts.backend')

@section('title')
    Hak Akses
@endsection

@section('title-page')
    Data Hak Akses
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('tambah_roles') }}
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
       <div class="card">
          <form action="{{ route('roles.store') }}" method="POST">
            @csrf
             <div class="card-body">
                <div class="form-group">
                   <label for="input_role_name" class="font-weight-bold">
                      Nama Hak Akses
                   </label>
                   <input id="input_role_name" value="{{ old('name') }}" name="name" type="text" class="form-control @error('name') is-invalid @enderror"  />
                   @error('name')
                        <span style="color: red">
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>
                   @enderror
                </div>
                <!-- permission -->
                <div class="row">
                    <div class="form-group">
                        <label for="input_role_permission" class="font-weight-bold">
                        Hak Akses
                        </label>
                        <div class="form-control overflow-auto h-100 @error('permissions') is-invalid @enderror" id="input_role_permission">
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
                                                    @if (old('permissions'))
                                                        <input id="{{ $permission }}" name="permissions[]" id="{{ $permission }}" class="custom-control-input" type="checkbox" value="{{ $permission }}" {{ in_array($permission,old('permissions')) ? "checked" : null }}>
                                                    @else
                                                        <input id="{{ $permission }}" name="permissions[]" {{ $permission }} class="custom-control-input" type="checkbox" value="{{ $permission }}">
                                                    @endif
                                                    <label class="custom-control-label" for="{{ $permission }}">{{ $permission }}</label>
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
                        </div>
                        @error('permissions')
                            <span style="color: red">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="float-right mx-4 mb-4">
                <a class="btn btn-warning px-4 mx-2" href="{{ route('roles.index') }}">
                Kembali
                </a>
                <button type="submit" class="btn btn-primary px-4">
                Simpan
                </button>
            </div>
        </form>
    </div>
 </div>
</div>
@endsection
