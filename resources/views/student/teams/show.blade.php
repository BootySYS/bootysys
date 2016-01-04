@extends('layout.main')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="page-header">
                <h3>{{ $team->name }}</h3>
                <small class="text-muted">Team ID #{{ $team->id }} </small>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2">
            <strong>Members</strong>
        </div>
        <div class="col-lg-10">
            <ul class="list-group">
                @foreach($team->members as $member)
                    <li class="list-group-item">
                        {{ $member->first_name }} {{ $member->last_name }}, {{ $member->email }}<br>
                        <strong>Role:</strong> {{ ucfirst($member->pivot->role) }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2">
            <strong>Courses applied to</strong>
        </div>
        <div class="col-lg-10">

        </div>
    </div>

    @can('manage-this-team', $team)
        <hr>
        <strong class="text-muted">Team Lead Actions</strong>
        <br><br>
    
        <div class="row">
            <div class="col-lg-2">
                <strong>Add a member</strong>
            </div>
            <div class="col-lg-10">
                <form action="{{ action('TeamsController@addMember') }}" method="POST">
                    {!! csrf_field() !!}
                    <input type="hidden" name="team" value="{{ $team->id }}">
                    <div class="form-group">
                        <p class="help-block">
                            To add a member, simply enter the email address of your classmate. <br>
                            The member will be instantly added to your team.
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="email">
                            Email Address
                        </label>
                        <input name="email" type="email" placeholder="Enter one email address" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Add member">
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <hr>
                <p>
                    <strong class="text-danger">Danger Zone</strong>
                </p>
                <a href="" class="btn btn-danger btn-sm">Delete this team</a>
            </div>
        </div>
    @endcan
@stop