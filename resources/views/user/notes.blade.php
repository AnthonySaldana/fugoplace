<!DOCTYPE html>
<html>
  <head>
  <!--taken from http://codepen.io/attilahajzer/pen/pFJdb-->
    <title>FugoPlace</title>
	 <script src="N_T.js"></script> 
   <link rel="stylesheet" href="{{ URL::asset('css/user.css') }}">
  </head>
  <body id="notes">
  @include('user.includes.userheader')
  <?php if(isset( $user_id ) ){
      echo "Notes & Tasks for user #: " . $user_id;
    } ?>
  <section> <!--the first few words in their note will be made as the tittle for that note-->
  <h3>Note/Task</h3>
<form action="{{ action('NotesController@create' ) }}" method="get">
   <input type="submit" id="btnAddItem" onclick="btnAddItem_onclick()" value=" + Add Item">
  <ul id="list">
      <?php 
        foreach( $Notes as $note ){
              $id = $note['id'];
              $title = $note['title'];
              $content = $note['content'];
              $strlimit = 100;
              ?>
            <li><a href="{{ action('NotesController@edit', array( $id ) ) }}"> {!! str_limit( strip_tags( $title) ,$strlimit, $end = '...' ) !!}</a></li>  
              <?php 
        }
      ?>
    <!--<li><a href="{{ action('NotesController@edit', array( 0 ) ) }}">to do list..</a></li>
    <li><a href="{{ action('NotesController@edit', array( 1 ) ) }}">call bill,..</a></li>-->
  </ul>
     

     
</form>
</section>
  <div id="NewItemName">
       
       <input type="text" id="item" value="" />
       <input type="submit" value="Submit" id="submitNewItem" />
     </div>
  </body>
</html>