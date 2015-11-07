@extends('layout.main')

@section('content')


    <div ng-app="app" ng-controller="ModulesController">

        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h3>
                        Modules
                        <a ng-show="state === 'all'" ng-click="addModule()" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> Add module</a>
                        <a ng-show="state === 'add'" ng-click="cancel()" class="btn btn-danger btn-sm pull-right">Cancel</a>
                    </h3>
                </div>
            </div>
        </div>

        <div ng-show="state === 'all'" ng-cloak>
            <div ng-if="modules.length == 0">
                <div class="col-lg-12">
                    <div class="well well-lg">
                        <h4><i class="fa fa-exclamation-circle"></i> There are no modules yet</h4>
                        <p>
                            A module can contain courses and lectures with their respective groups. <br>
                            You can either create <a href="{{ action('ModulesController@create') }}">a module manually here</a>,
                            or go ahead and try our <a href="file">file importer</a>.
                        </p>
                    </div>
                </div>
            </div>

            <div ng-show="modules.length > 0">
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
                    </table>
                </div>
            </div>
        </div>

        <div ng-show="state === 'add'" ng-cloak>
            <div class="col-lg-8">

                <form ng-submit="submitNewModule()">
                    <div class="form-group">
                        <label>Name</label>
                        <input ng-model="newModule.name" name="name" class="form-control" value="" placeholder="The module name">
                    </div>

                    <div class="form-group">
                        <label>Short Name</label>
                        <input ng-model="newModule.short_name" name="short_name" class="form-control" value="" placeholder="A short name for the module">
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea ng-model="newModule.description" rows="8" name="description" class="form-control" value="" placeholder="Describe the module"></textarea>
                    </div>

                    <label>Professor(s)</label>


                    <small class="text-muted">
                        You can select multiple professors, which are responsible for this course.
                    </small>
                    <br>
                    <br>
                    <input type="submit" class="btn btn-primary" value="Save" />
                </form>

            </div>

            <div class="col-lg-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Information
                    </div>
                    <div class="panel-body">
                        <p>When you've created the module, you can add courses and lectures to it later.</p>
                    </div>
                </div>
            </div>

        </div>

    </div>

@stop