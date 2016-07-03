<!DOCTYPE html>
<html>
  <head>
    <title>FugoPlace</title>
    <link rel="stylesheet" href="{{ URL::asset('css/user.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <style type="text/css">
        .meal-media, .meal-video{
          margin-top:15px;
        }

        .delete-form, .btn.edit{
          padding-right:10px;
        }
    </style>
  </head>
  <body id="meal">
    @include('user.includes.userheader')
    <script>
    $( document ).ready(function() {
       var mediatype = $( 'input[type=radio][name=media_selector]' ).val();
       fugochosemedia( mediatype );

       $('input[type=radio][name=media_selector]').change(function() {

            mediatype = $( this ).val();
            fugochosemedia( mediatype );
            
        });
    });

    function fugochosemedia( mediatype ){
        if( 'M' == mediatype ){
          $('.meal-media').show();
          $('.meal-video').hide();
        }else if( 'V' == mediatype ){
          $('.meal-video').show();
          $('.meal-media').hide();
        }
    }

		function myFunction() {
		    return confirm("Trash composed recipe?");
		}
	</script>
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
    <div class="page-container">

  <div class="left">
      
  	<h2 style="font-family: Garamond;">{{ $title }}</h2>
  	<div>{!! $content !!}</div>
  </div>

  <div class="right" >
    <a href="{{ action('RecipeController@edit', array($id) ) }}" class='btn edit'>Edit</a>
    <form action="{{ action('RecipeController@destroy', array($id) ) }}" class='delete-form' method="post" style="display:inline-block;">
      <input type="hidden" name="id" value="{{ $id }}" />
      <input name="_method" type="hidden" value="delete" />
      <button type="submit" value="delete" class='btn' onclick="return myFunction()">Delete</button>
      {{ csrf_field() }}
    </form>

    <?php if( ( isset( $recipe['videolink'] ) && !empty( $recipe['videolink'] ) ) && !empty( $media ) ){
        ?>
          <small><b>Chose Recipe Format: </b></small>
          <input type="radio" name="media_selector" class="media_selector" value="M" checked> Uploaded Media
          <input type="radio" name="media_selector" class="media_selector"  value="V"> Video

          <div class="meal-video" > <iframe width="600" height="400" src="{{ $recipe['videolink'] }}" frameborder="0" allowfullscreen>Please wait.</iframe> </div>

          <div class="meal-media" >
            
            <?php if( false == $isvideo ){ ?> 
              <img src="{{ url('/images/recipes/' . $media) }}"width="600" height="400"/> <?php

              }else{ ?>
                <video width="600" height="400" controls>
                  <source src="{{ url('/images/recipes/' . $media) }}" type="video/{{ $ext }}">
                  Your browser does not support HTML5 video.
                </video> <?php
                } 

            ?>

          </div>
        <?php
      } else if( ( isset( $recipe['videolink'] ) && !empty( $recipe['videolink'] ) ) && ( isset( $recipe['video_recipe'] ) && 1 == $recipe['video_recipe'] ) ){

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