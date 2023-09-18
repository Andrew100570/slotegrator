<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i=0; $i < 20; $i++) {
            DB::table('products')->insert([
                'name' => Str::random(10).'Name',
                'description' => 'Описание продукта'.$i,
                'category' => 'Категория'.$i,
                'image_url' => '{"'.$i.'":"Значение '.$i.'"}',
                'izbrannoe' => 0,
            ]);
        }
    }
}
