<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = new User;
        $user1->name = "user1";
        $user1->email = "user1@user.com";
        $user1->password = Hash::make('admin123');
        $user1->user_status = 1;
        $user1->save();

        $user2 = new User;
        $user2->name = "user2";
        $user2->email = "user2@user.com";
        $user2->password = Hash::make('admin123');
        $user2->user_status = 1;
        $user2->save();
    }
}
