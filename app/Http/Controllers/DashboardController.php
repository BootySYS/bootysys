<?php

namespace App\Http\Controllers;

use App\University;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        if (auth()->user()->role === 'university') {
            return view('university.dashboard')->with('university', auth()->user()->university);
        } elseif (auth()->user()->role === 'professor') {
            return view('professor.dashboard');
        } else {
            return view('student.dashboard');
        }
    }
}
