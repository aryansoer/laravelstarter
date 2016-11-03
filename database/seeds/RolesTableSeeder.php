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

        DB::table('roles')->insert([
            ['name' => 'root', 'display_name' => 'Root'],
            ['name' => 'admin', 'display_name' => 'Admin'],
            ['name' => 'editor', 'display_name' => 'Editor']
        ]);
    }
}
