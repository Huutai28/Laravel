<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                'cate_name' => 'iPhone',
                'cate_slug' => Str::slug('iPhone', '-'),
            ],
            [
                'cate_name' => 'Samsung',
                'cate_slug' => Str::slug('Samsung', '-'),
            ],
            
        ];
        DB::table('categories')->insert($data);
    }
}
