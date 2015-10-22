<?php

use App\University;
use App\User;
use Illuminate\Database\Seeder;

class UniversityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Enes Kaya',
            'email' => 'enes.kaya@haw-hamburg.de',
            'password' => bcrypt('1234'),
            'role' => 'university'
        ]);

        $user->university()->create([
            'name' => 'HAW Hamburg',
            'contact_first_name' => 'Enes',
            'contact_last_name' => 'Kaya',
            'email' => 'enes.kaya@haw-hamburg.de',
            'city' => 'Hamburg',
            'state' => 'Hamburg',
            'zip_code' => '20095',
            'street' => 'Berliner Tor 5',
        ]);
    }
}
