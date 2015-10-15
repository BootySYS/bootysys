<header>
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;">
        <div class="navbar-header">
            <a href="{{ url('/') }}" class="navbar-brand">bootysys</a>
        </div>

        <ul class="nav navbar-top-links navbar-right">

            @if(auth()->check())
                <li>
                    <a href="{{ action('Auth\AuthController@getLogout') }}"><i class="fa fa-sign-out"></i> {{ trans('messages.logout') }}</a>
                </li>
            @endif

        </ul>

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav">
                <ul class="nav in">
                    @yield('sidebar')
                </ul>
            </div>
        </div>
    </nav>
</header>
