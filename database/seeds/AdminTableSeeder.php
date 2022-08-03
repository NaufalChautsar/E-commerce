<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Admin::create([
            'name'    => 'K Style Outlet',
            'email'    => 'Admin@gmail.com',
            'password'    => bcrypt('Admin123')
        ]);
    }
}
