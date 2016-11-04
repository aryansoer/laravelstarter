<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();
        DB::table('permissions')->delete();

        DB::table('roles')->insert([
            ['name' => 'root', 'display_name' => 'Root'],
            ['name' => 'admin', 'display_name' => 'Admin'],
            ['name' => 'editor', 'display_name' => 'Editor']
        ]);

        DB::table('permissions')->insert([
            ['name' => 'create-user', 'display_name' => 'User creation'],
            ['name' => 'update-post', 'display_name' => 'Post updating'],
            ['name' => 'assign-permission', 'display_name' => 'Permission assigning'],
            ['name' => 'view-users', 'display_name' => 'Observe system users'],
        ]);
    }
}
