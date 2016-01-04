<?php

namespace App\Http\Controllers;

use App\Student;
use App\Team;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeamRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class TeamsController extends Controller
{

    protected $university;


    public function __construct()
    {
        $this->middleware('auth');

        if (auth()->check()) {
            $this->university = auth()->user()->university;
        }

        if (Gate::denies('is-student')) {
            abort(403);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Student::where('email', Auth::user()->email)->firstOrFail()->teams;
        return view('student.teams.index')->with(compact('teams'));
    }

    /**
     * Show the form for creating a new team.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.teams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTeamRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeamRequest $request)
    {
        if (!$request->input('participants') === "") {
            $participants = explode(PHP_EOL, $request->input('participants'));
            // TODO notify via email
        }

        $team = $this->university->teams()->create($request->all());
        $team->members()->attach(Student::where('email', Auth::user()->email)->firstOrFail(), ['role' => 'leader']);
        Session::flash('success', 'The team was created successfully!');
        return redirect('/teams');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $team = $this->university->teams()->findOrFail($id);
        return view('student.teams.show')->with(compact('team'));
    }

    public function addMember(Request $request)
    {
        $this->validate($request, [
            'email'     => 'required|email|exists:students',
            'team'      => 'required|integer|exists:teams,id'
        ]);

        $member = Student::where('email', $request->input('email'))->firstOrFail();
        $team = Team::find($request->input('team'));

        $memberExistsInTeam = false;

        foreach ($team->members as $student)
        {
            if ($student->id == $member->id) {
                Session::flash('errors', collect(['This student is already a member of this team!']));
                return redirect()->back();
            }
        }

        $team->members()->attach($member, ['role' => 'member']);
        Session::flash('success', "{$member->first_name} is now a member of your team.");
        return redirect()->back();
    }

    public function removeMember(Request $request)
    {

    }
}
