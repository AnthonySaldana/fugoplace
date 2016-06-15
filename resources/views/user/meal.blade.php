<!DOCTYPE html>
<html>
  <head>
    <title>FugoPlace</title>
	<style>
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
    .img {
	float:right;
	}
	
  </style>
  </head>
  <body>
    @include('user.includes.userheader')
    <script>
		function myFunction() {
		    confirm("Trash composed recipe?");
		}
	</script>
	<br />
	<?php 
    if(isset( $Recipe )){
        $id = $Recipe[0]['id'];
        $title = $Recipe[0]['title'];
        $author = $Recipe[0]['author_id'];
        $content = $Recipe[0]['content'];
    }
        ?>
    <div style="max-width:1000px;">
	<a href="{{ action('RecipeController@edit', array($id) ) }}" class='btn two'>Edit</a>
	<a href="{{ action('RecipeController@destroy', array($id) ) }}" class='btn two' onclick="myFunction()">Delete</a>
	
	<h2 style="font-family: Garamond;">&nbsp;&nbsp;&nbsp;&nbsp;{{ $title }}</h2>
	<div>{{ $content }}</div>
	
	<img class="img" src="https://s3.amazonaws.com/gigsalad_media/b/braised_orlando/55196f09cc97a.jpg"HEIGHT="400" WIDTH="600" BORDER="1px"/>
	</div>
  </body>
</html>