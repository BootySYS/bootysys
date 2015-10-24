<?php

use App\User;


class SignUpTest extends TestCase
{
    public function testRegister()
    {
        $this->visit('/')
            ->click('Sign up')
            ->onPage('/register/university')
            ->type('HAW Hamburg', 'name')
            ->type('Gerhard', 'contact_first_name')
            ->type('Schredder', 'contact_last_name')
            ->type('gerhard.schredder@haw-hamburg.de', 'email')
            ->type('Germany', 'state')
            ->type('Hamburg', 'city')
            ->type('20099', 'zip_code')
            ->type('112233', 'password')
            ->type('112233', 'confirm_password')
            ->press('Register');
    }
}
