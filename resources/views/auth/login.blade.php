@extends('layout.main')

@section('content')

    <form action="{{ action('Auth\AuthController@postLogin') }}" method="POST">
        {!! csrf_field() !!}

        <div class="form-group">
            <label for="username">{{ trans('auth.id') }}</label>
            <input type="text" name="username" id="identification" value="{{ old('username') }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="password">{{ trans('auth.password') }}</label>
            <input type="password" name="password" id="password" value="" class="form-control">
        </div>

        <input type="submit" class="btn btn-default" value="{{ trans('auth.login') }}">
    </form>

@stop
