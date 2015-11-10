@extends('layout.main')

@section('content')


    <div ng-controller="ModulesController" ng-cloak>
        <loader ng-show="loading"></loader>
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h3 ng-cloak>
                        <span ng-show="state == 'all'">@{{ modules.length }} Module(s)</span>
                        <span ng-show="state == 'add'">
                            @{{ newModule.name ? newModule.name : 'Create a new module' }}
                        </span>
                        <a ng-if="state === 'all'" ng-click="addModule()" class="btn btn-primary btn-sm pull-right" ng-cloak><i class="fa fa-plus"></i> Add module</a>
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
                                <th>Professor(s)</th>
                            </tr>
                            </thead>

                            <tbody>

                                <tr ng-repeat="module in modules">
                                    <td>@{{ module.short_name }}</td>
                                    <td><a ng-click="showModule(module)">@{{ module.name }}</a></td>
                                    <td>
                                        <ul class="list-unstyled">
                                            <li ng-repeat="professor in module.professors">
                                                @{{ professor.first_name }} @{{ professor.last_name }}
                                            </li>
                                        </ul>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

                <div ng-show="modules.length == 0" ng-cloak>
                    <div class="col-lg-12">
                        <div class="well well-lg">
                            <h4>There are no modules yet</h4>
                            <p>
                                A module can contain courses and lectures with their respective groups. <br>
                                You can either create <a ng-click="addModule()">a module manually here</a>,
                                or go ahead and try our <a href="file">file importer</a>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div ng-show="state === 'add'" ng-cloak>
                <div class="col-lg-8">
                    <uib-alert ng-repeat="alert in alerts" type="@{{alert.type}}" close="closeAlert($index)">
                        <p>
                            <strong>Whoops!</strong> There were some errors:
                        </p>
                        <ul>
                            <li ng-repeat="message in alert.msg">
                                @{{ message }}
                            </li>
                        </ul>
                    </uib-alert>

                    <form name="moduleForm" ng-submit="submitNewModule()" novalidate>
                        <fieldset ng-disabled="loading">
                            <div class="form-group">
                                <label>Name</label>
                                <input ng-model="newModule.name" name="name" class="form-control" placeholder="The module name" required>
                            </div>

                            <div class="form-group">
                                <label>Short Name</label>
                                <input ng-model="newModule.short_name" name="short_name" class="form-control" placeholder="A short name for the module" required>
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea ng-model="newModule.description" rows="8" name="description" class="form-control" placeholder="Describe the module" required></textarea>
                            </div>
                            <hr>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Save" />
                                <a ng-if="state === 'add'" ng-click="cancel()" class="btn btn-danger " ng-cloak>Cancel</a>
                            </div>

                        </fieldset>
                    </form>

                </div>

                <div class="col-lg-4">

                    <professors-list professors="professors" on-select="addProfessor(professor)" de-select="removeProfessor(professor)"></professors-list>

                </div>

            </div>
        </div>
    </div>

@stop