@extends('layout.main')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="page-header">
                <h1>Dashboard</h1>

                Hello, {{ Auth::user()->name }}!
            </div>
        </div>
    </div>

@stop