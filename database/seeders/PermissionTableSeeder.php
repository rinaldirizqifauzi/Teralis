<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;


class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $authorities = config('permission.authorities');

        $listPermission = [];
        $superAdminPermissions = [];
        $adminPermissions = [];
        $editorPermissions = [];

        foreach ($authorities as $label => $permissions) {
            foreach ($permissions as $permission) {
                $listPermission[] = [
                    'name' => $permission,
                    'guard_name' => 'web',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
                // Super Admin
                $superAdminPermissions[] = $permission;

                // Admin
                if (in_array($label, [
                        'Manage Posting',
                        'Manage Motif',
                        'Manage Kategori'
                    ])) {
                    $adminPermissions[] = $permission;
                }
                // Editor
                if (in_array($label, [
                        'Manage Role Pengguna',
                        'Manage Pengguna',
                        'Manage Besi',
                        'Manage Karyawan',
                        'Manage Lokasi',
                        'Manage Jenis Besi',
                        'Manage Ukuran Besi',
                        'Manage laporan Pemesanan',
                        'Manage laporan Karyawan',
                        'Manage Laporan'
                    ])) {
                    $editorPermissions[] = $permission;
                }
            }
        }

        // Insert Data
        Permission::insert($listPermission);

        // Insert Role
        // Super Admin
        $superAdmin = Role::create([
            'name' => "SuperAdmin",
            'guard_name' => 'web',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        // Admin
        $admin = Role::create([
            'name' => "Admin",
            'guard_name' => 'web',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        // Editor
        $editor = Role::create([
            'name' => "Editor",
            'guard_name' => 'web',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        $superAdmin->givePermissionTo($superAdminPermissions);
        $admin->givePermissionTo($adminPermissions);
        $editor->givePermissionTo($editorPermissions);

        $userSuperAdmin = User::find(1)->assignRole("SuperAdmin");
    }
}
