<?php

namespace App\Http\Controllers;

use App\Http\Requests\UniversityRegisterRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\University;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    use CreateUserTrait;

    public function showRegister()
    {
        return view('auth.register');
    }

    /**
     * Create the university and a user instance.
     *
     * @param UniversityRegisterRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(UniversityRegisterRequest $request)
    {
        $university = University::create($request->all());
        $user = $this->createAuthenticableUser($request, 'university');
        Auth::login($user);
        return redirect('dashboard');
    }
}