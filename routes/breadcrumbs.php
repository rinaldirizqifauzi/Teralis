<?php

// Dashboard
Breadcrumbs::for('dashboard', function ( $trail) {
    $trail->push('Dashboard', route('dashboard.index'));
});

// Dashboard > Posting
Breadcrumbs::for('posting', function ( $trail) {
    $trail->parent('dashboard');
    $trail->push('Posting', route('posting.index'));
});

// Dashboard > Posting > Tambah
Breadcrumbs::for('tambah_posting', function ( $trail) {
    $trail->parent('posting');
    $trail->push('Tambah', route('posting.create'));
});

// Dashboard > Posting > Edit
Breadcrumbs::for('edit_posting', function ($trail, $posting) {
    $trail->parent('posting');
    $trail->push('Edit', route('posting.edit', ['posting' => $posting]));
});

// Dashboard > Posting > Edit > [judul]
Breadcrumbs::for('edit_judul_posting', function ($trail, $posting) {
    $trail->parent('edit_posting', $posting);
    $trail->push($posting->nama_posting, route('posting.edit', ['posting' => $posting]));
});

// Dashboard > Motif
Breadcrumbs::for('motif', function ( $trail) {
    $trail->parent('dashboard');
    $trail->push('Motif', route('motif.index'));
});

// Dashboard > Motif > Tambah
Breadcrumbs::for('tambah_motif', function ( $trail) {
    $trail->parent('motif');
    $trail->push('Tambah', route('motif.create'));
});

// Dashboard > Motif > Edit
Breadcrumbs::for('edit_motif', function ($trail, $motif) {
    $trail->parent('motif');
    $trail->push('Edit', route('motif.edit', ['motif' => $motif]));
});

// Dashboard > Motif > Edit > [judul]
Breadcrumbs::for('edit_nama_motif', function ($trail, $motif) {
    $trail->parent('edit_motif', $motif);
    $trail->push($motif->nama_motif, route('motif.edit', ['motif' => $motif]));
});

// Dashboard > Kategori
Breadcrumbs::for('category', function ( $trail) {
    $trail->parent('dashboard');
    $trail->push('Kategori', route('kategori.index'));
});

// Dashboard > Kategori > Tambah
Breadcrumbs::for('tambah_category', function ( $trail) {
    $trail->parent('category');
    $trail->push('Tambah', route('kategori.create'));
});

// Dashboard > Kategori > Edit
Breadcrumbs::for('edit_category', function ($trail, $kategori) {
    $trail->parent('category');
    $trail->push('Edit', route('kategori.edit', ['kategori' => $kategori]));
});

// Dashboard > Kategori > Edit > [judul]
Breadcrumbs::for('edit_nama_category', function ($trail, $kategori) {
    $trail->parent('edit_category', $kategori);
    $trail->push($kategori->nama_kategori, route('kategori.edit', ['kategori' => $kategori]));
});

// Dashboard > besi
Breadcrumbs::for('besi', function ( $trail) {
    $trail->parent('dashboard');
    $trail->push('Besi', route('besi.index'));
});

// Dashboard > besi > Tambah
Breadcrumbs::for('tambah_besi', function ( $trail) {
    $trail->parent('besi');
    $trail->push('Tambah', route('besi.create'));
});

// Dashboard > besi > Edit
Breadcrumbs::for('edit_besi', function ($trail, $besi) {
    $trail->parent('besi');
    $trail->push('Edit', route('besi.edit', ['besi' => $besi]));
});

// Dashboard > besi > Edit > [judul]
Breadcrumbs::for('edit_nama_besi', function ($trail, $besi) {
    $trail->parent('edit_besi', $besi);
    $trail->push($besi->nama_besi, route('besi.edit', ['besi' => $besi]));
});

// Dashboard > Ukuran Besi
Breadcrumbs::for('ukuranbesi', function ( $trail) {
    $trail->parent('dashboard');
    $trail->push('Ukuran Besi', route('ukuranbesi.index'));
});

// Dashboard > Ukuran Besi > Tambah
Breadcrumbs::for('tambah_ukuranbesi', function ( $trail) {
    $trail->parent('ukuranbesi');
    $trail->push('Tambah', route('ukuranbesi.create'));
});

// Dashboard > Ukuran Besi > Edit
Breadcrumbs::for('edit_ukuranbesi', function ($trail, $ukuranbesi) {
    $trail->parent('ukuranbesi');
    $trail->push('Edit', route('ukuranbesi.edit', ['ukuranbesi' => $ukuranbesi]));
});

// Dashboard > Ukuran Besi > Edit > [judul]
Breadcrumbs::for('edit_nama_ukuranbesi', function ($trail, $ukuranbesi) {
    $trail->parent('edit_ukuranbesi',$ukuranbesi);
    $trail->push($ukuranbesi->nama_ukuran, route('ukuranbesi.edit', ['ukuranbesi' => $ukuranbesi]));
});

// Dashboard > Jenis Besi
Breadcrumbs::for('jenis_besi', function ( $trail) {
    $trail->parent('dashboard');
    $trail->push('Jenis Besi', route('jenisbesi.index'));
});

// Dashboard > Jenis Besi > Tambah
Breadcrumbs::for('tambah_jenis_besi', function ( $trail) {
    $trail->parent('jenis_besi');
    $trail->push('Tambah', route('jenisbesi.create'));
});

// Dashboard > Jenis Besi > Edit
Breadcrumbs::for('edit_jenis_besi', function ($trail, $jenisbesi) {
    $trail->parent('jenis_besi');
    $trail->push('Edit', route('jenisbesi.edit', ['jenisbesi' => $jenisbesi]));
});

// Dashboard > Jenis Besi > Edit > [judul]
Breadcrumbs::for('edit_nama_jenis_besi', function ($trail, $jenisbesi) {
    $trail->parent('edit_jenis_besi',$jenisbesi);
    $trail->push($jenisbesi->jenis_besi, route('jenisbesi.edit', ['jenisbesi' => $jenisbesi]));
});

// Dashboard > Anggota
Breadcrumbs::for('anggota', function ( $trail) {
    $trail->parent('dashboard');
    $trail->push('Anggota', route('karyawan.index'));
});

// Dashboard > Anggota > Tambah
Breadcrumbs::for('tambah_anggota', function ( $trail) {
    $trail->parent('anggota');
    $trail->push('Tambah', route('karyawan.create'));
});

// Dashboard > Anggota > Edit
Breadcrumbs::for('edit_anggota', function ($trail, $karyawan) {
    $trail->parent('anggota');
    $trail->push('Edit', route('karyawan.edit', ['karyawan' => $karyawan]));
});

// Dashboard > Anggota > Edit > [judul]
Breadcrumbs::for('edit_nama_karyawan', function ($trail, $karyawan) {
    $trail->parent('edit_anggota',$karyawan);
    $trail->push($karyawan->nama_anggota, route('karyawan.edit', ['karyawan' => $karyawan]));
});

// Dashboard > lokasi
Breadcrumbs::for('lokasi', function ( $trail) {
    $trail->parent('dashboard');
    $trail->push('Lokasi', route('lokasi.index'));
});

// Dashboard > lokasi > Tambah
Breadcrumbs::for('tambah_lokasi', function ( $trail) {
    $trail->parent('lokasi');
    $trail->push('Tambah', route('lokasi.create'));
});

// Dashboard > lokasi > Edit
Breadcrumbs::for('edit_lokasi', function ($trail, $lokasi) {
    $trail->parent('lokasi');
    $trail->push('Edit', route('lokasi.edit', ['lokasi' => $lokasi]));
});

// Dashboard > lokasi > Edit > [judul]
Breadcrumbs::for('edit_nama_lokasi', function ($trail, $lokasi) {
    $trail->parent('edit_lokasi',$lokasi);
    $trail->push($lokasi->nama_lokasi, route('lokasi.edit', ['lokasi' => $lokasi]));
});

// Dashboard > Laporan Anggota
Breadcrumbs::for('laporan_anggota', function ( $trail) {
    $trail->parent('dashboard');
    $trail->push('Laporan Anggota', route('laporan-karyawan.index'));
});

// Dashboard > Laporan Anggota > Tambah
Breadcrumbs::for('tambah_laporan_anggota', function ( $trail) {
    $trail->parent('laporan_anggota');
    $trail->push('Tambah', route('laporan-karyawan.create'));
});

// Dashboard > Laporan Anggota > Edit
Breadcrumbs::for('edit_laporan_anggota', function ($trail, $laporan_karyawan) {
    $trail->parent('laporan_anggota');
    $trail->push('Edit', route('laporan-karyawan.edit', ['laporan_karyawan' => $laporan_karyawan]));
});

// Dashboard > Laporan Anggota > Edit > [judul]
Breadcrumbs::for('edit_laporan_nama_anggota', function ($trail, $laporan_karyawan) {
    $trail->parent('edit_laporan_anggota', $laporan_karyawan);
    $trail->push($laporan_karyawan->anggotas->nama_anggota, route('laporan-karyawan.edit', ['laporan_karyawan' => $laporan_karyawan]));
});

// Dashboard > Role
Breadcrumbs::for('roles', function ( $trail) {
    $trail->parent('dashboard');
    $trail->push('Role', route('roles.index'));
});

// Dashboard > Role > Tambah
Breadcrumbs::for('tambah_roles', function ( $trail) {
    $trail->parent('dashboard');
    $trail->push('Tambah', route('roles.create'));
});

// Dashboard > Role > Tambah > Nama
Breadcrumbs::for('show_role', function ($trail, $role) {
    $trail->parent('roles');
    $trail->push('Hak Akses', route('roles.show', ['role' => $role]));
    $trail->push($role->name, route('roles.show', ['role' => $role]));
});

// Dashboard > Role > Edit
Breadcrumbs::for('edit_role', function ($trail, $role) {
    $trail->parent('roles');
    $trail->push('Edit', route('roles.edit', ['role' => $role]));
});

// Dashboard > Role > Edit > [Nama]
Breadcrumbs::for('edit_role_name', function ($trail, $role) {
    $trail->parent('edit_role',$role);
    $trail->push($role->name, route('roles.edit', ['role' => $role]));
});

// Dashboard > User
Breadcrumbs::for('user', function ( $trail) {
    $trail->parent('dashboard');
    $trail->push('Pengguna', route('users.index'));
});

// Dashboard > User > Tambah
Breadcrumbs::for('tambah_user', function ( $trail) {
    $trail->parent('user');
    $trail->push('Tambah', route('users.create'));
});

// Dashboard > User > Edit
Breadcrumbs::for('edit_user', function ($trail, $user) {
    $trail->parent('user');
    $trail->push('Edit', route('users.edit', ['user' => $user]));
});

// Dashboard > User > Edit > [Nama]
Breadcrumbs::for('edit_user_name', function ($trail, $user) {
    $trail->parent('edit_user',$user);
    $trail->push($user->name, route('users.edit', ['user' => $user]));
});


// Dashboard > Pemesanan
Breadcrumbs::for('pemesanan', function ( $trail) {
    $trail->parent('dashboard');
    $trail->push('Pemesanan', route('laporan.index'));
});



