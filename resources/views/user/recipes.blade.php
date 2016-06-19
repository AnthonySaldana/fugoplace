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
.comp {
position: relative;
left: 410px;
}
  div {
padding: 20px;
}
.div1 {
padding: 5px;
}

.btn{
      align-items: flex-start;
    text-align: center;
    cursor: default;
    color: buttontext;
    border-image-source: initial;
    border-image-slice: initial;
    border-image-width: initial;
    border-image-outset: initial;
    border-image-repeat: initial;
    background-color: buttonface;
    box-sizing: border-box;
    padding: 1px 6px;
    border-width: 2px;
    border-style: outset;
    border-color: buttonface;
}

.btn.two{
  top:20px;
  text-decoration: none;
}

      </style>
  </head>
  <body>
    @include('user.includes.userheader')
    <?php 
      if( isset( $id ) ){
          echo "showing favorites for id: " . $id;
      }
    ?>
  <div></div>
	<form class="comp" method="get" action="/user/recipes/create"><button type="submit" class="comp"><img src="http://image005.flaticon.com/1/png/512/16/16294.png"width="35" height="30"/>Compose a Recipe</button></form>          
	<br />
	<br />


  <h2 class="one">All Recipes</h2>
	<p>We take the upmost care when selecting recipes but please consult with your states nutrition standard before serving meals based on our selected recipes.<br /> Please note. We will try to upload new recipes as often as we can. Please vote for your favorites.</p>
	<br />
  <table  style="width:97%">

 <?php 
    if(isset( $Recipes )){
      foreach (  $Recipes as $recipe){
        $id = $recipe['id'];
        $title = $recipe['title'];
        $author = $recipe['author_id'];
        $media = $recipe['media'];

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
              <td><p class="button button1"><br /><u><strong>Recipe Title:</strong>&nbsp;{{ $title }}</u>&nbsp;&nbsp;&nbsp;<u><strong>Creator Cited:&nbsp;</strong>{{ $author }}</u><br /><br /><br />Ground beef, onion, garlic, and green pepper, makes this a truely tastey dish.<br/><a href="{{ action('RecipeController@show', array($id) ) }}" class='btn two'>Written Recipe</a></p></td> 
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
                <td><p class="button button1"><br /><u><strong>Recipe Title:</strong>&nbsp;{{ $title }}</u>&nbsp;&nbsp;&nbsp;<u><strong>Creator Cited:&nbsp;</strong>{{ $author }}</u><br /><br /><br />Ground beef, onion, garlic, and green pepper, makes this a truely tastey dish.<br/><a href="{{ action('RecipeController@show', array($id) ) }}" class='btn two'>Written Recipe</a></p></td> 
              </tr>
            <?php
        }else{

            ?>

              <tr>
                <td><img src="{{ url('/images/recipes/' . $media) }}"width="300" height="200"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="div1"></div></td>
                <td><p class="button button1"><br /><u><strong>Recipe Title:</strong>&nbsp;{{ $title }}</u>&nbsp;&nbsp;&nbsp;<u><strong>Creator Cited:&nbsp;</strong>{{ $author }}</u><br /><br /><br />Ground beef, onion, garlic, and green pepper, makes this a truely tastey dish.<br/><a href="{{ action('RecipeController@show', array($id) ) }}" class='btn two'>Written Recipe</a></p></td> 
              </tr>

            <?php
          }
      }
    }
  ?>

  <tr><td><h2>Examples are below</h2></td></tr>
  <tr>
    <td><img src="http://image005.flaticon.com/1/png/512/16/16294.png"width="200" height="178"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td><p class="button button1"><br />&nbsp;&nbsp;&nbsp;<strong>Composed Recipe&nbsp;</strong><br /><br /><br /><u>Chicken pot pie</u><form class="two" method="get" action=""><button class="two" type="submit">Written Recipe</button></form></p></td>		
     
  </tr>
  <tr>
    <td><iframe width="200" height="185" src="https://www.youtube.com/embed/kXm5tvnEMgM" frameborder="0" allowfullscreen>Please wait.</iframe>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="div1"></div></td>
    <td><p class="button button1"><br /><u><strong>Recipe Title:</strong>&nbsp;Lasagna</u>&nbsp;&nbsp;&nbsp;<u><strong>Creator Cited:&nbsp;</strong>Emily Tao</u><br /><br /><br />Classic Lasagna with  boneless chicken breast halves, diced, Alfredo-style pasta sauce, and shredded mozzarella cheese.<form class="two" method="get" action=""><button class="two" type="submit">Written Recipe</button> </form></p></td>		
     
  </tr>
  
</table>
  </body>
</html>