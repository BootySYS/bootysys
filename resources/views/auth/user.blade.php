@extends('layout.main')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="page-header">
                <h3>Profile</h3>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <dl>
                <dt>Name</dt>
                <dd>{{ $user->name }}</dd>
                <dt>Email</dt>
                <dd>{{ $user->email }}</dd>
                <dt>University</dt>
                <dd>{{ $user->university->name }}</dd>
                <dt>Role</dt>
                <dd>{{ ucfirst($user->role) }}</dd>
            </dl>

        </div>
    </div>
@stop