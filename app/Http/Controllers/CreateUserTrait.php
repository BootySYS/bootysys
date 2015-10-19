<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;

trait CreateUserTrait
{
    /**
     * Create a user and login.
     *
     * @param $request
     * @param $role
     * @param $name
     * @return \Illuminate\Http\RedirectResponse
     */
    private function createAuthenticableUserAndLogin($request, $role, $name)
    {
        return User::create([
            'name'      => $name,
            'email'     => $request->input('email'),
            'password'  => bcrypt($request->input('password')),
            'role'      => $role
        ]);
    }
}