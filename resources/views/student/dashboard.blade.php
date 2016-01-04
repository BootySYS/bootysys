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

    <div class="col-lg-6 col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"></div>
                        <div>Teams</div>
                    </div>
                </div>
            </div>
            <a href="/teams">
                <div class="panel-footer">
                    <span class="pull-left">Your Teams</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    </div>

@stop