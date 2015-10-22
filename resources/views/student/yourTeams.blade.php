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
                <li><a href="#">Join Modules</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Your Teams <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="active"><a href="#">Your Teams</a></li>
                        <li><a href="#">Your Modules</a></li>
                        <li><a href="#">Requests</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<h1><small>Your Teams</small></h1>

<div>
    <label for="sel1">Select a Team:</label>
    <select class="form-control" id="sel1">
        <option>443</option>
        <option>235</option>
        <option>333</option>
    </select>
</div>
<br/>
<br/>
<div class="container">
    <div class="progress" style="width: 80%">
        <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="10" style="width:20%">
            2/10
        </div>
    </div>
</div>
<div>
    <table class="table table-striped">
        <tr>
            <th>Enrollment Number</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Leader</th>
            <th>delete/leave</th>
        </tr>
        <tr>
            <td>abl944</td>
            <td>Eric</td>
            <td>Sermon</td>
            <td>-</td>
            <td><button type="delete" class="btn btn-default btn-xs">delete</button></td>
        </tr>

        <tr>
            <td>abl940</td>
            <td>Finn</td>
            <td>Masurat</td>
            <td>Leader</td>
            <td><button type="delete" class="btn btn-default btn-xs">leave</button></td>
        </tr>
    </table>
</div>