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
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

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

    public function index()
    {
        $distributions = $this->university->distributions;
        return view('distro.index')->with(compact('distributions'));
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

    private function send($eventKey)
    {
        $request = collect();

        $request->put('event_key', $eventKey);
        $request->put('teams', $this->university->teams->load('members'));
        $request->put('modules',
            $this->university->modules
                ->load('courses', 'courses.groups', 'courses.groups.events', 'courses.applyingTeams', 'courses.groups.assignedTeams'));

        $client = new Client([
            'base_uri' => config('bootysys.base_url')
        ]);

        try {

            $client->request('POST', '/receive', [
                'json' => $request
            ]);

        } catch(\Exception $e) {
            Log::error($e);
            Session::flash('errors', collect(['There was a problem connecting to our servers. Please contact admin.']));
            return false;
        }

        return true;
    }

    public function start()
    {
        $key = str_random(32);
        $sent = $this->send($key);

        if ($sent) {
            $this->university->distributions()->create(['event_key' => $key, 'started' => true, 'finished' => false]);
            Session::flash('success', 'The process has been started. This may take a while. Reload the page to see if the process is done.');
        }

        return redirect()->back();
    }
}
