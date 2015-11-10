<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfessorRequest;
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

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Request $request)
    {
        Professor::findOrFail($request->input('id'))->delete();
        return response('Deleted professor.', 200);
    }
}
