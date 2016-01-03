<?php

namespace App\Http\Controllers;

use App\Course;
use App\Http\Requests\ModuleRequest;
use App\Http\Requests\ModuleUpdateRequest;
use App\Module;
use App\Professor;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class ProfessorsModulesController extends Controller
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
        $modules = $this->university->modules;
        return view('professor.modules.listing')->with(compact('modules'));
    }

    public function all()
    {
        $professor = $this->university->professors()->where('id', auth()->user()->id);
        return $professor->modules;
    }

    public function coursesForModule($id)
    {
        return Module::find($id)->courses->load('groups');
    }

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

    public function destroy($id)
    {
        $module = Module::find($id);
        $module->professors()->detach();
        $module->courses()->detach();
        $module->delete();
        Session::flash('success', 'The module was deleted');
        return redirect()->action('ProfessorsModulesController@index');
    }
}
