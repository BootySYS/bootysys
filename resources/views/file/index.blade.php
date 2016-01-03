@extends('layout.main')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="page-header">
                <h1>Import Data</h1>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-8">
            <form action="{{ action('ImportExportController@start') }}" method="POST" enctype="multipart/form-data">
                {!! csrf_field() !!}

                <div class="form-group">
                    <label for="entity">What do you want to import?</label>
                    <select name="entity" id="entity" class="form-control">
                        <option disabled selected>-- Please select --</option>
                        <option value="1">Students</option>
                        <option value="2">Professors</option>
                        <option value="3">Modules</option>
                        <option value="4">Courses</option>
                        <option value="5">Course Groups</option>
                        <option value="6">Course Group Events</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="file">File (.csv)</label>
                    <input type="file" id="file" name="file" accept="text/csv">
                </div>

                <div class="form-group">
                    <p class="text-danger"><i class="fa fa-exclamation-triangle"></i>
                        <strong>Do not use data import if you've already added data manually</strong></p>
                </div>

                <input type="submit" value="Start import" class="btn btn-danger">
            </form>
        </div>

    </div>
@stop