<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $names = ['Home', 'Products', 'Contact'];
    private $routes = ['home', 'products', 'contact'];

    public function run()
    {
        for($i = 0; $i < count($this->names); $i++) {
            \DB::table('menus')->insert([
                'name' => $this->names[$i],
                'route' => $this->routes[$i],
                'order' => $i
            ]);
        }
    }
}
