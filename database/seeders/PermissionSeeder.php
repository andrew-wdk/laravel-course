<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permission_names = [
            'events_view',
            'events_create',
            'events_edit',
            'events_delete',

            'posts_view',
            'posts_create',
            'posts_edit',
            'posts_delete',

            'users_view',
            'users_create',
            'users_edit',
            'users_delete',

            'meetings_view',
            'meetings_create',
            'meetings_edit',
            'meetings_delete',

            'roles_view',
            'roles_create',
            'roles_edit',
            'roles_delete',
        ];

        $permissions = array_map(
            fn($p) => ['name' => $p, 'guard_name' => 'web'],
            $permission_names
        );

        Permission::query()->upsert($permissions, 'name');

        Permission::whereNotIn('name', $permission_names)->delete();
    }
}
