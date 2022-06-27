<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
        $faker = Faker::create();
        for($i = 1; $i <= 15; $i++) {
            $id = \DB::table('products')->insertGetId([
                'name' => $faker->word,
                'price' => rand(5, 50),
                'image' => 'product'.$i.'.jpg',
                'description' => $faker->paragraph
            ]);

            \DB::table('category_product')->insert([
                'product_id' => $id,
                'category_id' => rand(1,5)
            ]);
        }
    }
}
