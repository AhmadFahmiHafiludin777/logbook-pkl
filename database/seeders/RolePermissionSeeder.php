<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [ 
            'view-angkatan', 'create-angkatan', 'edit-angkatan', 'delete-angkatan',
            'view-sekolah', 'create-sekolah', 'edit-sekolah', 'delete-sekolah',
            'view-jurusan', 'create-jurusan', 'edit-jurusan', 'delete-jurusan',
            'view-user', 'create-user', 'edit-user', 'delete-user', 'impersonate-user',
            'view-siswa', 'create-siswa', 'edit-siswa', 'delete-siswa',
            'view-pembimbing-sekolah', 'create-pembimbing-sekolah', 'edit-pembimbing-sekolah', 'delete-pembimbing-sekolah',
            'view-pembimbing-lapangan', 'create-pembimbing-lapangan', 'edit-pembimbing-lapangan', 'delete-pembimbing-lapangan',

        ];

        foreach($permissions as $permission) {
            Permission::firstOrCreate(['name' =>$permission]);
        }


        $adminSuper = Role::firstOrCreate(['name' => 'super-admin']);
        $adminPKL = Role::firstOrCreate(['name' => 'admin-pkl']);
        $pembimbingPKL = Role::firstOrCreate(['name' => 'pembimbing-pkl']);
        $pembimbingSekolah = Role::firstOrCreate(['name' => 'pembimbing-sekolah']);
        $siswa = Role::firstOrCreate(['name' => 'siswa']);

        $adminPKL->givePermissionTo([
            'view-angkatan', 'create-angkatan', 'edit-angkatan', 'delete-angkatan',
            'view-sekolah', 'create-sekolah', 'edit-sekolah', 'delete-sekolah',
            'view-jurusan', 'create-jurusan', 'edit-jurusan', 'delete-jurusan',
            'view-user',
            'view-siswa', 'create-siswa', 'edit-siswa', 'delete-siswa',
            'view-pembimbing-sekolah', 'create-pembimbing-sekolah', 'edit-pembimbing-sekolah', 'delete-pembimbing-sekolah',
            'view-pembimbing-lapangan', 'create-pembimbing-lapangan', 'edit-pembimbing-lapangan', 'delete-pembimbing-lapangan',

        ]);

        $pembimbingPKL->givePermissionTo(['view-angkatan', 'view-sekolah', 'view-jurusan']);
    }
}
