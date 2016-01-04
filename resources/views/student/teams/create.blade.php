@extends('layout.main')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="page-header">
                <h3>Create a new team</h3>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">

            <form action="{{ action('TeamsController@store') }}" method="POST">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Name your group here...">
                </div>

                <div class="form-group">
                    <label for="participants">Participants</label>
                    <textarea name="participants" id="" cols="30" rows="5" class="form-control"></textarea>
                    <p class="help-block">
                        Enter the email addresses of the people you'd like to invite to your group. Those people will be notified via email.
                        Enter one address per line!
                    </p>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Submit">
                </div>
            </form>

        </div>
    </div>
@stop