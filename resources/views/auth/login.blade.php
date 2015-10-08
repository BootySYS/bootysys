@extends('layout.main')

@section('content')


        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">{{ trans('auth.login-message') }}</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <form method="POST" action="{{ action('Auth\AuthController@postLogin') }}">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label for="email">{{ trans('auth.id') }}</label>
                        <input ng-model="email" type="text" name="email" id="identification" value="{{ old('email') }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="password">{{ trans('auth.password') }}</label>
                        <input ng-model="password" type="password" name="password" id="password" value="" class="form-control">
                    </div>

                    <button class="btn btn-default">{{ trans('auth.login') }}</button>
                </form>

            </div>
        </div>

@stop
