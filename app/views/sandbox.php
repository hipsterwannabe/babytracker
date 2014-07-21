<!-- styling for this view -->
<style>
	#addChild {
		margin-top: 5px;
	}
	#selectChildHeader {
		text-align: center;
	}
</style>

<style>

html,
body {
  height: 100%;
  margin: 0;
  padding: 0;
}

body {
  margin-top: 70px;
  background: radial-gradient(center, ellipse cover, #b29f93 0%,#705f54 100%);
}

/* hide real input */
#btn {
  /*position: absolute;*/
  left:50%;
  z-index:-1;
  visibility: hidden;
}

.btn {
  width: 100px;
  height: 100px;
  display: block;
  border-radius: 10px;
  margin:0px auto;
  margin-top: 50px;
  user-select: none;   
  cursor:pointer;
  
  background: linear-gradient(top, #fff 0%,rgba(255,255,255,0.1) 3%),linear-gradient(bottom, #e9e4e0 0%,rgba(255,255,255,0.1) 3%), linear-gradient(top, #e5e0d8 0%,#f9f6f1 100%);
  
  box-shadow: 0px -3px 0px #d2cdc4, 0px 0px 0px 4px #777069, 0px -2px 0px 4px #777069, 0px 0px 0px 10px #f9f6f2, 0px -2px 0px 10px #f9f6f2, 0px 0px 0px 11px #f0ebe7, 0px -2px 0px 11px #f0ebe7, 0px 0px 0px 20px #f9f6f2, 0px 4px 1px 20px #e4e1dc, 0px -4px 0px 20px #fdfcfb, 0px 4px 20px 20px #000;
}

.btn:after {
  position: absolute;
  content: '';
  width: 25px;
  height: 8px;
  margin: 15px 37px;
	box-shadow: 0px 1px 3px rgba(0,0,0,0.4) inset, 0px 1px 0px #fff;
	border-radius: 15px;
	background: rgba(90, 90, 90, .35);
}

/* switch button: on + glow in the dark */
#btn:checked ~ .btn {
	background: linear-gradient(bottom, #e9e4e0 0%,rgba(255,255,255,0.1) 3%), linear-gradient(top, #e5e0d8 0%,#f9f6f1 100%);
  
	box-shadow: 0px -4px 0px #d2cdc4 inset, 0px -3px 0px #e5e0d8, 0px 0px 0px 4px #777069, 0px -2px 0px 4px #777069, 0px 0px 0px 10px #f9f6f2, 0px -2px 0px 10px #f9f6f2, 0px 0px 0px 11px #f0ebe7, 0px -2px 0px 11px #f0ebe7, 0px 0px 0px 20px #f9f6f2, 0px 4px 1px 20px #e4e1dc, 0px -4px 0px 20px #fdfcfb, 0px 4px 20px 20px #000, 150px 0 100px rgba(240, 240, 0, 0);
  
  animation: nightwatch 3.25s infinite ease-in -.85s;
}

@keyframes nightwatch {
  0%, 80%, 100% {
    box-shadow: 
      0px -3px 0px rgba(234, 230, 223, 1), 
      inset 0px -3px 0px rgba(210, 205, 196, .5), 
      0px 0px 0px 4px #777069, 
      0px -2px 0px 4px #777069, 
      0px 0px 0px 10px #f9f6f2, 
      0px -2px 0px 10px #f9f6f2, 
      0px 0px 0px 11px #f0ebe7, 
      0px -2px 0px 11px #f0ebe7, 
      0px 0px 0px 20px #f9f6f2, 
      0px 4px 1px 20px #e4e1dc, 
      0px -4px 0px 20px #fdfcfb, 
      0px 4px 20px 20px #000
    ;
  }
  50% {
    	box-shadow: 
      	0px -3px 0px rgba(234, 230, 223, 1), 
      	inset 0px -3px 0px rgba(210, 205, 196, .7), 
        0px 0px 0px 4px rgba(240, 240, 0, .75), 
        0px -2px 0px 4px rgba(119, 112, 105, .3), 
        0px 0px 0px 10px #f9f6f2, 
        0px -2px 0px 10px #f9f6f2, 
        0px 0px 0px 11px #f0ebe7, 
        0px -2px 0px 11px #f0ebe7, 
        0px 0px 0px 20px #f9f6f2, 
        0px 4px 1px 20px #e4e1dc, 
        0px -4px 0px 20px #fdfcfb, 
        0px 4px 20px 20px #000,
        0 0 200px rgba(240, 240, 0, .3), 
        0 0 200px rgba(240, 240, 0, .1),
        150px 0 150px -45px rgba(240, 240, 0, .225),
        -150px 0 150px -45px rgba(240, 240, 0, .225)
      ;
  }
}

/* switch button - led: on */
#btn:checked ~ .btn:after {
  margin: 14px 37px;
  background: rgba(248, 214, 8, .9);
  box-shadow: 
    inset 0px 1px 3px rgba(0,0,0,0.4), 
    0px 1px 0px #fff,
    0 0 3px rgba(248, 214, 8, .2),
    0 0 4px rgba(248, 214, 8, .2),
    0 0 5px rgba(248, 214, 8, .2),
    0 0 6px rgba(248, 214, 8, .2),
    0 0 7px rgba(248, 214, 8, .2)
  ;
}

/* bright room */
#btn:after {
  position:fixed;
  content:'';
  top:0;
  left:0;
  height:100%;
  width:100%;
  background: transparent;
  visibility: visible;
}

/* click */
#btn:before {
  position:absolute;
  content:'Awake';
  left:100px;
  color:rgba(0, 0, 0 , .5);
 
  visibility: visible;
  font: 5em/1.15em 'Gloria Hallelujah';
}

/* dark room */
#btn:checked:after {
  background: rgba(0, 0, 0, .4);
}

#btn:checked:before {
  content:'Sleeping';
  color: rgba(248, 214, 8, .1);
  text-shadow: 
    0 0 4px rgba(248, 214, 8, .2),
    -2px -2px 6px rgba(248, 214, 8, .3),
    2px 2px 6px rgba(248, 214, 8, .3)
  ;
}

</style>


<!-- test button that will go to the nap view -->
  <input type="checkbox" name="btn" id="btn">
  <label class="btn" for="btn"></label>


STYLING FOR THE NAP BACKGROUND CHANGE ON CLICK IS ABOVE

  <!-- ------------------------------------------------ -->


THE ORIGINAL LOGIN FORM IS BELOW

<div class="container">
        <div class="row">
            <div class="col-md-offset-4 col-md-4">
                <h1>BabyTracker</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-offset-1 col-md-10">
                <!-- Log In -->
                {{ Form::open(array('action' => 'HomeController@doLogin', 'class' => 'form-inline')) }}

                <div class="form-group">
                    {{ Form::label('email', 'Email', array('class' => 'sr-only')) }}
                    {{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Enter email')) }}
                </div>

                <div class="form-group">
                    {{ Form::label('password', 'Password', array('class' => 'sr-only')) }}
                    {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Enter password')) }}
                </div>

                {{ Form::submit('Log In', array('class' => 'btn btn-primary')) }}

                {{ Form::close() }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-offset-1 col-md-10">
                <a href="/new-user">Create new user</a>
            </div>
        </div>
    </div>




