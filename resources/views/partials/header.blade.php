<header>
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;">
        <div class="navbar-header">
            <a href="{{ url('dashboard') }}" class="navbar-brand">pazzam<i class="fa fa-asterisk"></i></a>
        </div>

        <ul class="nav navbar-top-links navbar-right">
            <li>
                <a href="{{ action('UsersController@show') }}">{{ auth()->user()->name }}</a>
            </li>
            <li>
                <a href="{{ action('Auth\AuthController@getLogout') }}"><i class="fa fa-sign-out"></i> {{ trans('messages.logout') }}</a>
            </li>
        </ul>

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav">
                <ul class="nav in">
                        <li>
                            <a href="{{ url('/dashboard') }}"><i class="fa fa-tachometer"></i> Dashboard</a>
                        </li>
                    @can('manage-university')

                            <li>
                                <a href="{{ action('ModulesController@index') }}"><i class="fa fa-book"></i> Modules</a>
                            </li>
                            <li>
                                <a href="{{ action('ProfessorsController@index') }}"><i class="fa fa-user"></i> Professors</a>
                            </li>
                            <li>
                                <a href="{{ action('StudentsController@index') }}"><i class="fa fa-graduation-cap"></i> Students</a>
                            </li>

                            <li>
                                <a href="{{ action('ImportExportController@index') }}"><i class="fa fa-download"></i> File Import</a>
                            </li>

                            <li>
                                <a href="{{ action('DistributionServerController@index') }}">Calculate Distribution</a>
                            </li>
                        @endcan

                        @can('is-professor')

                            <li>
                                <a href="{{ action('ProfessorsModulesController@index') }}"><i class="fa fa-book"></i> Modules</a>
                            </li>
                            <li>
                                <a href="{{ action('ProfessorsController@index') }}"><i class="fa fa-user"></i> Professors</a>
                            </li>
                            <li>
                                <a href="{{ action('StudentsController@index') }}"><i class="fa fa-graduation-cap"></i> Students</a>
                            </li>
                        @endcan

                        @can('is-student')

                            <li>
                                <a href="{{ action('TeamsController@index') }}"><i class="fa fa-users"></i> Teams</a>
                            </li>
                        @endcan
                </ul>
            </div>
        </div>
    </nav>
</header>
