
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard | @yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminlte') }}/dist/css/adminlte.min.css">
    {{-- Data Table --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css"/>
    {{-- css:external --}}
    @stack('css-external')
    {{-- css:internal --}}
    @stack('css-internal')

    @stack('styles')
    {{-- Trix Editor --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('trix.css') }}">
    <style>
        trix-toolbar [data-trix-button-group="file-tools"]{
            display: none
        }
    </style>
    <script type="text/javascript" src="{{ asset('trix.js') }}"></script>
</head>
@livewireStyles
<body class=" hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="background-navbar main-header navbar navbar-expand navbar-dark navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('dashboard.index') }}" class="nav-link" style="font-size: 21px">
            <ion-icon name="home"></ion-icon>
        </a>
      </li>

      @yield('sub-menu')
    </ul>
       <!-- Right navbar links -->
       <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" href="{{ route('logout') }}"
          onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >
              <ion-icon name="exit" style="font-size: 23px"> </ion-icon>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
        </li>
      </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="background-sidebar sidebar main-sidebar sidebar-dark-lightblue elevation-4">
    <!-- Brand Logo -->
    <a href="{{ asset('adminlte') }}/index3.html" class="brand-link">
      <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('adminlte') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block ">{{ Auth::user()->name }}</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu" data-accordion="false">
            @can('Tampil Data Posting')
            <div class="user-panel mt-1 pb-1 mb-2 d-flex">
                <ul class="nav nav-pills nav-sidebar flex-column">
                    <li class="nav-item">
                        <a href="{{ route('posting.index') }}"  class="nav-link {{ set_active(['posting.index','posting.create', 'posting.edit']) }}">
                            <ion-icon name="cloud-upload" size="small" class="nav-icon"></ion-icon>
                            <p>Posting</p>
                        </a>
                    </li>
                </ul>
            </div>
            @endcan
            @can('Tampil Data Master')
            <li class="nav-item {{ menu_open(['motif.index','motif.create', 'motif.edit',
                                              'kategori.index', 'kategori.edit', 'kategori.create',
                                              'besi.index','besi.edit','besi.create',
                                              'jenisbesi.index','jenisbesi.create','jenisbesi.edit',
                                              'ukuranbesi.index', 'ukuranbesi.create','ukuranbesi.edit',
                                              'lokasi.index','lokasi.create','lokasi.edit',
                                              'karyawan.index','karyawan.create','karyawan.edit']) }}">
                <a href="#" class="nav-link ">
                    <ion-icon name="document" class="nav-icon" style="font-size: 21px;"></ion-icon>
                    <p>
                    <i class="right fas fa-angle-left"></i>
                    Data Master
                    </p>
                </a>
                <ul class="nav nav-treeview">
                @can('Tampil Data Motif')
                <li class="nav-item">
                    <a href="{{ route('motif.index') }}" class="nav-link {{ set_active(['motif.index','motif.create', 'motif.edit']) }}">
                        <ion-icon name="duplicate" size="small" class="nav-icon"></ion-icon>
                    <p>Motif</p>
                    </a>
                </li>
                @endcan
                @can('Tampil Data Kategori')
                <li class="nav-item">
                    <a href="{{ route('kategori.index') }}" class="nav-link {{ set_active(['kategori.index','kategori.create','kategori.edit']) }}">
                        <ion-icon name="duplicate" size="small" class="nav-icon"></ion-icon>
                        <p>Kategori</p>
                    </a>
                </li>
                @endcan
                @can('Tampil Data Besi')
                <li class="nav-item">
                    <a href="{{ route('besi.index') }}" class="nav-link {{ set_active(['besi.index','besi.create','besi.edit',
                                                                                        'jenisbesi.index','jenisbesi.create','jenisbesi.edit',
                                                                                        'ukuranbesi.index','ukuranbesi.create','ukuranbesi.edit']) }}">
                        <ion-icon name="duplicate" size="small" class="nav-icon"></ion-icon>
                        <p>Besi</p>
                    </a>
                </li>
                @endcan
                @can('Tampil Data Karyawan')
                <li class="nav-item">
                    <a href="{{ route('karyawan.index') }}" class="nav-link {{ set_active(['karyawan.index','karyawan.create','karyawan.edit']) }}">
                        <ion-icon name="duplicate" size="small" class="nav-icon"></ion-icon>
                        <p>Anggota</p>
                    </a>
                </li>
                @endcan
            </li>
            @endcan
            <li class="nav-item {{ menu_open(['laporan.index','laporan.struck','laporan-karyawan.index',
                                              'laporan-karyawan.create','laporan-karyawan.edit','karyawan.index',
                                              'report.index']) }}">
                <a href="#" class="nav-link ">
                    <ion-icon name="document" class="nav-icon" style="font-size: 21px;"></ion-icon>
                    <p>
                    <i class="right fas fa-angle-left"></i>
                    Data Pemesanan
                </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        @can('Tampil Data Laporan')
                        <a href="{{ route('report.index') }}" class="nav-link {{ set_active(['report.index',
                                                                                             'laporan.index','laporan.edit','laporan.create',
                                                                                             'laporan-karyawan.index','laporan-karyawan.create','laporan-karyawan.edit',]) }}">
                            <ion-icon name="folder" size="small" class="nav-icon"></ion-icon>
                            <p>Laporan</p>
                        </a>
                        @endcan
                    </li>
                </ul>
            </li>
            <li class="nav-header">Users</li>
            <li class="nav-item {{ menu_open(['roles.index','roles.show','roles.create','roles.edit',
                                            'users.index','users.show','users.create','users.edit']) }}">
                <a href="#" class="nav-link ">
                    <ion-icon name="people"  class="nav-icon" style="font-size: 21px;"></ion-icon>
                    <p>
                        <i class="right fas fa-angle-left"></i>
                        Data Users
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                    @can('Tampil Data Pengguna')
                        <a href="{{ route('users.index') }}" class="nav-link {{ set_active(['users.index','users.show','users.create','users.edit']) }}">
                            <ion-icon name="person-add" size="small" class="nav-icon"></ion-icon>
                            <p>Pengguna</p>
                        </a>
                    @endcan
                    @can('Tampil Data Hak Akses')
                        <a href="{{ route('roles.index') }}" class="nav-link {{ set_active(['roles.index','roles.show','roles.create','roles.edit']) }}">
                            <ion-icon name="accessibility" size="small" class="nav-icon"></ion-icon>
                            <p>Hak Akses</p>
                        </a>
                    @endcan
                    </li>
                </ul>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>@yield('title-page')</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              @yield('breadcrumbs')
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="background-navbar  main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Rinaldi Rizqi Fauzi</b> 19.011
    </div>
    <strong>Copyright &copy; 2022 <a href="{{ route('started') }}" >Teralis Jendela</a>.</strong> Bukit Ambacang Village.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->



<!-- jQuery -->
<!-- bs-custom-file-input -->
<script src="{{ asset('adminlte') }}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<script src="{{ asset('adminlte') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte') }}/dist/js/adminlte.min.js"></script>
{{-- Ionic Icon --}}
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<!-- bs-custom-file-input -->
<script src="{{ asset('adminlte') }}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="{{ asset('adminlte') }}/dist/js/pages/dashboard3.js"></script>
<script src="{{ asset('adminlte') }}/plugins/chart.js/Chart.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
@yield('chart')
<script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
{{-- Sweet Alert --}}
@include('sweetalert::alert')
{{-- javascript:external --}}
@stack('javascript-external')
{{-- javascript:internal --}}
@stack('javascript-internal')

@stack('scripts')
<script>
    $(function () {
      bsCustomFileInput.init();
    });
</script>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable({
            "language":{
                "url":"//cdn.datatables.net/plug-ins/1.12.1/i18n/id.json",
                "sEmptyTable":"Tidads"
            }
        });
    });
</script>
</body>
@livewireScripts
</html>
