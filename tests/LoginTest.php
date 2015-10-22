<?php

use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginTest extends TestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();
        User::create([
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
            ->type('schursch@haw-hamburg.de', 'email')
            ->type('6789', 'password')
            ->click('Log in');
    }
}
