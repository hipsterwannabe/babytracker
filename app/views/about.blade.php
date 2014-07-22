@extends('layouts.master')
@section('topscript')
<link rel="stylesheet" type="text/css" href="/assets/css/font-awesome.css">
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
	        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
	      </div>
	    </div>
	  </div>
	
	  <div class="col-md-4">
	    <div class="thumbnail">
	      <img src="headshot2" alt="...">
	      <div class="caption">
	        <h3>Danny Jimenez</h3>
	        <h5>"Gif Coordinator"</h5>
	        <p>Wee-wee doodoo doo yaya pewie doodoo ga. Ga stinky gaga gaagaa ya. Laa yaya yaya ya goo gaagaa laa doo doodoo gaga gaga ga. Laalaa gaga ga dada doo da dada doo ya laalaa. Owie dada googoo ya doo googoo yaya gaagaa gaagaa yaya googoo ga. Goo da laa gaagaa yaya gaga laalaa dada doo din-din doggy laa. Laalaa ya doo gaagaa mama binkie .</p>
	        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
	      </div>
	    </div>
	  </div>
	  <div class="col-md-4">
	    <div class="thumbnail">
	      <img src="/images/gregtux.jpg" data-alt-src="/images/babygreg.jpg"class="img-responsive img-circle headshot3" alt="...">
	      <div class="caption">
	        <h3>Greg Vallejo</h3>
	        <h5>"Snacks Coordinator"</h5>
	        <p>Wee-wee doodoo doo yaya pewie doodoo ga. Ga stinky gaga gaagaa ya. Laa yaya yaya ya goo gaagaa laa doo doodoo gaga gaga ga. Laalaa gaga ga dada doo da dada doo ya laalaa. Owie dada googoo ya doo googoo yaya gaagaa gaagaa yaya googoo ga. Goo da laa gaagaa yaya gaga laalaa dada doo din-din doggy laa. Laalaa ya doo gaagaa mama binkie .</p>
	        <p><a href="http://twitter.com/Greg_Vallejo" class="fa-twitter"></a><a href="https://www.linkedin.com/in/gregvallejo" class=".fa-linkedin-square"></a><a href="https://github.com/hipsterwannabe/" class=".fa-github"></a></p>
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
