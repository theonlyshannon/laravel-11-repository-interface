<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'dashboard-view',
            'dashboard-admin-view',
            'dashboard-writer-view',
            'dashboard-mentor-view',
        ];

        $admin = Role::firstOrCreate(['name' => 'admin']);


        $mentor = Role::firstOrCreate(['name' => 'mentor']);

        $student = Role::firstOrCreate(['name' => 'student']);

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $admin->syncPermissions([
            'dashboard-view',

            'dashboard-admin-view',
        ]);

        $student->syncPermissions([
            'dashboard-view',
        ]);

        $mentor->syncPermissions([
            'dashboard-view',

            'dashboard-mentor-view',
        ]);
    }
}
