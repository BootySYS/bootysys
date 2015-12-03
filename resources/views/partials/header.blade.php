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

                    {{--<li class="sidebar-search">
                        <i class="fa fa-search"></i>
                        <input type="text" class="" placeholder="Search...">
                    </li>--}}

                        <li>
                            <a href="{{ url('/dashboard') }}"><i class="fa fa-tachometer"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ action('ModulesController@index') }}"><i class="fa fa-book"></i> Modules</a>
                        </li>
                        <li>
                            <a href="{{ action('ProfessorsController@index') }}"><i class="fa fa-user"></i> Professors</a>
                        </li>
                        <li>
                            <a href="{{ action('StudentsController@index') }}"><i class="fa fa-graduation-cap"></i> Students</a>
                        </li>

                        @can('manage-university')
                            <li>
                                <a href="#"><i class="fa fa-download"></i> File Import</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-upload"></i> Export Data</a>
                            </li>
                        @endcan

                </ul>
            </div>
        </div>
    </nav>
</header>
