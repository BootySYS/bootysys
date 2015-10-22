@extends('layout.main')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="page-header">
                <h3>
                    Professors
                    <a href="{{ action('ProfessorsController@create') }}" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> Add professor</a>
                </h3>
            </div>
        </div>
    </div>

    <div class="row">

        @if(count($university->professors) > 0)

            <div class="col-lg-12">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                    </thead>

                    @foreach($university->professors as $professor)
                        <tr>
                            <td>{{ $professor->id }}</td>
                            <td>{{ $professor->title }} {{ $professor->first_name }} {{ $professor->last_name }}</td>
                            <td>{{ $professor->email }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>

        @else
            <div class="col-lg-12">
                <div class="well well-lg">
                    <h4><i class="fa fa-exclamation-circle"></i> You have no professors yet.</h4>
                    <p>
                        A professor can see and manage their courses. After you enter a professor or lecturer the person will receive an email with a password. <br>
                        You can either create <a href="{{ action('ProfessorsController@create') }}">a professor manually here</a>,
                        or go ahead and try our <a href="file">file importer</a>.
                    </p>
                </div>
            </div>
        @endif

    </div>

@stop