<?php

use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class LandingTest extends TestCase
{


    public function testVisitSignUp()
    {
        $this->visit('/')
             ->click('Sign up')
             ->seePageIs('/register/university');
    }

    public function testVisitSignUpTwo()
    {
        $this->visit('/')
            ->click('Sign up your university today')
            ->seePageIs('/register/university');
    }


}
