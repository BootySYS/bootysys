<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>





<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Teammanagement</a>
        </div>
        <div>
            <ul class="nav navbar-nav">
                <li><a href="#">Add Members</a></li>
                <li class="active"><a href="#">Join Modules</a></li>
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

<div>
    <h1><small>Join Modules</small></h1>
</div>

<form class="navbar-form navbar-left" role="search">
    <div class="form-group">
        <input type="text" class="form-control" placeholder="Module or Short Name">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>

<div>
    <table class="table table-striped">
        <tr>
            <th>Name</th>
            <th>Short Name</th>
            <th>Description</th>
            <th>join</th>
        </tr>
        <tr>
            <td>Algorithmen und Datenstrukturen</td>
            <td>AD</td>
            <td>Everything about algorithms</td>
            <td>
                <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal">join with a Team</button>

                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">

                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Choose a Team to join with</h4>
                                </div>
                                <div id="modalShareBody" class="modal-body">
                                    <label for="sel1">Select a Team (select one):</label>
                                    <select class="form-control" id="sel1">
                                        <option>443</option>
                                        <option>235</option>
                                        <option>333</option>
                                    </select>
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
            <td>Mathematik</td>
            <td>Ma</td>
            <td>Basics of maths</td>
            <td>
                <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal">join with a Team</button>

                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">

                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Choose a Team to join with</h4>
                                </div>
                                <div id="modalShareBody" class="modal-body">
                                    <label for="sel1">Select a Team (select one):</label>
                                    <select class="form-control" id="sel1">
                                        <option>443</option>
                                        <option>235</option>
                                        <option>333</option>
                                    </select>
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
            <td>Software Engineering 2</td>
            <td>SE2</td>
            <td>The most important subject of a software engineer</td>
            <td>
                <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal">join with a Team</button>

                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">

                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Choose a Team to join with</h4>
                                </div>
                                <div id="modalShareBody" class="modal-body">
                                    <label for="sel1">Select a Team (select one):</label>
                                    <select class="form-control" id="sel1">
                                        <option>443</option>
                                        <option>235</option>
                                        <option>333</option>
                                    </select>
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

