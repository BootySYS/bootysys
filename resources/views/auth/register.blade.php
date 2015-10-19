@extends('layout.marketing')

@section('content')

    <div class="text-center">
        <h1>Register now!</h1>
        <p class="text-muted">
            Start using our tool for free. You can cancel at any given time.
        </p>
        <br>
    </div>

    <form class="form-horizontal" action="{{ action('RegisterController@register') }}" method="POST">

        {!! csrf_field() !!}

        <div class="form-group">
            <label class="col-sm-3 control-label" for="name">{{ trans('auth.university') }}</label>
            <div class="col-sm-9">
                <input type="text" name="name" value="{{ old('name') }}" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label" for="contact_first_name">{{ trans('auth.firstname') }}</label>
            <div class="col-sm-9">
                <input type="text" name="contact_first_name" value="{{ old('contact_first_name') }}" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label" for="contact_last_name">{{ trans('auth.lastname') }}</label>
            <div class="col-sm-9">
                <input type="text" name="contact_last_name" value="{{ old('contact_last_name') }}" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label" for="email">{{ trans('auth.email') }}</label>
            <div class="col-sm-9">
                <input type="text" name="email" value="{{ old('email') }}" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label" for="name">{{ trans('auth.state') }}</label>
            <div class="col-sm-9">
                <input type="text" name="state" value="{{ old('state') }}" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label" for="city">{{ trans('auth.city') }}</label>
            <div class="col-sm-9">
                <input type="text" name="city" value="{{ old('city') }}" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label" for="zip_code">{{ trans('auth.zip_code') }}</label>
            <div class="col-sm-9">
                <input type="text" name="zip_code" value="{{ old('zip_code') }}" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label" for="street">{{ trans('auth.street') }}</label>
            <div class="col-sm-9">
                <input type="text" name="street" value="{{ old('street') }}" class="form-control">
            </div>
        </div>
        <hr>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="password">{{ trans('auth.password') }}</label>
            <div class="col-sm-9">
                <input type="password" name="password" value="" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label" for="confirm_password">{{ trans('auth.confirm_password') }}</label>
            <div class="col-sm-9">
                <input type="password" name="confirm_password" value="" class="form-control">
            </div>
        </div>
        <div class="text-center">
            <button class="btn btn-success btn-lg">{{ trans('auth.register') }}</button>
        </div>
    </form>
    <br>
    <div class="clearfix"></div>
@stop