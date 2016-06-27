<!DOCTYPE html>
<html>
  <head>
    <title>FugoPlace</title>
    <link rel="stylesheet" href="{{ URL::asset('css/user.css') }}">
  </head>
  <body id="meal">
    @include('user.includes.userheader')
    <script>
		function myFunction() {
		    confirm("Trash composed recipe?");
		}
	</script>
	<br />
	<?php 
    if(isset( $Recipe )){
    	$recipe = $Recipe[0]; //reassign for ease

        $id = $recipe['id'];
        $title = $recipe['title'];
        $author = $recipe['author_id'];
        $content = $recipe['content'];
        $media = $recipe['media'];

        $isvideo = false;

        if (strpos($media, '.mp4') !== false ){

          $isvideo = true;
          $ext = 'mp4';

        }else if(  strpos($media, '.ogv') !== false) {
            $isvideo = true; 
            $ext = 'ogv';
        }
    }
        ?>
    <div style="max-width:1000px; padding:25px;">

  <div class="left">
      
  	<h2 style="font-family: Garamond;">{{ $title }}</h2>
  	<div>{!! $content !!}</div>
  </div>

  <div class="right" >
  <a href="{{ action('RecipeController@edit', array($id) ) }}" class='btn'>Edit</a>
      <form action="{{ action('RecipeController@destroy', array($id) ) }}" method="post" style="display:inline-block;">
        <input type="hidden" name="id" value="{{ $id }}" />
        <input name="_method" type="hidden" value="delete" />
        <button type="submit" value="delete" class='btn' onclick="return myFunction()">Delete</button>
        {{ csrf_field() }}
      </form>
      <br/><br/>
	<?php if( ( isset( $recipe['videolink'] ) && !empty( $recipe['videolink'] ) ) && ( isset( $recipe['video_recipe'] ) && 1 == $recipe['video_recipe'] ) ){

          ?>
          <iframe width="600" height="400" src="{{ $recipe['videolink'] }}" frameborder="0" allowfullscreen>Please wait.</iframe>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <?php

        }elseif( true == $isvideo ){
            ?>
                <video width="600" height="400" controls>
                  <source src="{{ url('/images/recipes/' . $media) }}" type="video/{{ $ext }}">
                  Your browser does not support HTML5 video.
                </video>
            <?php
        }elseif( !empty( $media ) ) {

            ?>

            	<img src="{{ url('/images/recipes/' . $media) }}"width="600" height="400"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <?php
          } ?>
          </div>
	</div>
  </body>
</html>