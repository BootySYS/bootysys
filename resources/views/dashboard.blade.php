@extends('layout.main')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h4 class="page-header">{{ trans('messages.welcome', ['name' => auth()->user()->name]) }}</h4>

        </div>
    </div>

@stop