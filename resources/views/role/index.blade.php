@extends('layouts.backend')

@section('title')
    Hak Akses
@endsection

@section('title-page')
    Data Hak Akses
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('roles') }}
@endsection

@section('content')

<!-- section:content -->
<div class="row">
    <div class="col-md-12">
       <div class="card">
          <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                   <form action="{{ route('roles.index') }}" method="GET">
                      <div class="input-group">
                         <input name="keyword" type="search" value="{{ request()->get('keyword') }}" class="form-control" placeholder="Cari Nama Hak Akses">
                         <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                               <i class="fas fa-search"></i>
                            </button>
                         </div>
                      </div>
                   </form>
                </div>
                <div class="col-md-6">
                    @can('Detail Data Hak Akses')
                        <a href="{{ route('roles.create') }}" class="btn btn-primary float-right" role="button">
                            Tambah
                            <i class="fas fa-plus-square"></i>
                        </a>
                    @endcan
                </div>
             </div>
          </div>
          <div class="card-body">
             <ul class="list-group list-group-flush">
                <!-- list role -->
                    @forelse ($roles as $role)
                    <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center pr-0">
                       <label class="mt-auto mb-auto">
                          {{ $role->name }}
                          </label>
                          <div>
                              @can('Detail Data Hak Akses')
                              <!-- show -->
                              <a href="{{ route('roles.show',['role' => $role]) }}" class="btn btn-sm btn-primary" role="button">
                                 <i class="fas fa-eye"></i>
                              </a>
                              @endcan
                            @can('Ubah Data Hak Akses')
                            <!-- edit -->
                            <a href="{{ route('roles.edit',['role' => $role]) }}"  class="btn btn-sm btn-info" role="button">
                               <i class="fas fa-edit"></i>
                            </a>
                            @endcan
                            @can('Hapus Data Hak Akses')
                            <!-- delete -->
                            <form action="{{ route('roles.destroy', ['role' => $role]) }}" class="d-inline" action="" method="POST">
                                @csrf
                                @method('DELETE')
                               <button type="submit" class="btn btn-sm btn-danger">
                                  <i class="fas fa-trash"></i>
                               </button>
                            </form>
                            @endcan
                          </div>
                     </li>
                     @empty
                        <p>
                            <strong>
                                @if (request()->get('keyword'))
                                    Keyword  {{  request()->get('keyword')  }} Tidak Ditemukan
                                @else
                                    Data Role Tidak Ada
                                @endif
                            </strong>
                        </p>
                     @endforelse
                     <!-- list role -->
             </ul>
          </div>
          @if ($roles->hasPages())
            <div class="card-footer">
                <div class="float-right">{{ $roles->links() }}</div>
            </div>
          @endif
       </div>
    </div>
 </div>

@endsection
