<!DOCTYPE html>
<html>
  <head>
    <title>FugoPlace</title>
      <link rel="stylesheet" href="{{ URL::asset('css/user.css') }}">
  </head>
  <body id="folderfav">
    @include('user.includes.userheader')
    <div class="page-container">
    <?php 
      if( isset( $id ) ){
          echo "showing favorites for id: " . $id;
      }
    ?>
  <div></div>
	<form class="comp" method="get" action="/user/recipes/create"><button type="submit" class="comp"><img src="http://image005.flaticon.com/1/png/512/16/16294.png"width="35" height="30"/>Compose a Recipe</button></form>   
  <br />
	<br />
  <h2 class="one">Folder Favorites</h2>
	<!--<p>We take the upmost care when selecting recipes but please consult with your states nutrition standard before serving meals based on our selected recipes.<br /> Please note. We will try to upload new recipes as often as we can. Please vote for your favorites.</p>-->
	<br />
  <table  style="width:97%">

    <?php 
        foreach( $Favorites as $recipe ){
              $id = $recipe['id'];
              $title = $recipe['title'];
              $desc = $recipe['content'];
              $media = $recipe['media'];
              $author = $recipe['author_id'];
              $is_fav = $recipe['favorite'];

              $strlimit = 100;

              $isvideo = false;

              if (strpos($media, '.mp4') !== false ){

                $isvideo = true;
                $ext = 'mp4';

              }else if(  strpos($media, '.ogv') !== false) {
                  $isvideo = true; 
                  $ext = 'ogv';
              }

              if( ( isset( $recipe['videolink'] ) && !empty( $recipe['videolink'] ) ) ){

                ?>
                  <tr>
                    <td><iframe width="300" height="200" src="{{ $recipe['videolink'] }}" frameborder="0" allowfullscreen>Please wait.</iframe>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="div1"></div></td>
                    <td class="button"><p class=" button1"><br /><u>
                    <strong>Recipe Title:</strong>&nbsp;{{ $title }}</u>
                    <!--&nbsp;&nbsp;&nbsp;<u><strong>Creator Cited:&nbsp;</strong>{{ $author }}</u><br /><br /><br />
                    {!! str_limit( strip_tags( $desc ) , $strlimit, $end = '...' ) !!}<br/>-->
                    @include('user.includes.favorite-written')

                    </p></td> 
                  </tr>
                <?php

              }else if ( true == $isvideo ){
                  ?>
                    <tr>
                      <td>

                      <video width="300" height="200" controls>
                        <source src="{{ url('/images/recipes/' . $media) }}" type="video/{{ $ext }}">
                        Your browser does not support HTML5 video.
                      </video>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="div1"></div></td>
                      <td class="button"><p class="button1"><br /><u><strong>Recipe Title:</strong>&nbsp;{{ $title }}</u><br/>
                      <!--&nbsp;&nbsp;&nbsp;<u>
                      <strong>Creator Cited:&nbsp;</strong>{{ $author }}</u><br /><br /><br />
                      {!! str_limit( $strip_tags( $desc ) , $strlimit, $end = '...' ) !!}<br/>-->
                      @include('user.includes.favorite-written')

                      </p></td> 
                    </tr>
                  <?php
              }else{

                  ?>

                    <tr>
                      <td><img src="{{ url('/images/recipes/' . $media) }}"width="300" height="200"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="div1"></div></td>
                      <td class="button"><p class="button1"><br /><u><strong>Recipe Title:</strong>&nbsp;{{ $title }}</u><br/>
                      <!--&nbsp;&nbsp;&nbsp;<u><strong>Creator Cited:&nbsp;</strong>{{ $author }}</u><br /><br /><br />
                      {!! str_limit( strip_tags( $desc ) , $strlimit, $end = '...' ) !!}<br/>-->
                      @include('user.includes.favorite-written')
                      </p>
                      </td> 
                    </tr>

                  <?php
                } 
        } 
      ?>
<!--
  <tr>
    <td><iframe width="200" height="185" src="https://www.youtube.com/embed/kXm5tvnEMgM" frameborder="0" allowfullscreen>Please wait.</iframe>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="div1"></div></td>
    <td><p class="button button1"><br /><u><strong>Recipe Title:</strong>&nbsp;Meatloaf</u>&nbsp;&nbsp;&nbsp;<u><strong>Creator Cited:&nbsp;</strong>Jane Lee</u><br /><br /><br />Ground beef, onion, garlic, and green pepper, makes this a truely tastey dish.<form class="two" method="get" action="example-meal2.html"><button class="two" type="submit">Written Recipe</button></form></p></td>		
     
  </tr>
 <tr>
    <td><img src="http://image005.flaticon.com/1/png/512/16/16294.png"width="200" height="178"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td><p class="button button1"><br />&nbsp;&nbsp;&nbsp;<strong>Composed Recipe&nbsp;</strong><br /><br /><br /><u>Deep dish pizza</u><form class="two" method="get" action="example-meal6.html"><button class="two" type="submit">Written Recipe</button></form></p></td>		
     
  </tr>
  <tr>
    <td><iframe width="200" height="185" src="https://www.youtube.com/embed/kXm5tvnEMgM" frameborder="0" allowfullscreen>Please wait.</iframe>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="div1"></div></td>
    <td><p class="button button1"><br /><u><strong>Recipe Title:</strong>&nbsp;Banana Bread</u>&nbsp;&nbsp;&nbsp;<u><strong>Creator Cited:&nbsp;</strong>William Smith</u><br /><br /><br />This is a moist, sweet treat. There are bits of peanuts, Cinnamon and mashed bananas.<form class="two" method="get" action="example-meal3.html"><button class="two" type="submit">Written Recipe</button></form></p></td>		
     
  </tr>
  <tr>
    <td><img src="http://image005.flaticon.com/1/png/512/16/16294.png"width="200" height="178"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td><p class="button button1"><br />&nbsp;&nbsp;&nbsp;<strong>Composed Recipe&nbsp;</strong><br /><br /><br /><u>Chicken pot pie</u><form class="two" method="get" action="example-meal7.html"><button class="two" type="submit">Written Recipe</button></form></p></td>		
     
  </tr>
  <tr>
    <td><iframe width="200" height="185" src="https://www.youtube.com/embed/kXm5tvnEMgM" frameborder="0" allowfullscreen>Please wait.</iframe>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="div1"></div></td>
    <td><p class="button button1"><br /><u><strong>Recipe Title:</strong>&nbsp;Lasagna</u>&nbsp;&nbsp;&nbsp;<u><strong>Creator Cited:&nbsp;</strong>Emily Tao</u><br /><br /><br />Classic Lasagna with  boneless chicken breast halves, diced, Alfredo-style pasta sauce, and shredded mozzarella cheese.<form class="two" method="get" action="example-meal.html"><button class="two" type="submit">Written Recipe</button> </form></p></td>		
     
  </tr>-->
  
</table>
</div>
  </body>
</html>