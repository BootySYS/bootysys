
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>




<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Teammanagement</a>
        </div>
        <div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Add Members</a></li>
                <li><a href="#">Join Modules</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Your Teams <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Your Teams</a></li>
                        <li><a href="#">Your Modules</a></li>
                        <li><a href="#">Requests</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="page-header">
    <h1><small>Add Teammember to your Team</small></h1>
</div>

<form class="navbar-form navbar-left" role="search">
    <div class="form-group">
        <input type="text" class="form-control" placeholder="Last Name or Enrollment Number">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>

<div>
    <table class="table table-striped">
        <tr>
            <th>Enrollment Number</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>add</th>
        </tr>
        <tr>
            <td>abl934</td>
            <td>Emmentaler</td>
            <td>Halffat</td>
            <td><button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal">add to a Team</button>

                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">

                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Select the Team </h4>
                            </div>
                            <div class="modal-body">
                                <div id="modalShareBody" class="modal-body">
                                    <label for="sel1">Select a Team (select one):</label>
                                    <select class="form-control" id="sel1">
                                        <option>443</option>
                                        <option>235</option>
                                        <option>333</option>
                                        <option>Create a new Team</option>
                                    </select>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>abl935</td>
            <td>Feta</td>
            <td>Kaese</td>
            <td><button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal">add to a Team</button>

                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">

                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Select the Team </h4>
                            </div>
                            <div class="modal-body">
                                <div id="modalShareBody" class="modal-body">
                                    <label for="sel1">Select a Team (select one):</label>
                                    <select class="form-control" id="sel1">
                                        <option>443</option>
                                        <option>235</option>
                                        <option>333</option>
                                    </select>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>abl933</td>
            <td>Gouda</td>
            <td>FullFat</td>
            <td><button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal">add to a Team</button>

                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">

                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Select the Team </h4>
                            </div>
                            <div class="modal-body">
                                <div id="modalShareBody" class="modal-body">
                                    <label for="sel1">Select a Team (select one):</label>
                                    <select class="form-control" id="sel1">
                                        <option>443</option>
                                        <option>235</option>
                                        <option>333</option>
                                    </select>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</div>
