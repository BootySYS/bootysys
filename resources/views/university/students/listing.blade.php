@extends('layout.main')

@section('content')


    <div ng-controller="StudentsController" ng-cloak>
        <loader ng-show="loading"></loader>
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h3 ng-cloak>
                        <span ng-show="state == 'all'">@{{ students.length }} Student(s)</span>
                        <span ng-show="state == 'add'">
                            @{{ newStudent.name ? newStudent.name : 'Create a new Student' }}
                        </span>
                        <a ng-if="state === 'all'" ng-click="addStudent()" class="btn btn-primary btn-sm pull-right" ng-cloak><i class="fa fa-plus"></i> Add student</a>
                    </h3>
                </div>
            </div>
        </div>

        <div ng-show="state === 'all'" ng-cloak>
            <div ng-show="students.length > 0">
                <div class="col-lg-12">
                    <table class="table table-striped table-bordered table-hover modules-table">
                        <thead>
                        <tr>
                            <th>first name</th>
                            <th>last name</th>
                            <th>email</th>
                            <th>major</th>
                            <th>semester</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>

                        <tbody>

                        <tr ng-repeat="student in students">
                            <td>@{{ student.first_name }}</td>
                            <td><a ng-click="showStudent(student)">@{{ student.last_name }}</a></td>
                            <td>@{{ student.email }}</td>
                            <td>@{{ student.major }}</td>
                            <td>@{{ student.semester }}</td>
                            <td>
                                <a ng-click="delete(student)">Delete</a>
                            </td>
                            <td>
                                <a ng-click="updateStudent(student)">Update</a>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>

            <div ng-show="students.length == 0" ng-cloak>
                <div class="col-lg-12">
                    <div class="well well-lg">
                        <h4>There are no students yet</h4>
                        <p>
                            A student can live, learn and have fun in your university<br>
                            You can either create <a ng-click="addStudent()">a student manually here</a>,
                            or go ahead and try our <a href="file">file importer</a>.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div ng-show="state === 'add'">
            <div class="row">
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

                    <form ng-submit="submitNewStudent()" name="studentForm">
                        <div class="form-group">
                            <label>First Name</label>
                            <input ng-model="newStudent.first_name" name="first_name" class="form-control" value="" placeholder="First Name">
                        </div>

                        <div class="form-group">
                            <label>Last Name</label>
                            <input ng-model="newStudent.last_name" name="last_name" class="form-control" value="" placeholder="Last Name">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input ng-model="newStudent.email" name="email" class="form-control" value="" placeholder="Email">
                        </div>

                        <div class="form-group">
                            <label>Major</label>
                            <input ng-model="newStudent.major" name="major" class="form-control" value="" placeholder="Major">
                        </div>

                        <div class="form-group">
                            <label>Semester</label>
                            <input ng-model="newStudent.semester" name="semester" class="form-control" value="" placeholder="Semester">
                        </div>

                        <br>
                        <input type="submit" class="btn btn-primary" value="Save" />
                        <a ng-show="state === 'add'" ng-click="cancel()" class="btn btn-danger"> cancel</a>
                    </form>
                </div>
            </div>


        </div>




        <div ng-show="state === 'update'">
            <div class="row">
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

                    <form ng-submit="updateOldStudent(studentToUpdate)" name="studentForm" method="post">
                        <div class="form-group">
                            <label>First Name</label>
                            <input ng-model="studentToUpdate.first_name" name="first_name" class="form-control" value="@{{ student.first_name }}">
                        </div>

                        <div class="form-group">
                            <label>Last Name</label>
                            <input ng-model="studentToUpdate.last_name" name="last_name" class="form-control" value="@{{ student.last_name }}">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input ng-model="studentToUpdate.email" name="email" class="form-control" value="@{{ student.email }}">
                        </div>

                        <div class="form-group">
                            <label>Major</label>
                            <input ng-model="studentToUpdate.major" name="major" class="form-control" value="" placeholder="@{{ student.major }}">
                        </div>

                        <div class="form-group">
                            <label>Semester</label>
                            <input ng-model="studentToUpdate.semester" name="semester" class="form-control" value="@{{ student.semester }}">
                        </div>

                        <br>
                        <input type="submit" class="btn btn-primary" value="Save" />
                        <a ng-show="state === 'update'" ng-click="cancel()" class="btn btn-danger"> cancel</a>
                    </form>
                </div>
            </div>


        </div>


    </div>







@stop