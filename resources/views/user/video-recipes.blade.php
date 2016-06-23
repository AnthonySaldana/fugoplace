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
div {
padding: 20px;
}
.div1 {
padding: 15px;
}
.comp {
    position: relative;
    left: 410px;
}
.folderfav{
  display: inline-block;
  float: right;
  margin-right: 5px;
}

.folderfav button{
  min-height: 30px;
}
.fav{
  background-color: orange; 

}

.unfav{
  background-color: red;
  color:white;
}


	</style>
  </head>
  <body>
  @include('user.includes.userheader')
  <div></div>
  <form class="comp" method="get" action="/user/recipes/create"><button type="submit" class="comp"><img src="http://image005.flaticon.com/1/png/512/16/16294.png"width="35" height="30"/>Compose a Recipe</button></form>          
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
                    <td class="button"><p class="button1"><br /><u><strong>Recipe Title:</strong>&nbsp;{{ $title }}</u>&nbsp;&nbsp;&nbsp;<u>
                    <strong>Creator Cited:&nbsp;</strong>{{ $author }}</u><br /><br /><br />
                    {!! str_limit( $desc , $strlimit, $end = '...' ) !!}<br/>
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
                      <u><strong>Recipe Title:</strong>&nbsp;{{ $title }}</u>&nbsp;&nbsp;&nbsp;<u>
                      <strong>Creator Cited:&nbsp;</strong>{{ $author }}</u><br /><br /><br />{!! str_limit( $desc , $strlimit, $end = '...' ) !!}<br/>
                      @include('user.includes.favorite-written')
                      </p></td> 
                    </tr>
                  <?php
              }

        } 
      ?>
  
</table>
  </body>
</html>