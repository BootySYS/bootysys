<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SignUpTest extends TestCase
{
    use DatabaseTransactions;
    use DatabaseMigrations;

//    public function setUp()
//    {
//        parent::setUp();
//        University::create([
//            'name' => 'Niko Khaled',
//            'email' => 'schursch@haw-hamburg.de',
//            'password' => bcrypt('6789'),
//            'student' => 'student'
//        ]);
//    }

    /**
     * Test the sign up page.
     *
     * @return void
     */
    public function testSignUpPage()
    {
        $this->visit('/register/university')
             ->see('Register now!')
             ->type('HAW Hamburg', 'name')
             ->type('Hans', 'contact_first_name')
             ->type('Müller', 'contact_last_name')
             ->type('hans.mueller@gmail.com', 'email')
             ->type('Hamburg', 'state')
             ->type('Hamburg', 'city')
             ->type('20095', 'zip_code')
             ->type('Berliner Tor 5', 'street')
             ->type('1234', 'password')
             ->type('1234', 'confirm_password')
             ->press('Register')
             ->seePageIs('/dashboard');
    }
}
