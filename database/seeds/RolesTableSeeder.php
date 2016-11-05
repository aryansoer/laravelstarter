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
            ['name' => 'create-user', 'display_name' => 'Create user'],
            ['name' => 'update-post', 'display_name' => 'Update post'],
            ['name' => 'assign-permission', 'display_name' => 'Assign permissions'],
            ['name' => 'view-users', 'display_name' => 'View users']
        ]);
    }
}
