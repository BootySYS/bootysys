<?php

namespace App\Http\Controllers;

use App\University;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait CreateUserTrait
{
    /**
     * Create a user and login.
     *
     * @param University $university
     * @param $password
     * @return \Illuminate\Http\RedirectResponse
     */
    private function createAuthenticableUser(University $university, $password)
    {
        return $university->user()->create([
            'name'      => $university->contact_first_name . ' ' . $university->contact_last_name,
            'email'     => $university->email,
            'password'  => bcrypt($password),
            'role'      => 'university'
        ]);
    }
}