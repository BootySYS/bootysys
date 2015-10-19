<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModuleRequest;
use App\Module;
use App\University;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ModulesController extends Controller
{
    protected $university;

    public function __construct()
    {
        $this->middleware('auth');
        $this->university = University::where('email', auth()->user()->email)->firstOrFail();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modules = $this->university->modules;
        return view('university.modules.listing')->with(compact('modules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('university.modules.create')->with('university', $this->university);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ModuleRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModuleRequest $request)
    {
        $module = $this->university->modules()->create($request->all());
        $module->professors()->attach($request->input('professors'));
        Session::flash('success', "The module {$module->name} was created successfully.");
        return redirect('modules');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
