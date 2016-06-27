<!DOCTYPE html>
<html>
  <head>
    <title>FugoPlace</title>
    <link rel="stylesheet" href="{{ URL::asset('css/user.css') }}">
  </head>
  <body id="meal">
    

<ul class="nav">
    <li><span>Fugo</span><u>Place</u><br /><span></li>
    <li><a href="/">Home</a></li>
    <li><a href="/about">About Us</a></li>
    <li><a href="/faq">FAQ</a></li>
    <li><a href="/contact">Contact Us</a></li>
    <li><a href="/user">user</a></li>
    <br/>
  </ul>
	<br />
	<?php 
    if(isset( $meal )){

        $id = $meal->id;
        $title = $meal->title;
        $author = $meal->author_id;
        $content = $meal->content;
        $media = $meal->media;

        $isvideo = false;

        if (strpos($media, '.mp4') !== false ){

          $isvideo = true;
          $ext = 'mp4';

        }else if(  strpos($media, '.ogv') !== false) {
            $isvideo = true; 
            $ext = 'ogv';
        }
        ?>
        <div style="max-width:1000px; padding:25px;">

          <div class="left">
            <b>Meal for :</b> {{ $meal->date }}
            <br/>
            <h2 style="font-family: Garamond;">{{ $title }}</h2>
            <div>{!! $content !!}</div>
          </div>

          <div class="right" >
            <br/><br/>
            <?php if( ( isset( $meal->videolink ) && !empty( $meal->videolink ) ) && ( isset( $meal->video_recipe ) && 1 == $meal->video_recipe ) && ( ( $meal->mealmedia =='V' ) || empty ( $media ) ) ){ ?>

              <iframe width="600" height="400" src="{{ $meal->videolink }}" frameborder="0" allowfullscreen>Please wait.</iframe>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <?php

            }elseif( true == $isvideo && ( $meal->mealmedia =='V' )){
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
        <?php

    }
        ?>
  </body>
</html>