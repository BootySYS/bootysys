<?php

namespace App\Http\Controllers;

use App\University;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        switch (auth()->user()->role) {
            case 'university':
                return view('university.dashboard')->with('university', University::where('email', auth()->user()->email)->firstOrFail());
        }

    }
}
