<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>ChartBabe | Login</title>
    <!-- Description, Keywords and Author -->
    <meta name="description" content="Ditch the pen and paper. Log in and let's chart, babe!">
    <meta name="keywords" content="baby,tracker,charting,app,new,mom">
    <meta name="author" content="Ashley Webb, Greg Vallejo, Danny Jimenez">

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

    <!-- moment.js -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.7.0/moment.min.js"></script>

    <!-- flipclock styling -->
    <link rel="stylesheet" type="text/css" href="/assets/FlipClock-master/compiled/flipclock.css">

</head>

<body>

    <div class="out-container">

        <div class="col-lg-offset-4 col-lg-4">
            <!-- image/logo will go here -->
        </div>


        <div class="login-page">
            <div class="container">


                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-justified">
                    <li class="active"><a href="#login" data-toggle="tab"><i class="fa fa-sign-in"></i> Login</a></li>
                    <li><a href="#register" data-toggle="tab"><i class="fa fa-pencil"></i> Register</a></li>
                    <li><a href="#contact" data-toggle="tab"><i class="fa fa-envelope"></i> Contact</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane fade active in" id="login">

                        <!-- Login form -->
                        {{ Form::open(array('action' => 'HomeController@doLogin')) }}
                        <div class="form-group">
                            {{ Form::label('email', 'Email') }}
                            {{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Email')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('password', 'Password') }}
                            {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}
                        </div>

                        {{ Form::submit('Log In', array('class' => 'btn btn-danger btn-sm')) }}
                        {{ Form::close() }}

                    </div>


                    <div class="tab-pane fade" id="register">

                        <!-- Register form -->
                        {{ Form::open(array('action' => 'UserController@newUser')) }}
                        <div class="form-group">
                            {{ Form::label('name', 'Name') }}
                            {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Name')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('new_email', 'Email') }}
                            {{ Form::text('new_email', null, array('class' => 'form-control', 'placeholder' => 'Email')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('password', 'Password') }}
                            {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('cpassword', 'Confirm Password') }}
                            {{ Form::password('cpassword', array('class' => 'form-control', 'placeholder' => 'Confirm Password')) }}
                        </div>

                        {{ Form::submit('Create User', array('class' => 'btn btn-danger btn-sm')) }}
                        {{ Form::close() }}

                    </div>


                    <div class="tab-pane fade" id="contact">

                        <!-- Contact Form -->
                        <form role="form" action="index.html">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea rows="3" class="form-control"></textarea>
                            </div>
                            <button type="submit" class="btn btn-danger btn-sm">Submit</button>
                            <button type="reset" class="btn btn-black btn-sm">Reset</button>
                        </form>

                    </div>
                </div> <!-- Tab content -->

            </div> <!-- Container -->
        </div> <!-- Log in page -->

    </div> <!-- Out-container -->


    <!-- Javascript files -->
    <!-- jQuery -->
    <script src="/sheldon/theme/js/jquery.js"></script>
    <!-- Bootstrap JS -->
    <script src="/sheldon/theme/js/bootstrap.min.js"></script>
    <!-- Respond JS for IE8 -->
    <script src="/sheldon/theme/js/respond.min.js"></script>
    <!-- HTML5 Support for IE -->
    <script src="/sheldon/theme/js/html5shiv.js"></script>

</body>
</html>
