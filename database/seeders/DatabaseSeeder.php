<?php

namespace Database\Seeders;

use App\Models\Level;
use App\Models\Subject;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class,
            TextSeeder::class,
            PageSeeder::class,
        ]);

        // Level::create([
        //     'label' => '1',
        //     'code' => '1'
        // ]);

        // Subject::create([
        //     'label' => 'Math'
        // ]);
    }
}
