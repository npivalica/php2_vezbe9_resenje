<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SliderImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $images = ['first.jpg', 'second.jpg', 'third.jpg'];

    public function run()
    {
        foreach ($this->images as $image) {
            \DB::table('slider_images')->insert([
                'image' => $image,
                'alt' => 'Slider image',
                'currently_active' => true
            ]);
        }
    }
}
