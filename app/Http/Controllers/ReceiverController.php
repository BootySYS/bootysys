<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class ReceiverController extends Controller
{
    public function receive(Request $request)
    {
        $received = $request;
        Log::info($received);
    }
}
