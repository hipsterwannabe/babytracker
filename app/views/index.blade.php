<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BabyTracker</title>
</head>
<body>
    <h1>This is the new BabyTracker app!</h1>

    <!-- Create new user form -->
    {{ Form::open(array('action' => 'HomeController@newUser')) }}

    {{ Form::label('name', 'Name') }}
    {{ Form::text('name') }}

    {{ Form::label('email', 'Email') }}
    {{ Form::text('email') }}

    {{ Form::label('password', 'Password') }}
    {{ Form::password('password') }}

    {{ Form::submit('Create User') }}

    {{ Form::close() }}
</body>
</html>