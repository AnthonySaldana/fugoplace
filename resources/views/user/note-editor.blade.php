<!DOCTYPE html>
<html>
  <head>
    <title>FugoPlace</title>
  <link rel="stylesheet" href="{{ URL::asset('css/user.css') }}">
  </head>
  <body id="note-editor">
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
  <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
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
    <textarea name="content" placeholder="Enter your note here" style="min-height:800px;"><?php if(isset( $note )){ echo $note[0]['content']; } ?></textarea>
    <?php if(isset( $note )){ ?>
        <input type="hidden" name="noteid" value="<?php echo $note[0]['id']; ?>" />
    <?php } ?>
    <!--<input type="hidden" name="_token" value="{{ csrf_token() }}"/>-->
    {{ csrf_field() }}
  </form>   
</section>
  </body>
</html>