@extends('layout.main')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="page-header">
                <h3>Distribution processes</h3>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            @unless($distributions->isEmpty())
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Key</th>
                            <th>Started</th>
                            <th>Finished</th>
                        </tr>
                    </thead>
                    @foreach($distributions as $distribution)
                        <tr>
                            <td>{{ $distribution->event_key }}</td>
                            <td>{{ $distribution->started }}</td>
                            <td>{{ $distribution->finished }}</td>
                        </tr>
                    @endforeach
                </table>
            @endunless
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <a class="btn btn-primary" href="{{ action('DistributionServerController@start') }}">Start distribution calculation process</a>
        </div>
    </div>

@stop