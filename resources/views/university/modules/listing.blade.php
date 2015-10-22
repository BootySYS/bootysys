@extends('layout.main')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="page-header">
                <h3>
                    Modules
                    <a href="{{ action('ModulesController@create') }}" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> Add module</a>
                </h3>
            </div>
        </div>
    </div>

    <div class="row">
        @if(count($modules) == 0)
            <div class="col-lg-12">
                <div class="well well-lg">
                    <h4><i class="fa fa-exclamation-circle"></i> You have no modules yet</h4>
                    <p>
                        A module can contain courses and lectures with their respective groups. <br>
                        You can either create <a href="{{ action('ModulesController@create') }}">a module manually here</a>,
                        or go ahead and try our <a href="file">file importer</a>.
                    </p>
                </div>
            </div>
        @else
            <div class="col-lg-12">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Short name</th>
                            <th>Module name</th>
                            <th>Professor(s)</th>
                            <th></th>
                        </tr>
                    </thead>

                    @foreach($modules as $module)
                        <tr>
                            <td>{{ $module->short_name }}</td>
                            <td><a href="{{ action('ModulesController@show', ['id' => $module->id]) }}">{{ $module->name }}</a></td>
                            <td>
                                <ul class="list">
                                    @foreach($module->professors as $professor)
                                        <li>{{ $professor->title }} {{ $professor->first_name }} {{ $professor->last_name }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td class="text-center">
                                <a href="{{ action('ModulesController@edit', ['id' => $module->id]) }}" class="btn btn-default btn-sm"><i class="fa fa-edit"></i> Edit</a>
                            </td>
                        </tr>
                    @endforeach

                </table>
            </div>
        @endif
    </div>

@stop