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
        $university = University::create([
            'name' => 'HAW Hamburg',
            'contact_first_name' => 'Enes',
            'contact_last_name' => 'Kaya',
            'email' => 'enes.kaya@haw-hamburg.de',
            'city' => 'Hamburg',
            'state' => 'Hamburg',
            'zip_code' => '20095',
            'street' => 'Berliner Tor 5',
        ]);

        $university->user()->create([
            'name' => 'Enes Kaya',
            'email' => 'enes.kaya@haw-hamburg.de',
            'password' => bcrypt('1234'),
            'role' => 'university'
        ]);

        $professors = factory(\App\Professor::class, 20)->make();
        $students = factory(\App\Student::class, 20)->make();

        foreach ($professors as $professor)
        {
            $university->professors()->save($professor);
        }

        foreach ($students as $student)
        {
            $university->students()->save($student);
        }

    }
}
