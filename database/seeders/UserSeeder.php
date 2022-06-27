<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $users = [
        [
            "email" => "pera@gmail.com",
            "password" => "8aa87050051efe26091a13dbfdf901c6", //lozinka
            "name" => "Pera"
        ]
    ];

    public function run()
    {
        foreach ($this->users as $user) {
            \DB::table('users')->insert($user);
        }
    }
}
