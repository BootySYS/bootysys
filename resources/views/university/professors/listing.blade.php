@extends('layout.main')

@section('content')


    <div ng-app="app" ng-controller="ProfessorsController">

        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h3>
                        Professors
                        <a ng-show="state === 'all'" ng-click="addProfessor()" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> Add professor</a>
                        <a ng-show="state === 'add'" ng-click="cancel()" class="btn btn-danger btn-sm pull-right"> cancel</a>
                    </h3>
                </div>
            </div>
        </div>


        <div ng-show="state === 'all'" ng-cloak>

            <div ng-show="professors.length > 0">
                <div class="col-lg-12">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>

            <div ng-if="professors.length == 0">
                <div class="col-lg-12">
                    <div class="well well-lg">
                        <h4><i class="fa fa-exclamation-circle"></i> You have no professors yet.</h4>
                        <p>
                            A professor can see and manage their courses. After you enter a professor or lecturer the person will receive an email with a password. <br>
                            You can either create <a href="{{ action('ProfessorsController@create') }}">a professor manually here</a>,
                            or go ahead and try our <a href="file">file importer</a>.
                        </p>
                    </div>
                </div>
            </div>

            <div ng-if="professors.length > 0">
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>



        <div ng-show="state === 'add'" ng-cloak>

            <form ng-submit="submitNewProfessor()" name="professorForm">
                <div class="form-group">
                    <label>First Name</label>
                    <input ng-model="newProfessor.first_name" name="first_name" class="form-control" value="" placeholder="First Name">
                </div>

                <div class="form-group">
                    <label>Short Name</label>
                    <input ng-model="newProfessor.last_name" name="last_name" class="form-control" value="" placeholder="Last Name">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input ng-model="newProfessor.email" name="email" class="form-control" value="" placeholder="Email">
                </div>

                <br>
                <input type="submit" class="btn btn-primary" value="Save" />

            </form>

        </div>

    </div>


@stop