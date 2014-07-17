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

    <!-- jQuery -->
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>

    <!-- Optional theme -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <!-- CSS for the website -->
    <link href="assets/css/style.css" rel="stylesheet">

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
                    <a class="navbar-brand" href="/menu">Home</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="/nap">Nap</a></li>
                        <li><a href="/diaper">Diaper</a></li>
                        <li><a href="/eating">Eating</a></li>
                        @if (Auth::check())
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}<span class="caret"></span></a>
                                <ul class="dropdown-menu list-group" role="menu">
                                    @foreach ( Auth::user()->babies as $baby)
                                        <li class="list-group-item">{{ $baby->name }}</li>
                                    @endforeach
                                    <li><a href="/logout">Logout</a></li>
                                </ul>
                            </li>
                        @else
                            <li><a href="/login">Log In</a></li>
                        @endif
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container -->
        </nav>

        <div>
            @if (Session::has('successMessage'))
                <div class="alert alert-success">{{{ Session::get('successMessage') }}}</div>
            @endif
            @if (Session::has('errorMessage'))
                <div class="alert alert-danger">{{{ Session::get('errorMessage') }}}</div>
            @endif
        </div>

        @yield('content')

    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<!--     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="assets/js/classie.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/smoothscroll.js"></script>
    <script src="assets/js/jquery.stellar.min.js"></script>
    <script src="assets/js/fancybox/jquery.fancybox.js"></script>
    <script src="assets/js/main.js"></script>
 -->
</body>
</html>