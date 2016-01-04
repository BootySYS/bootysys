@extends('layout.main')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="page-header">
                <h3>Team management</h3>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            @if($teams->isEmpty())
                <strong>You have no teams yet :(</strong>
            @else
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th># ID</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    @foreach($teams as $team)
                        <tr>
                            <td>{{ $team->id }}</td>
                            <td>{{ $team->name }}</td>
                            <td>
                                <a href="{{ action('TeamsController@show', ['id' => $team->id]) }}" class="btn btn-success btn-sm">Show</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @endforelse
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-12">
            <a href="{{ action('TeamsController@create') }}" class="btn btn-primary">Create a team</a> &nbsp; or &nbsp; <a href="" class="btn btn-primary">Join a team</a>
        </div>
    </div>


@stop