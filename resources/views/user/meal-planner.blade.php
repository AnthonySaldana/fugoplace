<!DOCTYPE html>
<html>
  <head>
    <title>FugoPlace</title>

<link rel="stylesheet" href="{{ URL::asset('css/user.css') }}">
  </head>
  <body id="meal-planner">

  @include('user.includes.userheader')
  	<?php if( isset( $user_id )){
  		//echo "Showing form belonging to: ".  $user_id;
  	} ?>

    <br />
    <div class="meal-planner-container">
    	<form class="two" method="get" action="{{ url('user/meal-planner/'.$user_id.'/edit') }}"><button class="two" type="submit">Edit</button></form>
    	<!--<form class="three" method="get" action="#"><button class="two" type="submit">Upload</button></form>
    	<form class="four" method="get" action="#"><button class="two" type="submit">Clear</button></form>-->

    	@include('includes.meal-planner-display')
    </div>
  </body>
</html>