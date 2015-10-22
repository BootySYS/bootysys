@extends('layout.main')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="page-header">
                <h1>Edit</h1>
                <p class="text-muted">{{ $module->name }}</p>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-8">

            <form role="form" method="POST" action="{{ action('ModulesController@update', ['id' => $module->id]) }}">
                {!! csrf_field() !!}

                <div class="form-group">
                    <label>Name</label>
                    <input name="name" class="form-control" value="{{ $module->name }}" placeholder="The module name">
                </div>

                <div class="form-group">
                    <label>Short Name</label>
                    <input name="short_name" class="form-control" value="{{ $module->short_name }}" placeholder="A short name for the module">
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea rows="8" name="description" class="form-control" placeholder="Describe the module">{{ $module->description }}</textarea>
                </div>

                <label>Professor(s)</label>

                <select multiple name="professors[]" class="form-control">
                    @foreach($module->university->professors as $professor)
                        <option value="{{ $professor->id }}">{{ $professor->first_name . ' ' . $professor->last_name }}</option>
                    @endforeach
                </select>

                <small class="text-muted">
                    You can select multiple professors, which are responsible for this course.
                </small>
                <br>
                <br>
                <input type="submit" class="btn btn-primary" value="Save" />
                <a href="{{ action('ModulesController@destroy', ['id' => $module->id]) }}" class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</a>
            </form>
        </div>

    </div>

@stop