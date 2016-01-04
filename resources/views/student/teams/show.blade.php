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
            <strong>Members ({{ count($team->members) }})</strong>
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
    <hr>
    <div class="row">
        <div class="col-lg-2">
            <strong>Courses applied to</strong>
        </div>
        <div class="col-lg-10">
            @if($team->courses->isEmpty())
                Your team has not applied for any courses.
            @else
                <ul class="list-unstyled">
                @foreach($team->courses as $course)
                    <li>
                        <strong>{{$course->type}}</strong> {{ $course->name }} in <i>{{ $course->module->name }}</i>
                        <a href="{{ action('TeamsController@leaveCourse', ['course' => $course->id, 'team' => $team->id]) }}">(Leave)</a>
                    </li>
                @endforeach
                </ul>
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-2">
            <strong>Groups, accepted <i class="fa fa-check"></i></strong>
        </div>
        <div class="col-lg-10">
            @if($team->groups->isEmpty())
                Your team has no accepted groups.
            @else
                <ul>
                    @foreach($team->groups as $group)
                        <li>{{ $group->name }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

    @can('manage-this-team', $team)
        <hr>
        <strong class="text-muted">Team Lead Actions</strong>
        <br><br>

        <div class="row">
            <div class="col-lg-2">
                <strong>Apply to course</strong>
            </div>
            <div class="col-lg-10">
                <form action="{{ action('TeamsController@applyToCourse') }}" method="POST">
                    {!! csrf_field() !!}
                    <input type="hidden" name="team" value="{{ $team->id }}">
                    <div class="form-group">
                        <label for="courses">Courses</label>
                        <select name="course" id="courses" class="form-control">
                            <option disabled selected>-- Please select --</option>
                            @foreach($modules as $module)
                                <optgroup label="{{ $module->name }}">
                                    @foreach($module->courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->name }}, {{ $course->type }}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Apply" class="btn btn-success btn-sm">
                    </div>

                </form>
            </div>
        </div>
    <hr>
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