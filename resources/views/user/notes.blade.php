<!DOCTYPE html>
<html>
  <head>
  <!--taken from http://codepen.io/attilahajzer/pen/pFJdb-->
    <title>FugoPlace</title>
	 <script src="N_T.js"></script> 
	 <style>
	 body{background-color:#EEE;}

section{
  width:200px;
  margin:30px auto 0 auto;
  font-family:Arial;
  color:#333;
  background-color:#FFF;
  padding:5px 15px;
  border-radius:4px;
  box-shadow:0px 1px 2px #999;
}
section h3{
  text-align: center;
  font-weight:100;
  color:#333;
  font-family: arial;
}

ol{
  list-style-type:none;
  margin-left:0;
  padding:0;
}

li{
  line-height:35px;
  position:relative;
  left:0px;
  border-top:1px solid #CCC;
  transition:background-color 0.5s;
  padding-left:15px;
}
li:last-child{border-bottom:1px solid #CCC;}
li.checked{
  text-decoration: line-through;
  background-color:#91D1FF;
}

li input:checked li{background-color:red;}

li:hover{background-color:#91D1FF; cursor: pointer;}

#btnAddItem{margin: 0 auto; padding: o auto; text-align: center; width: 100%; height: 35px; color:#1F86ED;}

#NewItemName{
  height:300px; width:300px;
  background-color: #333;
  display:none;
}

	 </style>
  </head>
  <body>
  @include('user.includes.userheader')
  <?php if(isset( $user_id ) ){
      echo "Notes & Tasks for user #: " . $user_id;
    } ?>
  <section> <!--the first few words in their note will be made as the tittle for that note-->
  <h3>Note/Task</h3>
<form action="{{ action('NotesController@create' ) }}" method="get">
   <input type="submit" id="btnAddItem" onclick="btnAddItem_onclick()" value=" + Add Item">
  <ol id="list">
      <?php 
        foreach( $Notes as $note ){
              $id = $note['id'];
              $title = $note['title'];?>
            <li><a href="{{ action('NotesController@edit', array( $id ) ) }}"> <?php echo $title; ?> </a></li>  
              <?php 
        }
      ?>
    <!--<li><a href="{{ action('NotesController@edit', array( 0 ) ) }}">to do list..</a></li>
    <li><a href="{{ action('NotesController@edit', array( 1 ) ) }}">call bill,..</a></li>-->
  </ol>
     

     
</form>
</section>
  <div id="NewItemName">
       
       <input type="text" id="item" value="" />
       <input type="submit" value="Submit" id="submitNewItem" />
     </div>
  </body>
</html>