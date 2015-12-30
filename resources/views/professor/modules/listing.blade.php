@extends('layout.main')

@section('content')


    <div ng-controller="ProfessorsModulesController" ng-cloak>
        <loader ng-show="loading"></loader>
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h3>
                        Your Modules
                    </h3>
                </div>
            </div>
        </div>


        <div class="row">
            <div ng-show="state === 'all'" ng-cloak>
                <div ng-show="modules.length > 0">
                    <div class="col-lg-12">
                        <table class="table table-striped table-bordered table-hover modules-table">
                            <thead>
                            <tr>
                                <th>Short name</th>
                                <th>Module name</th>
                            </tr>
                            </thead>

                            <tbody>

                            <tr ng-repeat="module in modules">
                                <td>@{{ module.short_name }}</td>
                                <td><a ng-click="showModule(module)">@{{ module.name }}</a></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

                <div ng-show="modules.length == 0" ng-cloak>
                    <div class="col-lg-12">
                        <div class="well well-lg">
                            <h4>There are no modules yet</h4>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

@stop