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
                        <li><a href="#">Your Teams</a></li>
                        <li><a href="#">Your Modules</a></li>
                        <li><a href="#">Requests</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<h1><small>Join a Team</small></h1>

<form class="navbar-form navbar-left" role="search">
    <div class="form-group">
        <input type="text" class="form-control" placeholder="Teamleader or Team ID">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>

<div overflow-y="auto" style="height:10px">
    <table class="table table-striped">
        <tr>
            <th>Team ID</th>
            <th>Leader</th>
            <th>Capacity</th>
            <th>join</th>

        </tr>
        <tr>
            <td>304</td>
            <td>Halffat</td>
            <td>5</td>
            <td><button type="join" class="btn btn-default btn-xs">join</button></td>
        </tr>
        <tr>
            <td>345</td>
            <td>Kaese</td>
            <td>10</td>
            <td>-</td>
        </tr>
        <tr>
            <td>491</td>
            <td>FullFat</td>
            <td>3</td>
            <td><button type="join" class="btn btn-default btn-xs">join</button></td>
        </tr>
    </table>
</div>