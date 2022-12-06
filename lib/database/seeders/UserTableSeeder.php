<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'level' => 1
        ];
        DB::table('users')->insert($data);
    }
}
