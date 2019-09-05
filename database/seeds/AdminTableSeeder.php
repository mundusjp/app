<?php

use Illuminate\Database\Seeder;
use App\Admin;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Admin;
        $admin->name = "admin";
        $admin->email = "admin@admin.com";
        $admin->password = Hash::make('admin123');
        $admin->is_super = 1;
        $admin->save();
    }
}
