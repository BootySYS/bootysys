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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Your Team <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Your Team</a></li>
                        <li><a href="#">Your Modules</a></li>
                        <li class="active"><a href="#">Requests</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>




<h1><small>Requests</small></h1>
<div>
    <table class="table table-striped">
        <tr>
            <th>Team request</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>accept</th>
            <th>refuse</th>
        </tr>
        <tr>
            <td>330</td>
            <td>Emmentaler</td>
            <td>Halffat</td>
            <td><button type="add" class="btn btn-default btn-xs">accept</button></td>
            <td><button type="add" class="btn btn-default btn-xs">refuse</button></td>
        </tr>
        <tr>
            <td>445</td>
            <td>Feta</td>
            <td>Kaese</td>
            <td><button type="add" class="btn btn-default btn-xs">accept</button></td>
            <td><button type="add" class="btn btn-default btn-xs">refuse</button></td>
        </tr>
        <tr>
            <td>430</td>
            <td>Gouda</td>
            <td>FullFat</td>
            <td><button type="add" class="btn btn-default btn-xs">accept</button></td>
            <td><button type="add" class="btn btn-default btn-xs">refuse</button></td>
        </tr>
    </table>
</div>