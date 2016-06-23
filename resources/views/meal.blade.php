<!DOCTYPE html>
<html>
  <head>
    <title>FugoPlace</title>
	<style>
	.two {
position: relative;
top: -8px;
left: 380px;
}
	.three {
position: relative;
top: -30px;
left: 450px;
}
	.four {
position: relative;
top: -52px;
left: 527px;
}
    .img {
	float:right;
	}
   .left{
    float:left;
  }

  .right{
    float:right;
  }

  .right .btn, .right form{
    vertical-align: top;
  }
	
  </style>
  </head>
  <body>
    @include('includes.header')
    <script>
		function myFunction() {
		    confirm("Trash composed recipe?");
		}
	</script>
	<br />
	<?php 
    if(isset( $Recipe )){
    	$recipe = $Recipe; //reassign for ease

        $id = $recipe['id'];
        $title = $recipe['title'];
        $author = $recipe['author_id'];
        $content = $recipe['content'] ;
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
    <div style="max-width:1000px;">

    <div class="left">
    	<h2 style="font-family: Garamond;">&nbsp;&nbsp;&nbsp;&nbsp;{{ $title }}</h2>
    {!! html_entity_decode( $content ) !!}
    </div>

    <div class="right">

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