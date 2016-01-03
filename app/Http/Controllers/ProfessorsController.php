<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfessorRequest;
use App\Http\Requests\UpdateProfessorRequest;
use App\Professor;
use App\University;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProfessorsController extends Controller
{
    protected $university;

    public function __construct()
    {
        $this->middleware('auth');

        if (auth()->check()) {
            $this->university = auth()->user()->university;
        }
    }

    public function index()
    {
        return view('university.professors.listing')->with('university', $this->university);
    }

    public function all()
    {
        return $this->university->professors;
    }

    public function store(StoreProfessorRequest $request)
    {
        return $this->university->professors()->create($request->all());
    }

    public function update(UpdateProfessorRequest $request)
    {
        $professor = Professor::findOrFail($request->input('id'));
        $professor->first_name = $request->input('first_name');
        $professor->last_name = $request->input('last_name');
        $professor->email = $request->input('email');
        $professor->save();
        return $professor;
    }

    public function destroy(Request $request)
    {
        Professor::findOrFail($request->input('id'))->delete();
        return response('Deleted professor.', 200);
    }
}
