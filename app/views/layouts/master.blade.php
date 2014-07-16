<!DOCTYPE html>
<html lang="en">
  <head>
        <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    <!-- jQuery -->
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js">
    </script>

    <!-- Optional theme -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js">
    </script>

    <!-- CSS for the website -->
    <link href="assets/css/style.css" rel="stylesheet">
  </head>
    <div class="container">
        <nav class="navbar navbar-default navbar-static-top" role="navigation">
            <ul class="nav navbar-nav">
                <li><a href="/">Menu</a></li>
                <li><a href="/nap">Nap</a></li>
                <li><a href="/diaper">Diaper</a></li>
                <li><a href="/eating">Eating</a></li>
            </ul>
        </nav>
    </div>
    <body data-spy="scroll" data-offset="0" data-target="#theMenu">    
    <div>
	    @if (Session::has('successMessage'))
	    	<div class="alert alert-success">{{{ Session::get('successMessage') }}}</div>
		@endif
		@if (Session::has('errorMessage'))
		    <div class="alert alert-danger">{{{ Session::get('errorMessage') }}}</div>
		@endif
    </div>

    @yield('content')
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="assets/js/classie.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/smoothscroll.js"></script>
	<script src="assets/js/jquery.stellar.min.js"></script>
	<script src="assets/js/fancybox/jquery.fancybox.js"></script>    
	<script src="assets/js/main.js"></script>
    
</body>
</html>