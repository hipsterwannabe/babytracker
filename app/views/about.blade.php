@extends('layouts.master')
@section('topscript')
<link rel="stylesheet" type="text/css" href="/assets/css/font-awesome.css">
<style type="text/css">
    .center {
    margin: auto;
    width: 100%;
    text-align: center;
    }
    .fa:hover, .fa:visited, .fa:link, .fa:active
    {
        text-decoration: none;
    }
    #team-header{
        text-align: center;
    }
</style>
@stop
@section('content')

<div class="out-container">
    <div class="row">
        <h1 id="team-header">About The Team</h1>
    </div>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="thumbnail">
                    <img src="/images/ashley3.jpg" data-alt-src="/images/ashley-baby.jpg" class="img-responsive img-circle headshot3" alt="Ashley Webb">
                    <div class="caption">
                        <h3>Ashley Webb</h3>
                        <h5>[ Project Manager ]</h5>
                        <p>
                            Chart Babe is my brain child. It was born from my frustration with
                            other charting apps that I tried with my son. I wanted to give new mothers
                            an easy way to keep track of this vital information, as becoming a mom is
                            stressful and usually involves a noteworthy amount of sleep deprivation.
                        </p>
                        <hr>
                        <div class="row center">
                            <a href="https://twitter.com/AshleyLeonaWebb" class="fa fa-5x fa-twitter"></a>
                            <a href="http://www.linkedin.com/in/ashleyleonawebb/" class="fa fa-5x fa-linkedin-square"></a>
                            <a href="https://github.com/ashwebb" class="fa fa-5x fa-github"></a>
                        </div>
                    </div>
                </div>
            </div>


        <div class="col-md-4">
            <div class="thumbnail">
                <img src="/images/danny.jpg" data-alt-src="/images/young_danny.jpg" class="img-responsive headshot3" alt="...">
                    <div class="caption">
                    <h3>Danny Jimenez</h3>
                        <h5>[ Gif Coordinator ]</h5>
                        <p>
                            As the comic relief and provider of positive energy, my part in this project
                            was that much greater. My natural focus on user interface and experience,
                            keeping simplicity as our focus was key to creating a great experience for new
                            parents.
                        </p>
                        <br>
                        <br>
                        <hr>
                        <div class="row center">
                            <a href="https://twitter.com/dannyalxndr" class="fa fa-5x fa-twitter"></a>
                            <a href="http://www.linkedin.com/in/dannyalxndr" class="fa fa-5x fa-linkedin-square"></a>
                            <a href="https://github.com/dannyalxndr" class="fa fa-5x fa-github"></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="thumbnail">
                    <img src="/images/greg_02.jpg" data-alt-src="/images/Greg-baby.jpg" class="img-responsive img-circle headshot3" alt="Greg Vallego">
                    <div class="caption">
                        <h3>Greg Vallejo</h3>
                        <h5>[ Chart Warrior ]</h5>
                        <p>
                            I have no kids, but I've enjoyed working on this project. Not only have I put
                            my code and design skills to the test, but I've learned a lot about what new
                            parents face. I believe this app will help parents ease into a new phase of
                            their lives.
                        </p>
                        <br>
                        <br>
                        <hr>
                        <div class="row center">
                            <a href="http://twitter.com/Greg_Vallejo" class="fa fa-5x fa-twitter"></a>
                            <a href="https://www.linkedin.com/in/gregvallejo" class="fa fa-5x fa-linkedin-square"></a>
                            <a href="https://github.com/hipsterwannabe/" class="fa fa-5x fa-github"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <a href="/menu" class="btn btn-lg btn-warning"><i class="fa fa-chevron-left"></i> Return to Menu</a>
            </div>
        </div>

    </div>
</div>

@stop

@section('bottomscript')
<script>
$(document).ready(function() {
    var sourceSwap = function () {
        var $this = $(this);
        var newSource = $this.data('alt-src');
        $this.data('alt-src', $this.attr('src'));
        $this.attr('src', newSource);
    }
    $(function () {
        $('.headshot3').hover(sourceSwap, sourceSwap);
    });
});
</script>
@stop
