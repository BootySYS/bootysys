<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait CreateUserTrait
{
    /**
     * Create a user and login.
     *
     * @param Request $request
     * @param $role
     * @return \Illuminate\Http\RedirectResponse
     */
    private function createAuthenticableUser(Request $request, $role)
    {
        return User::create([
            'name'      => $request->input('contact_first_name') . ' ' . $request->input('contact_last_name'),
            'email'     => $request->input('email'),
            'password'  => bcrypt($request->input('password')),
            'role'      => $role
        ]);
    }
}