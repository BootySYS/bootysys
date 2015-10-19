@extends('layout.marketing')

@section('content')

    <div class="jumbotron">
        <h1>Manage your students</h1>
        <p class="lead">
            Your students deserve a service like pazzam&reg; to manage their course enrollments. And so do you.
        </p>
        <p><a class="btn btn-lg btn-success" href="{{ action('RegisterController@showRegister') }}" role="button">Sign up today</a></p>
    </div>

    <div class="row marketing">
        <div class="col-lg-6 text-center">

            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
            <h4>Team Management</h4>
            <p>Let students form teams and enroll together in courses and lectures.</p>
            <div class="icon">
                <i class="fa fa-graduation-cap"></i>
            </div>
            <h4>For universities</h4>
            <p>pazzam&reg; is built with students and professors in mind.</p>
        </div>

        <div class="col-lg-6 text-center">
            <div class="icon">
                <i class="fa fa-magic"></i>
            </div>
            <h4>AutoMagic</h4>
            <p>Enrolling students in courses and lectures without conflicts makes your life easier.</p>

            <div class="icon">
                <i class="fa fa-bolt"></i>
            </div>
            <h4>Fast</h4>
            <p>Our Service will be available to your students 24/7 and with a guaranteed uptime of 99.9%</p>
        </div>
    </div>

@stop