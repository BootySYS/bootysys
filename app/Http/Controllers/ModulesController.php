<?php

namespace App\Http\Controllers;

use App\Course;
use App\Http\Requests\ModuleRequest;
use App\Http\Requests\ModuleUpdateRequest;
use App\Module;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class ModulesController extends Controller
{
    protected $university;

    public function __construct()
    {
        $this->middleware('auth');

        $this->university = auth()->user()->university;
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
     * Get all modules for current university.
     *
     * @return mixed
     */
    public function all()
    {
        return $this->university->modules->load('professors', 'courses');
    }

    public function coursesForModule($id)
    {
        return Module::find($id)->courses->load('groups');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('create-module')) return abort('403', 'You are not allowed to see this!');
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
        return $module->load('professors');
    }

    public function storeCourse(Request $request)
    {
        $this->validate($request, [
            'module_id' => 'required|exists:modules,id',
            'course_type' => 'required|in:lecture,practical_course',
            'course_name' => 'required'
        ]);

        $module = Module::find($request->input('module_id'));
        $course = $module->courses()->create([
            'type' => $request->input('course_type'),
            'name' => $request->input('course_name')
        ]);

        return $course;
    }

    public function deleteCourse(Request $request) {
        $this->validate($request, [
            'module_id' => 'required|exists:modules,id',
            'course_id' => 'required'
        ]);

        Course::find($request->input('course_id'))->delete();

        return response('Deleted course', 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ModuleUpdateRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ModuleUpdateRequest $request, $id)
    {
        $module = Module::find($id);
        $module->name = $request->input('name');
        $module->short_name = $request->input('short_name');
        $module->description = $request->input('description');
        $module->professors()->detach();
        $module->professors()->attach($request->input('professors'));
        $module->save();
        Session::flash('success', 'The module was updated');
        return redirect()->action('ModulesController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $module = Module::find($id);
        $module->professors()->detach();
        $module->courses()->detach();
        $module->delete();
        Session::flash('success', 'The module was deleted');
        return redirect()->action('ModulesController@index');
    }
}
