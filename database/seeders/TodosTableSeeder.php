<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodosTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('todos')->delete();

        $todos = array(
            array(
                'user_id' => '1',
                'title' => '1 задача',
                'done' => true,
                'image'=>'image.jpg'
            ),
            array(
                'user_id' => '1',
                'title' => '2 задача',
                'done' => false,
                'image'=>'image.jpg'
            ),
            array(
                'user_id' => '2',
                'title' => 'Задача1',
                'done' => false,
                'image'=>'2image2.jpg'
            ),
            array(
                'user_id' => '2',
                'title' => 'Задача2',
                'done' => true,
                'image'=>'2image2.jpg'
            )
        );

        DB::table('todos')->insert($todos);
    }
}
