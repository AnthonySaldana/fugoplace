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
	<form class="comp" method="get" action="composeRec.html"><button type="submit" class="comp"><img src="http://image005.flaticon.com/1/png/512/16/16294.png"width="35" height="30"/>Compose a Recipe</button></form>          
	<br />
	<br />
  <h2 class="one">Folder Favorites</h2>
	<p>We take the upmost care when selecting recipes but please consult with your states nutrition standard before serving meals based on our selected recipes.<br /> Please note. We will try to upload new recipes as often as we can. Please vote for your favorites.</p>
	<br />
  <table  style="width:97%">

    <?php 
        foreach( $Favorites as $recipe ){
              $id = $recipe['id'];
              $title = $recipe['title'];
              $desc = $recipe['content']; ?>
              <tr>
              <td><iframe width="200" height="185" src="https://www.youtube.com/embed/kXm5tvnEMgM" frameborder="0" allowfullscreen>Please wait.</iframe>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="div1"></div></td>
              <td><p class="button button1"><br /><u><strong>Recipe Title:</strong>&nbsp;<?php echo $title; ?></u>&nbsp;&nbsp;&nbsp;<u><strong>Creator Cited:&nbsp;</strong>Jane Lee</u><br /><br /> {{ $desc }} <br /><a href="{{ action('RecipeController@edit', array( $id ) ) }}" class='btn two'>Written Recipe</a></p></td>   
               
            </tr>
              <?php 
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
  </body>
</html>