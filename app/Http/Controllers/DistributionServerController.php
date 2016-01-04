<?php

namespace App\Http\Controllers;

use App\Professor;
use App\Student;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class DistributionServerController extends Controller
{
    protected $university;

    public function __construct()
    {
        $this->middleware('auth');

        if (Gate::denies('manage-university'))
        {
            abort(403);
        }

        if (Auth::check())
        {
            $this->university = Auth::user()->university;
        }
    }

    public function time()
    {
        $client = new Client([
            'base_uri' => config('bootysys.base_url'),
            'timeout' => 2.0
        ]);

        $professor = Student::all();

        $req = $client->request('POST', '/receive', [
            'json' => [
                'professors' => $professor
            ]
        ]);

        return collect([
            'body' => $req->getBody()->getContents()
        ]);

    }

    public function send()
    {
        $request = collect();

        $request->put('teams', $this->university->teams->load('members'));
        $request->put('modules',
            $this->university->modules->load('courses', 'courses.groups', 'courses.groups.events', 'courses.applyingTeams', 'courses.groups.assignedTeams'));

        return $request;
    }
}
