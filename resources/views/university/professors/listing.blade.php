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
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Courses</th>
                        <th>Email</th>
                    </tr>
                    @foreach($university->professors as $professor)
                        <tr>
                            <td>{{ $professor->id }}</td>
                            <td>{{ $professor->title }}</td>
                            <td>{{ $professor->first_name }}</td>
                            <td>{{ $professor->last_name }}</td>
                            <td>
                                @if($professor->modules->isEmpty())
                                    <span class="text-danger">No courses</span>
                                @endif
                                @foreach($professor->modules as $module)
                                    {{ $module->name }}<br>
                                @endforeach
                            </td>
                            <td>
                                {{ $professor->email }}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>

        @else

        @endif

    </div>

@stop