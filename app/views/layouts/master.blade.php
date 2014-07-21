<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">

    <title>BabyTracker</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <style>body { padding-top: 70px; }</style>

    <!-- moment.js -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.7.0/moment.min.js"></script>

    <!-- Amelia stylesheet -->
    <link rel="stylesheet" href="/css/amelia.css">

    <!-- flipclock styling -->
    <link rel="stylesheet" type="text/css" href="/assets/FlipClock-master/compiled/flipclock.css">

    @yield('topscript')

</head>

<body data-spy="scroll" data-offset="0" data-target="#theMenu">

    <div class="container">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    @if (Auth::check())
                        <a class="navbar-brand" href="/menu">Menu</a>
                        <a class="navbar-brand" href="/graphs/{id}">Graphs</a>
                    @endif
                    <a class="navbar-brand" href="/about">About Us</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::check())
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    @foreach ( Auth::user()->babies as $baby)
                                        <li><a href="/menu/{{$baby->id}}" >{{ $baby->name }}</a></li>
                                    @endforeach
                                    <li><a href="/logout">Logout</a></li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container -->
        </nav>

        @if (Session::has('successMessage'))
            <div class="alert alert-success" role="alert">
                {{{ Session::get('successMessage') }}}
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                </button>
            </div>
        @endif
        @if (Session::has('errorMessage'))
            <div class="alert alert-danger" role="alert">
                {{{ Session::get('errorMessage') }}}
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                </button>
            </div>
        @endif

        @yield('content')

    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="/assets/js/classie.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/smoothscroll.js"></script>
    <script src="/assets/js/jquery.stellar.min.js"></script>
    <script src="/assets/js/fancybox/jquery.fancybox.js"></script>
    <script src="/assets/js/main.js"></script>

    @yield('bottomscript')
</body>
</html>