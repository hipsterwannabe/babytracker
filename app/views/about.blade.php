@extends('layouts.master')
@section('topscript')
<link rel="stylesheet" type="text/css" href="/assets/css/font-awesome.css">
<style type="text/css">
    .center {
    margin: auto;
    width: 70%;
    }
    .fa:hover, .fa:visited, .fa:link, .fa:active
    {
        text-decoration: none;
    }
</style>
@stop
@section('content')

<h1>About The Team</h1>
<div clas="container">
    <div class="row">
        <div class="col-md-4">
            <div class="thumbnail">
                <img src="headshot1" alt="...">
                <div class="caption">
                    <h3>Ashley Webb</h3>
                    <h5>"Project Manager"</h5>
                    <p>Wee-wee doodoo doo yaya pewie doodoo ga. Ga stinky gaga gaagaa ya. Laa yaya yaya ya goo gaagaa laa doo doodoo gaga gaga ga. Laalaa gaga ga dada doo da dada doo ya laalaa. Owie dada googoo ya doo googoo yaya gaagaa gaagaa yaya googoo ga. Goo da laa gaagaa yaya gaga laalaa dada doo din-din doggy laa. Laalaa ya doo gaagaa mama binkie .</p>
                    <div class="row center">
                        <a href="#" class="fa fa-5x fa-twitter"></a>
                        <a href="#" class="fa fa-5x fa-linkedin-square"></a>
                        <a href="#" class="fa fa-5x fa-github"></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="thumbnail">
                <img src="headshot2" alt="...">
                    <div class="caption">
                    <h3>Danny Jimenez</h3>
                    <h5>"Gif Coordinator"</h5>
                    <p>As the comic relief and provider of positive energy, my part in this project was that much greater. My natural focus on user interface and experience, keeping simplicity as our focus was key to creating a great experience for new parents. </p>
                    <div class="row center">
                        <a href="#" class="fa fa-5x fa-twitter"></a>
                        <a href="#" class="fa fa-5x fa-linkedin-square"></a>
                        <a href="#" class="fa fa-5x fa-github"></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="thumbnail">
                <img src="/images/gregtux.jpg" data-alt-src="/images/babygreg.jpg"class="img-responsive img-circle headshot3" alt="...">
                <div class="caption">
                    <h3>Greg Vallejo</h3>
                    <h5>"Snacks Coordinator"</h5>
                    <p>I have no kids, but I've enjoyed working on this project. Not only have I put my code and design skills to the test, but I've learned a lot about what new parents face. I believe this app will help parents ease into a new phase of their lives.</p>
                    <div class="row center">
                        <a href="http://twitter.com/Greg_Vallejo" class="fa fa-5x fa-twitter"></a>
                        <a href="https://www.linkedin.com/in/gregvallejo" class="fa fa-5x fa-linkedin-square"></a>
                        <a href="https://github.com/hipsterwannabe/" class="fa fa-5x fa-github"></a>
                    </div>
                </div>
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
