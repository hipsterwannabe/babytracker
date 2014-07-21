@extends('layouts/master')


@section('content')

<style type="text/css">

html,body {
    position: relative;
    height: 100%;
}

.login-container{
    position: relative;
    width: 300px;
    margin: 80px auto;
    padding: 20px 40px 40px;
    text-align: center;
    background: #fff;
    border: 1px solid #ccc;
}

#output{
    position: absolute;
    width: 300px;
    top: -75px;
    left: 0;
    color: #fff;
}

#output.alert-success{
    background: rgb(25, 204, 25);
}

#output.alert-danger{
    background: rgb(228, 105, 105);
}

.login-container::before,.login-container::after{
    content: "";
    position: absolute;
    width: 100%;height: 100%;
    top: 3.5px;left: 0;
    background: #fff;
    z-index: -1;
    -webkit-transform: rotateZ(4deg);
    -moz-transform: rotateZ(4deg);
    -ms-transform: rotateZ(4deg);
    border: 1px solid #ccc;

}

.login-container::after{
    top: 5px;
    z-index: -2;
    -webkit-transform: rotateZ(-2deg);
     -moz-transform: rotateZ(-2deg);
      -ms-transform: rotateZ(-2deg);

}

.avatar{
    background: url(http://images.sodahead.com/polls/002145007/1156654708_450x316_alg_crying_baby_xlarge.jpeg);
    width: 100px;height: 100px;
    margin: 10px auto 30px;
    border-radius: 100%;
    border: 2px solid #aaa;
    background-size: cover;
}

.form-box input{
    width: 100%;
    padding: 10px;
    text-align: center;
    height:40px;
    border: 1px solid #ccc;;
    background: #fafafa;
    transition:0.2s ease-in-out;

}

.form-box input:focus{
    outline: 0;
    background: #eee;
}

.form-box {
    border-radius: 5px 5px 0 0;
    text-transform: lowercase;
}

.form-box {
    border-radius: 0 0 5px 5px;
    border-top: 0;
}

.form-box button.login{
    margin-top:15px;
    padding: 10px 20px;
}

.animated {
  -webkit-animation-duration: 1s;
  animation-duration: 1s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
}

@-webkit-keyframes fadeInUp {
  0% {
    opacity: 0;
    -webkit-transform: translateY(20px);
    transform: translateY(20px);
  }

  100% {
    opacity: 1;
    -webkit-transform: translateY(0);
    transform: translateY(0);
  }
}

@keyframes fadeInUp {
  0% {
    opacity: 0;
    -webkit-transform: translateY(20px);
    -ms-transform: translateY(20px);
    transform: translateY(20px);
  }

  100% {
    opacity: 1;
    -webkit-transform: translateY(0);
    -ms-transform: translateY(0);
    transform: translateY(0);
  }
}

.fadeInUp {
  -webkit-animation-name: fadeInUp;
  animation-name: fadeInUp;
}

</style>

    <div class="container">
        <div class="login-container">
            <div id="output"></div>
            <div class="avatar"></div>
                <!-- <form action="" method="">
                    <input name="user" type="text" placeholder="username">
                    <input type="password" placeholder="password">
                    <button class="btn btn-info btn-block login" type="submit">Login</button>
                </form> -->

                {{ Form::open(array('action' => 'HomeController@doLogin', 'class' => 'form-inline')) }}

                {{ Form::label('email', 'Email', array('class' => 'sr-only btn-block')) }}
                {{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Enter email')) }}

                {{ Form::label('password', 'Password', array('class' => 'sr-only btn-block')) }}
                {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Enter password')) }}

                {{ Form::submit('Log In', array('class' => 'btn btn-info btn-block login')) }}

                {{ Form::close() }}
                <div class="row">
                    <div class="col-md-offset-1 col-md-10">
                        <a href="/new-user">Create new user</a>
                    </div>
                </div>
        </div>
    </div>

@stop
