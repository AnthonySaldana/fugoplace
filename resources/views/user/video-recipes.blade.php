<!DOCTYPE html>
<html>
  <head>
    <title>FugoPlace</title>
  <link rel="stylesheet" href="{{ URL::asset('css/user.css') }}">
  </head>
  <body id="video-recipes">
  <div class="container"></div>
  @include('user.includes.userheader')
    <div class="page-container">
  <!--<form class="comp" method="get" action="/user/recipes/create"><button type="submit" class="comp"><img src="http://image005.flaticon.com/1/png/512/16/16294.png"width="35" height="30"/>Compose a Recipe</button></form>-->          
    <h2 class="one">Video Recipe</h2>
	<!--<p>We take the upmost care when selecting recipes but please consult with your states nutrition standard before serving meals based on our selected recipes.<br /> Please note. We will try to upload new recipes as often as we can. Please vote for your favorites.</p>-->
	<br />
  <table  style="width:97%">

    <?php 
        foreach( $videorecipes as $recipe ){
              $id = $recipe['id'];
              $title = $recipe['title'];
              $desc = $recipe['content'];
              $media = $recipe['media'];
              $author = $recipe['author_id'];
              $is_fav = $recipe['favorite'];

              $strlimit = 50;
              

              $isvideo = false;

              if (strpos($media, '.mp4') !== false ){

                $isvideo = true;
                $ext = 'mp4';

              }else if(  strpos($media, '.ogv') !== false) {
                  $isvideo = true; 
                  $ext = 'ogv';
              }

              if( ( isset( $recipe['videolink'] ) && !empty( $recipe['videolink'] ) ) && ( isset( $recipe['video_recipe'] ) && 1 == $recipe['video_recipe'] ) ){

                ?>
                  <tr>
                    <td><iframe width="300" height="200" src="{{ $recipe['videolink'] }}" frameborder="0" allowfullscreen>Please wait.</iframe>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="div1"></div></td>
                    <td class="button"><p class="button1"><br /><u><strong>Recipe Title:</strong>&nbsp;{{ $title }}</u>&nbsp;&nbsp;&nbsp;<!--<u>
                    <strong>Creator Cited:&nbsp;</strong>{{ $author }}</u><br /><br /><br />
                    {!! str_limit( strip_tags( $desc ) , $strlimit, $end = '...' ) !!}--><br/>
                    @include('user.includes.favorite-written')
                  </tr>
                <?php

              }else if ( true == $isvideo && ( isset( $recipe['video_recipe'] ) && 1 == $recipe['video_recipe'] )){
                  ?>
                    <tr>
                      <td>

                      <video width="300" height="200" controls>
                        <source src="{{ url('/images/recipes/' . $media) }}" type="video/{{ $ext }}">
                        Your browser does not support HTML5 video.
                      </video>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="div1"></div></td>
                      <td class="button"><p class="button1"><br />
                      <u><strong>Recipe Title:</strong>&nbsp;{{ $title }}</u>&nbsp;&nbsp;&nbsp;
                      <!--<u><strong>Creator Cited:&nbsp;</strong>{{ $author }}</u><br /><br /><br />{!! str_limit( strip_tags( $desc ) , $strlimit, $end = '...' ) !!}-->
                      <br/>
                      @include('user.includes.favorite-written')
                      </p></td> 
                    </tr>
                  <?php
              }

        } 
      ?>
  
</table>
</div>
  </body>
</html>