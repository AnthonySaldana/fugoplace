<!DOCTYPE html>
<html>
  <head>
    <title>FugoPlace</title>
	<style>
	h2.one {
	Font-family: Helvetica; text-align: left;
	}
	.button {
    
	height: 180px;
	width: 800px;
    background-color: #f2f2f2;
	font-family: sans-serif;
    color: black;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 18px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
}
.two {
position: relative;
top: -20px;
left: 320px;
}
.folderfav {
position: relative;
top: -63px;
left: 500px;
}
div {
padding: 20px;
}
.div1 {
padding: 15px;
}

	</style>
  </head>
  <body>
  @include('user.includes.userheader')
  <div></div>
    <h2 class="one">Video Recipe</h2>
	<p>We take the upmost care when selecting recipes but please consult with your states nutrition standard before serving meals based on our selected recipes.<br /> Please note. We will try to upload new recipes as often as we can. Please vote for your favorites.</p>
	<br />
  <table  style="width:97%">

    <?php 
        foreach( $videorecipes as $recipe ){
              $id = $recipe['id'];
              $title = $recipe['title'];
              $desc = $recipe['content'];
              $media = $recipe['media'];
              $author = $recipe['author_id'];
              

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
                    <td><p class="button button1"><br /><u><strong>Recipe Title:</strong>&nbsp;{{ $title }}</u>&nbsp;&nbsp;&nbsp;<u><strong>Creator Cited:&nbsp;</strong>{{ $author }}</u><br /><br /><br />{{ $desc }}<br/><a href="{{ action('RecipeController@show', array($id) ) }}" class='btn two'>Written Recipe</a></p></td> 
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
                      <td><p class="button button1"><br /><u><strong>Recipe Title:</strong>&nbsp;{{ $title }}</u>&nbsp;&nbsp;&nbsp;<u><strong>Creator Cited:&nbsp;</strong>{{ $author }}</u><br /><br /><br />{{ $desc }}<br/><a href="{{ action('RecipeController@show', array($id) ) }}" class='btn two'>Written Recipe</a></p></td> 
                    </tr>
                  <?php
              }

        } 
      ?>
  
</table>
  </body>
</html>