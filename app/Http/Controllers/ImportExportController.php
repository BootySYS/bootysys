<?php

namespace App\Http\Controllers;

use App\Course;
use App\Group;
use App\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use League\Csv\Reader;

class ImportExportController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

        if(!Gate::allows('manage-university')) {
            abort(403);
        }

        if (auth()->check()) {
            $this->university = auth()->user()->university;
        }
    }

    public function index()
    {
        return view('file.index');
    }

    public function start(Request $request)
    {
        $this->validate($request, [
            'entity'    => 'required|integer|between:1,6',
            'file'      => 'required'
        ]);

        $file = $request->file('file');

        $path = $file->move('uploads', str_random(16) . time() . '.csv');

        $entity = $request->input('entity');

        switch ($entity) {

            case 1:
                $this->importStudents($path);
                break;

            case 2:
                $this->importProfessors($path);
                break;

            case 3:
                $this->importModules($path);
                break;

            case 4:
                $this->importCourses($path);
                break;

            case 5:
                $this->importGroups($path);
                break;

            case 6:
                $this->importEvents($path);
                break;
        }

        File::delete($file);
        return redirect()->back();
    }

    private function importStudents($filePath)
    {
        $csv = Reader::createFromPath($filePath);
        $allStudents = collect($csv->setOffset(1)->fetchAll());

        foreach ($allStudents as $student) {

            $tmp = collect([
                'id'            => $student[0],
                'first_name'    => $student[1],
                'last_name'     => $student[2],
                'email'         => $student[3],
                'major'         => $student[4],
                'semester'      => $student[5]
            ]);

            try {
                $this->university->students()->create($tmp->toArray());
            } catch (\Exception $e) {
                Log::error($e);
            }
        }

        Session::flash('success', "You imported your students successfully.");
    }

    private function importProfessors($filePath)
    {
        $csv = Reader::createFromPath($filePath);
        $allProfessors = collect($csv->setOffset(1)->fetchAll());

        DB::transaction(function() use ($allProfessors) {

            foreach ($allProfessors as $professor) {

                $tmp = collect([
                    'id'            => $professor[0],
                    'first_name'    => $professor[1],
                    'last_name'     => $professor[2],
                    'email'         => $professor[3],
                ]);

                try {
                    $this->university->professors()->create($tmp->toArray());
                } catch (\Exception $e) {
                    // error
                }
            }
        });

        Session::flash('success', "You imported your professors successfully.");
    }

    private function importModules($filePath)
    {
        $csv = Reader::createFromPath($filePath);
        $allModules = collect($csv->setOffset(1)->fetchAll());

        DB::transaction(function() use ($allModules) {

            foreach ($allModules as $module) {

                $tmp = collect([
                    'id'            => $module[0],
                    'name'          => $module[1],
                    'description'   => $module[2],
                    'short_name'    => $module[3],
                ]);

                $professorsList = explode(',', $module[4]);

                try {
                    $module = $this->university->modules()->create($tmp->toArray());
                    $module->professors()->attach($professorsList);
                    $module->save();
                } catch (\Exception $e) {
                    Log::error($e);
                }
            }
        });

        Session::flash('success', "You imported your modules successfully.");
    }

    private function importCourses($filePath)
    {
        $csv = Reader::createFromPath($filePath);
        $allCourses = collect($csv->setOffset(1)->fetchAll());

        DB::transaction(function() use ($allCourses) {

            foreach ($allCourses as $course) {

                $tmp = collect([
                    'id'            => $course[0],
                    'type'          => $course[1],
                    'name'          => $course[2],
                ]);

                try {
                    $module = $this->university->modules()->findOrFail($course[3]);
                    $module->courses()->create($tmp->toArray());
                } catch (\Exception $e) {
                    Log::error($e);
                }
            }
        });

        Session::flash('success', "You imported your courses successfully.");
    }

    private function importGroups($filePath)
    {
        $csv = Reader::createFromPath($filePath);
        $allGroups = collect($csv->setOffset(1)->fetchAll());

        foreach ($allGroups as $group) {

            $tmp = collect([
                'id'        => $group[0],
                'capacity'  => $group[1],
                'name'      => $group[2],
            ]);

            $course = Course::findOrFail($group[3]);
            $course->groups()->create($tmp->toArray());
        }

        Session::flash('success', "You imported your course groups successfully.");
    }

    private function importEvents($filePath)
    {
        $csv = Reader::createFromPath($filePath);
        $allEvents = collect($csv->setOffset(1)->fetchAll());

        foreach ($allEvents as $event)
        {
            $group = Group::findOrFail($event[3]);

            $tmp = collect([
                'day'           => $event[0],
                'start_time'    => $event[1],
                'end_time'      => $event[2]
            ]);

            $group->events()->create($tmp->toArray());
        }

        Session::flash('success', "You imported your course group events successfully.");
    }
}
