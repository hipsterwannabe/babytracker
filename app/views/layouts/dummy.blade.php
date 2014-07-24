<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>ChartBabe</title>
        <!-- Description, Keywords and Author -->
        <meta name="description" content="Your description">
        <meta name="keywords" content="Your,Keywords">
        <meta name="author" content="ResponsiveWebInc">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Styles -->
        <!-- Bootstrap CSS -->
        <link href="/sheldon/theme/css/bootstrap.min.css" rel="stylesheet">
        <!-- jQuery UI -->
        <link href="/sheldon/theme/css/jquery-ui.css" rel="stylesheet">


        <!-- jQuery Gritter -->
        <link href="/sheldon/theme/css/jquery.gritter.css" rel="stylesheet">
        <!-- Bootstrap Switch -->
        <link href="/sheldon/theme/css/bootstrap-switch.css" rel="stylesheet">
        <!-- jQuery Datatables -->
        <link href="/sheldon/theme/css/jquery.dataTables.css" rel="stylesheet">
        <!-- Rateit -->
        <link href="/sheldon/theme/css/rateit.css" rel="stylesheet">
        <!-- jQuery prettyPhoto -->
        <link href="/sheldon/theme/css/prettyPhoto.css" rel="stylesheet">
        <!-- Full calendar -->
        <link href="/sheldon/theme/css/fullcalendar.css" rel="stylesheet">
        <!-- Font awesome CSS -->
        <link href="/sheldon/theme/css/font-awesome.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="/sheldon/theme/css/style.css" rel="stylesheet">
        <!-- flipclock styling -->
        <link rel="stylesheet" type="text/css" href="/assets/FlipClock-master/compiled/flipclock.css">

      <!-- moment.js -->
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.7.0/moment.min.js"></script>

        <!--[if IE]>
            <link rel="stylesheet" type="text/css" href="css/style-ie.css" />
        <![endif]-->

        <!-- Favicon -->
        <link rel="shortcut icon" href="#">

        @yield('topscript')

    </head>

    <body>

      <div class="out-container">
         <div class="outer">
            <!-- Sidebar starts -->
            <div class="sidebar">
                  <!-- Logo starts -->
                  <div class="logo">
                     <h1><a href="#">ChartBabe</a></h1>
                  </div>
                  <!-- Logo ends -->

                  <!-- Sidebar buttons starts -->
                  <div class="sidebar-buttons text-center">
                     <!-- User button -->
                     <div class="btn-group">
                       <a href="{{{ action('UserController@showCreateBaby') }}}" class="btn btn-black btn-xs"><i class="fa fa-user"></i></a>
                       <a href="{{{ action('UserController@showCreateBaby') }}}" class="btn btn-danger btn-xs">Add Baby</a>
                     </div>
                     <!-- Logout button -->
                     <div class="btn-group">
                       <a href="{{{ action('HomeController@logout') }}}" class="btn btn-black btn-xs"><i class="fa fa-power-off"></i></a>
                       <a href="{{{ action('HomeController@logout') }}}" class="btn btn-danger btn-xs">Logout</a>
                     </div>
                  </div>
                  <!-- Sidebar buttons ends -->

                  <!-- Sidebar navigation starts -->

                  <div class="sidebar-dropdown"><a href="#">Navigation</a></div>

                  <div class="sidey">
                     <ul class="nav">
                         <!-- Main navigation. Refer Notes.txt files for reference. -->

                         <!-- Use the class "current" in main menu to hightlight current main menu -->
                         <li><a href="{{{ action('EventController@showCharts', $baby->id) }}}"><i class="fa fa-bar-chart-o"></i> Charts</a></li>
                         <li><a href="widgets.html"><i class="fa fa-folder-open"></i> Widgets</a></li>
                         <li><a href="extensions.html"><i class="fa fa-cog"></i> Extensions</a></li>
                         <li><a href="form.html"><i class="fa fa-list-alt"></i> Form</a></li>
                         <li><a href="tables.html"><i class="fa fa-table"></i> Tables</a></li>
                         <li><a href="users.html"><i class="fa fa-user"></i> Users</a></li>

                     </ul>
                  </div> <!-- Sidebar navigation ends -->

            </div> <!-- Sidebar ends -->

            <!-- Mainbar starts -->
            <div class="mainbar">

                <!-- Black block starts -->
                <div class="blue-block">
                    <div class="page-title">
                        <h3 class="pull-left"><i class="fa fa-desktop"></i> {{{ Auth::user()->name }}} <span>Let's chart!</span></h3>
                        <div class="breads pull-right">
                            <a href="#">Home </a>/ <a href="#">Pages </a>/ Title
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <!-- Black block ends -->



                <!-- Content starts -->
                @yield('content')
                <!-- Content ends -->

            </div>
            <!-- Mainbar ends -->

            <div class="clearfix"></div>
         </div>
      </div>



      <!-- Scroll to top -->
      <span class="totop"><a href="#"><i class="fa fa-chevron-up"></i></a></span>

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

      <!-- Javascript files -->
      <!-- jQuery -->
      <script src="/sheldon/theme/js/jquery.js"></script>
      <!-- Bootstrap JS -->
      <script src="/sheldon/theme/js/bootstrap.min.js"></script>
      <!-- Sparkline for Mini charts -->
      <script src="/sheldon/theme/js/sparkline.js"></script>
      <!-- jQuery UI -->
      <script src="/sheldon/theme/js/jquery-ui.min.js"></script>

      <!-- jQuery flot -->
      <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
      <script src="/sheldon/theme/js/jquery.flot.min.js"></script>
      <script src="/sheldon/theme/js/jquery.flot.pie.min.js"></script>
      <script src="/sheldon/theme/js/jquery.flot.resize.min.js"></script>

      <!-- jQuery Knob -->
      <script src="/sheldon/theme/js/jquery.knob.js"></script>
      <!-- jQuery Data Tables -->
      <script src="/sheldon/theme/js/jquery.dataTables.min.js"></script>
      <!-- jQuery Knob -->
      <script src="/sheldon/theme/js/bootstrap-switch.min.js"></script>
      <!-- jQuery Knob -->
      <script src="/sheldon/theme/js/jquery.rateit.min.js"></script>
      <!-- jQuery prettyPhoto -->
      <script src="/sheldon/theme/js/jquery.prettyPhoto.js"></script>
      <!-- jquery slim scroll -->
      <script src="/sheldon/theme/js/jquery.slimscroll.min.js"></script>
      <!-- jQuery full calendar -->
      <script src="/sheldon/theme/js/fullcalendar.min.js"></script>
      <!-- Respond JS for IE8 -->
      <script src="/sheldon/theme/js/respond.min.js"></script>
      <!-- HTML5 Support for IE -->
      <script src="/sheldon/theme/js/html5shiv.js"></script>
      <!-- Custom JS -->
      <script src="/sheldon/theme/js/custom.js"></script>

        @yield('bottomscript')


    </body>
</html>