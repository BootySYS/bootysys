
<?php

use App\University;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginTest extends TestCase
{
    use DatabaseTransactions;
    use DatabaseMigrations;


    public function setUp()
    {
        parent::setUp();
        $university = University::create([
            'name' => 'HAW Hamburg',
            'contact_first_name' => 'Niko',
            'contact_last_name' => 'Khaled',
            'email' => 'schursch@haw-hamburg.de',
            'state' => 'Hamburg',
            'city' => 'Hamburg',
            'zip_code' => '20095',
            'street' => 'Berliner Tor 5'
        ]);

        $university->user()->create([
            'name' => 'Niko Khaled',
            'email' => 'schursch@haw-hamburg.de',
            'password' => bcrypt('6789'),
            'student' => 'student'
        ]);

    }

    public function testLogin()
    {
        $this->visit('/')
            ->click('Log in')
            ->onPage('/auth/login')
            ->type('schursch@haw-hamburg.de', 'email')
            ->type('6789', 'password')
            ->press('Log in')
            ->seePageIs('/dashboard');


    }
}