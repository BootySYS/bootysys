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
                        <li class="active"><a href="#">Your Modules</a></li>
                        <li><a href="#">Requests</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>


<h1><small>Your Modules</small></h1>

<div>
    <div>
        <label for="sel1">Select a Team:</label>
        <select class="form-control" id="sel1">
            <option>443</option>
            <option>235</option>
            <option>333</option>
        </select>
    </div>

    <br/>
    <table class="table table-striped">
        <tr>
            <th>Name</th>
            <th>Short Name</th>
            <th>Description</th>
            <th>leave</th>
        </tr>
        <tr>
            <td>Algorithmen und Datenstrukturen</td>
            <td>AD</td>
            <td>Everything about algorithms</td>
            <td><button type="delete" class="btn btn-default btn-xs">leave</button></td>
        </tr>
        <tr>
            <td>Mathematik</td>
            <td>Ma</td>
            <td>Basics of maths</td>
            <td><button type="delete" class="btn btn-default btn-xs">leave</button></td>
        </tr>
        <tr>
            <td>Software Engineering 2</td>
            <td>SE2</td>
            <td>The most important subject of a software engineer</td>
            <td><button type="delete" class="btn btn-default btn-xs">leave</button></td>
        </tr>
    </table>
</div>