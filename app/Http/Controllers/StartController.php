<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class StartController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            Session::flash('success', 'You are already logged in.');
            return redirect('/dashboard');
        }

        return view('home');
    }
}
