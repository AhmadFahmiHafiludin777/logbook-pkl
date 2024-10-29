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
        $permissions = [ 'view-angkatan', 'create-angkatan', 'edit-angkatan', 'delete-angkatan', 'view-sekolah', 'create-sekolah', 'edit-sekolah', 'delete-sekolah'];

        foreach($permissions as $permission) {
            Permission::firstOrCreate(['name' =>$permission]);
        }


        $adminSuper = Role::firstOrCreate(['name' => 'Admin Super']);
        $adminPKL = Role::firstOrCreate(['name' => 'Admin PKL']);
        $pembimbingPKL = Role::firstOrCreate(['name' => 'Pembimbing PKL']);
        $pembimbingSekolah = Role::firstOrCreate(['name' => 'Pembimbing Sekolah']);
        $siswa = Role::firstOrCreate(['name' => 'Siswa']);

        $adminSuper->givePermissionTo(Permission::all());

        $adminPKL->givePermissionTo(['view-angkatan', 'create-angkatan', 'edit-angkatan', 'delete-angkatan', 'view-sekolah', 'create-sekolah', 'edit-sekolah', 'delete-sekolah']);

        $pembimbingPKL->givePermissionTo(['view-angkatan', 'view-sekolah']);
    }
}
