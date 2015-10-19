@extends('layout.marketing')

@section('content')

        <form class="form-horizontal" method="POST" action="{{ action('Auth\AuthController@postLogin') }}">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="email" class="col-sm-3 control-label">{{ trans('auth.email') }}</label>
                <div class="col-sm-9">
                    <input type="text" name="email" id="identification" value="{{ old('email') }}" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label" for="password">{{ trans('auth.password') }}</label>
                <div class="col-sm-9">
                    <input type="password" name="password" id="password" value="" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember"> Remember me, please
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <button class="btn btn-primary">{{ trans('auth.login') }}</button>
                </div>
            </div>

        </form>
        <br>

@stop
