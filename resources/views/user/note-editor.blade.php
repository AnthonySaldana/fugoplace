<!DOCTYPE html>
<html>
  <head>
    <title>FugoPlace</title>
  <link rel="stylesheet" href="{{ URL::asset('css/user.css') }}">
  </head>
  <body id="note-editor">
    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);
    </script>
    <script>
      function myFunction() {
        return confirm("Trash this note?");
      }

      
    </script>

  @include('user.includes.userheader-two')

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
  <form method="post" action="{{ url('/user/notes') }}">
  <article class="head" style="padding:15px;">
    <button class="two" type="submit" name="send" value="1" style="margin-left:5px;">Save</button>
    <!--<button class="two" type="submit" name="edit" value="1">Edit</button>-->
    <button class="two" type="submit" name="delete" value="1" onclick="myFunction()">Discard</button>
  </article>
  <div style="position:absolute; top: 98px; width:100%;left: 37px;">
    <div style="position: absolute; right: 38px; top: 23px; display:inline-block;">
      <label for="title"><b>Title:</b> </label>
      <input type="text" name="title" value="<?php if(isset( $note )){ echo $note[0]['title']; }?>"/>
    </div>
    <br/>
    <textarea name="content" placeholder="Enter your note here" style="min-height:913px;"><?php if(isset( $note )){ echo $note[0]['content']; } ?></textarea>
  </div>
   
    <?php if(isset( $note )){ ?>
        <input type="hidden" name="noteid" value="<?php echo $note[0]['id']; ?>" />
    <?php } ?>
    <!--<input type="hidden" name="_token" value="{{ csrf_token() }}"/>-->
    {{ csrf_field() }}
  </form>   
</section>

<!--<script>
setTimeout(1000);
var nicEditArray = document.getElementsByClassName("nicEdit-main");
console.log( nicEditArray );
      var nicEdit = nicEditArray;
      var nicEditParentDiv = nicEdit.parentNode;
      console.log()
      nicEditParentDiv.style.border = 'none !important';
    </script>-->
  </body>
</html>