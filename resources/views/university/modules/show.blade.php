@extends('layout.main')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="page-header">
                <h3>
                    {{ $module->name }}
                </h3>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <table class="table module-table">
                <tr>
                    <td><strong>Short Name</strong></td>
                    <td>{{ $module->short_name }}</td>
                </tr>
                <tr>
                    <td><strong>Description</strong></td>
                    <td>{{ $module->description }}</td>
                </tr>
                <tr>
                    <td><strong>Responsible Professors</strong></td>
                    <td>
                        @foreach($module->professors as $professor)
                            <li>{{ $professor->name }}</li>
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td><strong>Groups</strong></td>
                    <td>
                        {{ $module->groups }}
                    </td>
                </tr>
            </table>
        </div>
    </div>
@stop