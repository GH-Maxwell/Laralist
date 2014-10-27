<!DOCTYPE html>
    <html>
	<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSS files -->
        {{ HTML::style('css/bootstrap.min.css') }}
        {{ HTML::style('css/custom.css') }}
    </head>
    <body>
        <nav class="navbar navbar-default" role="navigation">
        <div class="container">
  
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <!-- Marvelist -->
        <a class="navbar-brand" href="/"><span class="glyphicon glyphicon-list"></span>Laralist</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        @if(Auth::check())
            <div class="user-dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
                    <img src="{{ gravatar_link(Auth::user()->email) }}" class="nav-gravatar" alt="{{ Auth::user()->username }}'s profile image">
                    {{ Auth::user()->username }}
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="/profile">Profile</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="/lists">Lists</a></li>
                    <li role="presentation" class="divider"></li>
                    <li role="presentation">{{ HTML::link('/logout', 'Logout') }}</li>
                </ul>
            </div>
        @else
            <li>{{ HTML::link('/login', 'Login') }}</li>
            <li>{{ HTML::link('/join', 'Sign Up') }}</li>
        @endif
      </ul>
    </div><!-- /.navbar-collapse -->
</div><!-- /.container -->
</nav>

        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        @yield('home')
        <div class="container">
            @if(Session::get('flash_message'))
                <div class="alert alert-warning alert-dismissible fade in" role="alert">
                  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                  <strong>{{ Session::get('flash_message') }}</strong>
                </div>
            @endif
        	@yield('content')
    	</div>

        <!-- JS files -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        {{ HTML::script('js/bootstrap.min.js') }}  
        {{ HTML::script('js/ajax.js') }}       
    </body>
</html>