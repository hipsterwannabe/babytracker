<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BabyTracker</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    <!-- jQuery -->
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>

    <!-- Optional theme -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-offset-4 col-md-4">
                <h1>BabyTracker</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-offset-1 col-md-10">
                <!-- Create new user form -->
                {{ Form::open(array('action' => 'HomeController@newUser', 'class' => 'form-inline')) }}

                <div class="form-group">
                    {{ Form::label('name', 'Name', array('class' => 'sr-only')) }}
                    {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Enter name')) }}
                </div>

                <div class="form-group">
                    {{ Form::label('email', 'Email', array('class' => 'sr-only')) }}
                    {{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Enter email')) }}
                </div>

                <div class="form-group">
                    {{ Form::label('password', 'Password', array('class' => 'sr-only')) }}
                    {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Enter password')) }}
                </div>

                {{ Form::submit('Create User', array('class' => 'btn btn-primary')) }}

                {{ Form::close() }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-offset-1 col-md-10">
                <!-- Create new user form -->
                {{ Form::open(array('action' => 'HomeController@newUser', 'class' => 'form-inline')) }}

                <div class="form-group">
                    {{ Form::label('name', 'Name', array('class' => 'sr-only')) }}
                    {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Enter name')) }}
                </div>

                <div class="form-group">
                    {{ Form::label('email', 'Email', array('class' => 'sr-only')) }}
                    {{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Enter email')) }}
                </div>

                <div class="form-group">
                    {{ Form::label('password', 'Password', array('class' => 'sr-only')) }}
                    {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Enter password')) }}
                </div>

                {{ Form::submit('Create User', array('class' => 'btn btn-primary')) }}

                {{ Form::close() }}
            </div>
        </div>
    </div>
</body>
</html>