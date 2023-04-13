<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder {

    public function run() {
        DB::table('users')->delete();

        $users = array(
            array(
                'name'=>'test@test.com',
                'password'=>Hash::make('123456'),
                'email'=>'test@test.com'
            ),
            array(
                'name'=>'2test2@test.com',
                'password'=>Hash::make('123456'),
                'email'=>'2test2@test.com'
            )
        );

        DB::table('users')->insert($users);
    }
}
