<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $categories = ['Vintage', 'Minimalists', 'Sports', 'Military', 'Unusual'];

    public function run()
    {
        foreach ($this->categories as $category) {
            \DB::table('categories')->insert([
                'name' => $category
            ]);
        }
    }
}
