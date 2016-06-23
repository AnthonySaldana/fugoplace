<!DOCTYPE html>
<html>
  <head>
    <title>FugoPlace</title>
	<style>
	body {

   background: -webkit-linear-gradient(top, rgb(136,199,201) 58%, rgb(202,232,235) 100%);

   background: -moz-linear-gradient(top, rgb(136,199,201) 58%, rgb(202,232,235) 100%);

   background: -ms-linear-gradient(top, rgb(136,199,201) 58%, rgb(202,232,235) 100%);

   background: -o-linear-gradient(top, rgb(136,199,201) 58%, rgb(202,232,235) 100%);

   background: linear-gradient(top, rgb(136,199,201) 58%, rgb(202,232,235) 100%);

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

  color: #444;

  line-height: 20px;

  border: 1px solid #d2d2d2;

  background: #fff;

  background: -webkit-gradient(linear, 0 0, 0 100%, from(#d9eaf3), color-stop(4%, #fff)) 0 4px;

  background: -webkit-linear-gradient(top, #d9eaf3 0%, #fff 8%) 0 4px;

  background: -moz-linear-gradient(top, #d9eaf3 0%, #fff 8%) 0 4px;

  background: -ms-linear-gradient(top, #d9eaf3 0%, #fff 8%) 0 4px;

  background: -o-linear-gradient(top, #d9eaf3 0%, #fff 8%) 0 4px;

  background: linear-gradient(top, #d9eaf3 0%, #fff 8%) 0 4px;

  -webkit-background-size: 100% 20px;

  -moz-background-size: 100% 20px;

  -ms-background-size: 100% 20px;

  -o-background-size: 100% 20px;

  background-size: 100% 20px;

  -webkit-border-radius: 3px;

  -moz-border-radius: 3px;

  border-radius: 3px;

  -webkit-box-shadow: 0 1px 2px rgba(0,0,0,0.07);

  -moz-box-shadow: 0 1px 2px rgba(0,0,0,0.07);

  box-shadow: 0 1px 2px rgba(0,0,0,0.07);

  width: 816px;

  height: 1056px;

}
.paper::before {

  content: '';

  position: absolute;

  width: 4px;

  top: 0;

  left: 30px;

  bottom: 0;

  border: 1px solid;

  border-color: transparent #efe4e4;
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
.head {

   background-color: #FFF;

   min-height: 124px;

   margin-left: -42px;
margin-right: -5px;

   margin-top: -4px;

}
.two {
position: relative;
top: 10px;
right: -300px;
}
	.three {
position: relative;
top: -12px;
right: -370px;
}
    .four {
position: relative;
top: -35px;
right: -433px;
}
	</style>
  </head>
  <body>
  @include('user.includes.userheader')
  <?php if( isset($note_id) ){ ?>
  <h2> Form #: <?php echo $note_id;  ?></h2>
  <?php } ?>

  <section class="paper">
  @include('common.errors')

 <!--<article class="head">
    <form class="two" method="get" action="#"><button class="two" type="submit">Save</button></form>
	<form class="three" method="get" action="#"><button class="two" type="submit">Edit</button></form>
	<form class="four" method="get" action="#"><button class="two" type="submit" onclick="myFunction()">Discard</button></form>
 </article>-->
  
 <script>
function myFunction() {
    confirm("Trash this note?");
}
</script>
  <form method="post" action="{{ url('/user/notes') }}">
   <article class="head">
    <button class="two" type="submit" name="send" value="1">Save</button>
  <!--<button class="two" type="submit" name="edit" value="1">Edit</button>-->
  <button class="two" type="submit" name="delete" value="1" onclick="myFunction()">Discard</button>
 </article>
   <label for="title">Enter a title</label>
    <input type="text" name="title" value="<?php if(isset( $note )){ echo $note[0]['title']; }?>"/>
    <br/>

    <label for="content">Make a note</label>
    <textarea name="content" placeholder="Enter your note here" style="min-height:300px;"><?php if(isset( $note )){ echo $note[0]['content']; } ?></textarea>
    <?php if(isset( $note )){ ?>
        <input type="hidden" name="noteid" value="<?php echo $note[0]['id']; ?>" />
    <?php } ?>
    <!--<input type="hidden" name="_token" value="{{ csrf_token() }}"/>-->
    {{ csrf_field() }}
  </form>   
</section>
  </body>
</html>