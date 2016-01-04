@extends('layout.main')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="page-header">
                <h3><i class="fa fa-users"></i> {{ $team->name }}</h3>
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
            <strong>Add a member</strong>
        </div>
        <div class="col-lg-10">
            <form action="">
                <div class="form-group">

                </div>
            </form>
        </div>
    </div>

@stop