<!DOCTYPE html>
<html>
  <head>
    <title>FugoPlace</title>
  </head>
  <style>
  body {

   background: -webkit-linear-gradient(top, rgb(136,199,201) 58%, rgb(202,232,235) 100%);

   

   

   padding: 3%;

   height: 94%;

}


.paper {

  font: normal 12px/1.5 "Lucida Grande", arial, sans-serif;

  width: 50%;

  height: 80%;

  margin: 0 auto;

  padding: 6px 5px 4px 42px;

  position: relative;

  

  line-height: 20px;

 

  

  
  -webkit-background-size: 100% 20px;

  -moz-background-size: 100% 20px;

  -ms-background-size: 100% 20px;

  -o-background-size: 100% 20px;

  background-size: 100% 20px;

  -webkit-border-radius: 3px;

  -moz-border-radius: 3px;

  border-radius: 3px;

  

  

  width: 816px;

  height: 1056px;

}

textarea {

  display: block;

  width: 94%;

  margin: 0 auto;

  padding: 3.8% 3%;

  border: none;

  outline: none;

  height: 94%;

  background: transparent;

  line-height: 20px;

}
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
    .five {
position: relative;
top: -75px;
left: 220px;
}

  </style>
  <body>
  @include('user.includes.userheader')
	<section class="paper">
  @include('common.errors')
	<script>
function myFunction() {
    return confirm("Trash composed recipe?");
}
</script>

<form method="post" action="{{ url('/user/recipes') }}" enctype="multipart/form-data">
   <article class="head">
    <button class="two" type="submit" name="send" value="1">Save</button>
  <!--<button class="two" type="submit" name="edit" value="1">Edit</button>-->
  <button class="two" type="submit" name="delete" value="1" onclick="return myFunction()">Discard</button>
 </article>
    <br/>
    <?php if(isset( $recipe[0]['media'] )){

        $media = $recipe[0]['media']; //ease of use

          $isvideo = false;

          if (strpos($media, '.mp4') !== false ){

            $isvideo = true;
            $ext = 'mp4';

          }else if(  strpos($media, '.ogv') !== false) {
              $isvideo = true; 
              $ext = 'ogv';
          }

          if ( true == $isvideo ){
            ?>

                <video width="300" height="200" controls>
                  <source src="{{ url('/images/recipes/' . $media ) }}" type="video/{{ $ext }}">
                  Your browser does not support HTML5 video.
                </video>

            <?php
        }else if( !empty( $media ) ){

            ?>

              <img src="{{ url('/images/recipes/' . $media) }}"width="300" height="200"/>

            <?php
          }

     }?>
    <br/>
    <label for="media">New Media</label><br/>
    <input type="File" name="media" >
    <br/>
    <input type="checkbox" name="video" <?php if(isset( $recipe ) ){ 
        if( $recipe[0]['video_recipe'] == 1 ){ 
          echo "checked"; 
        } 
      } ?> 
     / value="1">Video recipe? <small>(Check this if you want this recipe to appear on the video recipes page)</small><br/>

    <label for="videolink">Upload Video or link to your video here: </label>

    <input type="text" name="videolink" value="<?php if(isset( $recipe[0]['videolink'] )){ echo $recipe[0]['videolink']; }?>" placeholder="http://youtube.com"/> <br/>

    <input type="checkbox" name="favorite" <?php if(isset( $recipe ) ){ 
        if( $recipe[0]['favorite'] == 1 ){ 
          echo "checked"; 
        } 
      } ?> 
      / value="1">Favorite?</br/>
   <label for="title">Enter a title</label><br/>
    <input type="text" name="title" value="<?php if(isset( $recipe )){ echo $recipe[0]['title']; }?>"/>
    <br/>

    <label for="content">Create your recipe</label>
    <textarea name="content" placeholder="Enter your note here" style="background-color:white; min-height:300px;"><?php if(isset( $recipe )){ echo $recipe[0]['content']; } ?></textarea>
    <?php if(isset( $recipe )){ ?>
        <input type="hidden" name="recipeid" value="<?php echo $recipe[0]['id']; ?>" />
    <?php } ?>
    <!--<input type="hidden" name="_token" value="{{ csrf_token() }}"/>-->
    {{ csrf_field() }}
  </form>  


</section>
  </body>
</html>