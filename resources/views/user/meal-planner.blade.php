<!DOCTYPE html>
<html>
  <head>
    <title>FugoPlace</title>

<link rel="stylesheet" href="{{ URL::asset('css/user.css') }}">
  </head>
  <body id="meal-planner">
  <?php $showpubliclink = true; ?>
  @include('user.includes.userheader')
  <div class="page-container">
  	<?php if( isset( $user_id )){
  		//echo "Showing form belonging to: ".  $user_id;
  	} ?>

    <br />
    <div class="meal-planner-container">
    <div style="text-align:right;">
    	<form style="display:inline-block;" class="two" method="get" action="{{ url('user/meal-planner/'.$user_id.'/edit') }}"><button class="two" type="submit">Edit</button></form>
      <form style="display:inline-block;"  class="two" action="{{ action('MealController@destroy', array( '*ALL*' ) ) }}" method="post">
        <input type="hidden" name="id" value="all" />
        <input name="_method" type="hidden" value="delete" />
        <button type="submit" value="delete" class="two" onclick="return confirmDeletion()">Clear All</button>
        {{ csrf_field() }}
      </form>
      </div>
      @include('includes.meal-planner-display')

    	<!--<form class="three" method="get" action="#"><button class="two" type="submit">Upload</button></form>
    	<form class="four" method="get" action="#"><button class="two" type="submit">Clear</button></form>-->
    </div>
      </div>
  </body>
</html>