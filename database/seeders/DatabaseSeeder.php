<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // create admin user
        $adminUser = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);

        // 1. Mandatory: Clear cache before seeding
        //  app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // 2. Define your permission names
        $permissionNames = [
            'access_users', 'create_users', 'edit_users', 'delete_users','show_users',
            'access_roles', 'create_roles', 'edit_roles', 'delete_roles','show_roles',
            'access_permissions', 'create_permissions', 'edit_permissions', 'delete_permissions','show_permissions'
        ];

        // 3. Prepare data for bulk insert (Fastest for SQLite/MySQL)
        $now = Carbon::now();

        $permissions = collect($permissionNames)->map(function ($name) use ($now) {
            return [
                'name' => $name,
                'guard_name' => 'web', // Fixes the NOT NULL constraint error
                'created_at' => $now,  // Fixes the missing timestamp
                'updated_at' => $now,
            ];
        })->toArray();

        Permission::insert($permissions);

        // 4. Create Role and sync permissions
        // Note: Role::create() handles timestamps automatically
        $role = Role::create([ 'name' => 'admin', 
                               'guard_name' => 'web', 
                               'created_at' => $now,
                               'updated_at' => $now ]);
        
        // Use syncPermissions to ensure they attach correctly after an insert
        $role->syncPermissions(Permission::all());

        // 5. Assign to your admin user
        // Ensure $adminUser is defined or fetched here
        if ($adminUser = User::where('email', 'admin@admin.com')->first()) {
            $adminUser->assignRole($role);
        }
    }
}
