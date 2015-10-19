@extends('layout.main')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="page-header">
                <h1>Create a module</h1>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-8">

            <form role="form" method="POST" action="{{ action('ModulesController@store') }}">
                {!! csrf_field() !!}

                <div class="form-group">
                    <label>Name</label>
                    <input name="name" class="form-control" value="{{ old('name') }}" placeholder="The module name">
                </div>

                <div class="form-group">
                    <label>Short Name</label>
                    <input name="short_name" class="form-control" value="{{ old('short_name') }}" placeholder="A short name for the module">
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea rows="8" name="description" class="form-control" value="{{ old('description') }}" placeholder="Describe the module"></textarea>
                </div>

                <label>Professor(s)</label>

                <select multiple name="professors[]" class="form-control">
                    @foreach($university->professors as $professor)
                        <option value="{{ $professor->id }}">{{ $professor->first_name . ' ' . $professor->last_name }}</option>
                    @endforeach
                </select>

                <small class="text-muted">
                    You can select multiple professors, which are responsible for this course.
                </small>
                <br>
                <br>
                <input type="submit" class="btn btn-primary" value="Save" />
            </form>

        </div>

        <div class="col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Information
                </div>
                <div class="panel-body">
                    <p>When you've created the module, you can add courses and lectures to it later.</p>
                </div>
            </div>
        </div>

    </div>

@stop