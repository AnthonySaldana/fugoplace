<html>
<head>
<title>FugoPlace</title>

<link rel="stylesheet" href="{{ URL::asset('css/home.css') }}">
<style type="text/css">
  .accordion header.box{
    text-align: center;
  }

  .accordion a{
    color:#337ab7;
  }
</style>
</head>
  <body id='school'>
  
<link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css'> 
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    

    
<div class="hold">
  <div class="header">
    <div class="container">
    
      </div>
    
      <ul class="nav">
        <li><span class="two">Fugo</span>&nbsp;&nbsp;<u>Place</u><br /><span></li>
        <li><a href="/">Home</a></li>
        <li><a href="/about">About Us</a></li>
        <li><a href="/faq">FAQ</a></li>
        <li><a href="/contact">Contact Us</a></li>
        <?php if( $isuser ){ ?><li><a href="/user">user</a></li><?php } ?>
      </ul>
    </div>
    
    <!--<div>
    <a href="basic.html">Home</a>&nbsp;&nbsp;&nbsp;
    <a href="about us.html">About Us</a>&nbsp;&nbsp;&nbsp;
    <a href="FAQ.html">FAQ</a>&nbsp;&nbsp;&nbsp;
    <a href="contact us.html">Contact Us</a>&nbsp;&nbsp;&nbsp;
    </div>-->
    
</div>
<div class="section homeheader">
  <div class="slider">
    <div class="container slidercontent">
      <!--<div class="animated flash obiecteslider"></div>--> 
      <div class="call"><span>{{ $user->school_name }}</span></div>
      <h2 class="hero">Is this your school?</h2>
      
      <!--<div class="animated zoomIn"><h1 class="hero">The food facts start here.</h1></div>-->
    </div>
  </div>
</div>
<div class="section motto">
  <div class="container">
    <!-- class="animated bounceInRight"  class="animated bounceInLeft" -->
      <div class="motto-en"><div >We are FugoPlace!</div></div>
      <p><div class="motto-ro"><div >We are a nutrition information provider. We aim to shine light on the meals consumed by young Americans on a weekly basis. This is done so by a trusted partnership between <strong>participating</strong> districts. FugoPlace and foodservice work in conjuncture to bring healthy, tasty meals to our youths. See <strong>About Us</strong> for details. </div></div></p>
  </div>
</div>
<div class="section">
  <div class="container">
    <section class="wow slideInLeft" data-wow-delay="0.3s" style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;"><div class="col four">
      <h1 class="icon"><i class="fa fa-picture-o fa-2x"></i></h1>
      <h1 class="service">Convience designed</h1>
      <p>We strive to provide our visitors with easy usage.</p>
    </div></section>
    <section class="wow slideInLeft" data-wow-delay="0.3s" style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;"><div class="col four">
      <h1 class="icon"><i class="fa fa-bug fa-2x"></i></h1>
      <h1 class="service">Suport 24/7</h1>
      <p>Contact us with any problems, questions, or suggestions.</p>
    </div></section>
    <div class="responsivegroup"></div>
    <section class="wow slideInRight" data-wow-delay="0.3s" style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;"><div class="col four">
      <h1 class="icon"><i class="fa fa-mobile fa-2x"></i></h1>
      <h1 class="service">Aspect receptive</h1>
      <p>Download our app and view meals on the go.</p>
    </div></section>
    
    <section class="wow slideInRight" data-wow-delay="0.3s" style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;"><div class="col four">
      <a href="https://www.myschoolbucks.com/ver2/login/getmain.action"><div class="bucks"><img src="https://s3.amazonaws.com/nutrislice-client-uploads/psd1.nutrislice.com/menuwidgets/images/imagewidges/myschoolbucks.jpg" HEIGHT="100" WIDTH="170" BORDER="0"/></div></a>
      <h1 class="service"></h1>
      <p><strong>Click here</strong> to pay direct using My School Bucks.</p>
    </div></section>
    <div class="group"></div>
  </div>
</div>


<div class="section bg">
  <div class="container">

  @include('includes.meal-planner-display')
    
    
  <h2><div class="section">
  <div class="container">
    <h1>Video Recipe Sample</h1>
    <h2>To help you get an idea for the nutritional inspiration we try to provide to our users here are some brief recipe examples. If you wish to contact us please visit our 'Contact Us' page. We are eager to answer any questions and are open to suggestions.</h2></h2>
    <div class="col three bg nopad pointer">
      <div class="imgholder"><iframe  width="303"height="300" src="https://www.youtube.com/embed/kXm5tvnEMgM" frameborder="0" allowfullscreen>Please wait.</iframe></div>
      <h1 class="feature">Recipe:&nbsp;Meatloaf&nbsp;&nbsp;&nbsp;Cited:&nbsp;Jane Lee</h1>
      <p>Ground beef, onion, garlic, and green pepper, makes this a truely tastey dish.</p>
    </div>
    <div class="col three bg nopad pointer">
      <div class="imgholder"><iframe  width="303"height="300" src="https://www.youtube.com/embed/kXm5tvnEMgM" frameborder="0" allowfullscreen>Please wait.</iframe></div>
      <h1 class="feature">Recipe:&nbsp;Pancake&nbsp;&nbsp;&nbsp;Cited:&nbsp;John Stein</h1>
      <p>This is a fluffy sweet treat anyone can easily enjoy.</p>
    </div>
    <div class="col three bg nopad pointer">
      <div class="imgholder"><iframe  width="303"height="300" src="https://www.youtube.com/embed/kXm5tvnEMgM" frameborder="0" allowfullscreen>Please wait.</iframe></div>
      <h1 class="feature">Recipe:&nbsp;Banana Bread&nbsp;&nbsp;&nbsp;Cited:&nbsp;William Smith</h1>
      <p>This is a moist, sweet treat. There are bits of peanuts, Cinnamon and mashed bananas.</p>
    </div>
    <div class="group margin"></div>
    <div class="col three bg nopad pointer">
      <div class="imgholder"><iframe  width="303"height="300" src="https://www.youtube.com/embed/kXm5tvnEMgM" frameborder="0" allowfullscreen>Please wait.</iframe></div>
      <h1 class="feature">Recipe:&nbsp;Carrot Muffin&nbsp;&nbsp;&nbsp;Cited:&nbsp;Daniel schemit</h1>
      <p>Raisins, brown sugar, and shredded carrots, yum!</p>
    </div>
    <div class="col three bg nopad pointer">
      <div class="imgholder"><iframe  width="303"height="300" src="https://www.youtube.com/embed/kXm5tvnEMgM" frameborder="0" allowfullscreen>Please wait.</iframe></div>
      <h1 class="feature">Recipe:&nbsp;Lasagna&nbsp;&nbsp;&nbsp;Cited:&nbsp;Emily Tao</h1>
      <p>Classic Lasagna with  boneless chicken breast halves, diced, Alfredo-style pasta sauce, and shredded mozzarella cheese.</p>
    </div>
    <div class="col three bg nopad pointer">
      <div class="imgholder"><iframe  width="303"height="300" src="https://www.youtube.com/embed/kXm5tvnEMgM" frameborder="0" allowfullscreen>Please wait.</iframe></div>
      <h1 class="feature">Recipe:&nbsp;Lasagna&nbsp;&nbsp;&nbsp;Cited:&nbsp;Emily Tao</h1>
      <p>Classic Lasagna with  boneless chicken breast halves, diced, Alfredo-style pasta sauce, and shredded mozzarella cheese.</p>
    </div>
    <div class="group"></div>
  </div>
</div>
    <?php 
    /*
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

                  <div class="col three bg nopad pointer">
                    <div class="imgholder"><iframe width="100%" height="300" src="{{ $recipe['videolink'] }}" frameborder="0" allowfullscreen>Please wait.</iframe></div>
                    <h1 class="feature">Recipe:&nbsp;{{ $title }}&nbsp;&nbsp;&nbsp;Cited:&nbsp;{{ $author }}</h1>
                    <p>{!! str_limit( strip_tags( $desc ) , $strlimit, $end = '...' ) !!}</p>
                  </div>

                <?php

              }else if ( true == $isvideo && ( isset( $recipe['video_recipe'] ) && 1 == $recipe['video_recipe'] )){
                  ?>

                  <div class="col three bg nopad pointer">
                    <div class="imgholder">
                      <video width="100%" height="300" controls>
                        <source src="{{ url('/images/recipes/' . $media) }}" type="video/{{ $ext }}">
                        Your browser does not support HTML5 video.
                      </video>
                    </div>
                    <h1 class="feature">Recipe:&nbsp;{{ $title }}&nbsp;&nbsp;&nbsp;Cited:&nbsp;{{ $author }}</h1>
                    <p>{!! str_limit( strip_tags( $desc ) , $strlimit, $end = '...' ) !!}</p>
                  </div>
                  <?php
              }

        }*/ ?>
    <!--<div class="col three bg nopad pointer">
      <div class="imgholder"><iframe  width="303"height="300" src="https://www.youtube.com/embed/kXm5tvnEMgM" frameborder="0" allowfullscreen>Please wait.</iframe></div>
      <h1 class="feature">Recipe:&nbsp;Meatloaf&nbsp;&nbsp;&nbsp;Cited:&nbsp;Jane Lee</h1>
      <p>Ground beef, onion, garlic, and green pepper, makes this a truely tastey dish.</p>
    </div>
    <div class="col three bg nopad pointer">
      <div class="imgholder"><iframe  width="303"height="300" src="https://www.youtube.com/embed/kXm5tvnEMgM" frameborder="0" allowfullscreen>Please wait.</iframe></div>
      <h1 class="feature">Recipe:&nbsp;Pancake&nbsp;&nbsp;&nbsp;Cited:&nbsp;John Stein</h1>
      <p>This is a fluffy sweet treat anyone can easily enjoy.</p>
    </div>
    <div class="col three bg nopad pointer">
      <div class="imgholder"><iframe  width="303"height="300" src="https://www.youtube.com/embed/kXm5tvnEMgM" frameborder="0" allowfullscreen>Please wait.</iframe></div>
      <h1 class="feature">Recipe:&nbsp;Banana Bread&nbsp;&nbsp;&nbsp;Cited:&nbsp;William Smith</h1>
      <p>This is a moist, sweet treat. There are bits of peanuts, Cinnamon and mashed bananas.</p>
    </div>
    <div class="group margin"></div>
    <div class="col three bg nopad pointer">
      <div class="imgholder"><iframe  width="303"height="300" src="https://www.youtube.com/embed/kXm5tvnEMgM" frameborder="0" allowfullscreen>Please wait.</iframe></div>
      <h1 class="feature">Recipe:&nbsp;Carrot Muffin&nbsp;&nbsp;&nbsp;Cited:&nbsp;Daniel schemit</h1>
      <p>Raisins, brown sugar, and shredded carrots, yum!</p>
    </div>
    <div class="col three bg nopad pointer">
      <div class="imgholder"><iframe  width="303"height="300" src="https://www.youtube.com/embed/kXm5tvnEMgM" frameborder="0" allowfullscreen>Please wait.</iframe></div>
      <h1 class="feature">Recipe:&nbsp;Lasagna&nbsp;&nbsp;&nbsp;Cited:&nbsp;Emily Tao</h1>
      <p>Classic Lasagna with  boneless chicken breast halves, diced, Alfredo-style pasta sauce, and shredded mozzarella cheese.</p>
    </div>
    <div class="col three bg nopad pointer">
      <div class="imgholder"><iframe  width="303"height="300" src="https://www.youtube.com/embed/kXm5tvnEMgM" frameborder="0" allowfullscreen>Please wait.</iframe></div>
      <h1 class="feature">Recipe:&nbsp;Lasagna&nbsp;&nbsp;&nbsp;Cited:&nbsp;Emily Tao</h1>
      <p>Classic Lasagna with  boneless chicken breast halves, diced, Alfredo-style pasta sauce, and shredded mozzarella cheese.</p>
    </div>-->
    <div class="group"></div>
  </div>
</div>

<!--<div class="section">
  <div class="container">
    <h1 class="reset">All recipe providers Cited:</h1> <p>Jane Lee, John Stein, William Smith, Daniel schemit, Emily Tao, Abby Harper, Tayler Hyde, Adam Klaus, Jordan Hamilton, Judy Craufurd. </p>
  </div>
</div>-->
<div class="section">
  <div class="footer"><section class="wow slideInUp" data-wow-delay="0.3s" style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;"> 
    <div class="container white">                    
      <div class="col four left">
        <h1>Fugo Studio</h1>
        <p><i class="fa fa-map-marker"></i> 130 Chapman Ave, Fullerton, <br/>
            CA 92832</p>
        <p><i class="fa fa-phone"></i> 1 -234 -456 -7890</p>
        <p><i class="fa fa-fax"></i> 1 -234 -456 -7890</p>
        <p><i class="fa fa-envelope-o"></i> <a href="mailto:email@domain.com">fugoplace@gmail.com</a>.</p>
      </div>
      <div class="col four left">
        <h1>Link-uri utile</h1>
        <div class="link-util">
        <p><a href="#"> Link util</a></p>
        <p><a href="#"> Link util</a></p>
        <p><a href="#"> Link util</a></p>
        <p><a href="#"> Link util</a></p>
        <p><a href="#"> Link util</a></p>
            </div>
      </div>
      <div class="col four left">
        <h1>Pastreaza legatura</h1>
        <p><div style="text-align:center;">
          <img src="http://icons.iconarchive.com/icons/graphics-vibe/purple-glossy-social/32/facebook-icon.png"/>
          <img src="http://icons.iconarchive.com/icons/graphics-vibe/purple-glossy-social/32/rss-feed-icon.png"/>
          <img src="http://icons.iconarchive.com/icons/graphics-vibe/purple-glossy-social/32/youtube-icon.png"/>
          <img src="http://icons.iconarchive.com/icons/graphics-vibe/purple-glossy-social/32/google-icon.png"/>
          <img src="http://icons.iconarchive.com/icons/graphics-vibe/purple-glossy-social/32/dribbble-icon.png"/>
          </div></p>
        <p>Text text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text .</p>
      </div>
      <div class="col four left">
        <h1>Drepturi</h1>
        <p>© WebZzone - ALL RIGHTS RESERVED 201x-2015</p>
          <p>Versiune <b>1.0.1</b> - ultima actualizare: 21.07.2015</p>
      </div>
      <div class="group"></div>
    </div></section>
  </div></div>
</div>
  </body>
</html>