<!DOCTYPE html>
<html>
	<head>
		<title>FugoPlace</title>
		<style>
			span.two {
	
    border-radius: 17px;
    width: 10px;
    padding: 10px;
    border: 2px solid #ff9900;
    margin: 0;
    font-size:50px;
    font-family:Helvetica;

}
u {
	font-size:50px;
	font-family:Helvetica;
}
			span {
			font-size:20px; font-family:Helvetica,sans-serif,Arial Black; 
		}
		
			.button {
    
    background-color: #ffffe6; 
	height:110px;
	width: 200px;
    border: none;
    color: black;
    padding: 40px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 18px;
    margin: 4px 2px;
    cursor: pointer;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
}

.button1 {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
}

		
		</style>
	</head>
	<body>
	
		
    <h1><span class="two">Fugo</span>&nbsp;&nbsp;<u>Place</u><br /><span>

		<span>The helpful friend of foodservice.</span>
		<hr />
		<br />
		
		<table style="width:32%">
  <tr>
    <td><a href="{{ action('MealController@index') }}"  ><button class="button button1">Meal Planner</button></a></td>
    <td><a href="{{ action('MealController@index') }}"  ><img src="http://i.istockimg.com/file_thumbview_approve/62639690/5/stock-illustration-62639690-vector-flat-calendar-illustration.jpg" HEIGHT="95" WIDTH="110" BORDER="0"/></a></td>		
    
  </tr>
  <tr>
    <td><a href="{{ action('NotesController@index') }}"  ><button class="button button1">Notes/Task</button></a></td>
    <td><a href="{{ action('NotesController@index') }}"  ><img src="http://i.istockimg.com/file_thumbview_approve/81553369/5/stock-illustration-81553369-notebook-notepad-flat-style.jpg" HEIGHT="100" WIDTH="110" BORDER="0"/></a></td>		
    
  </tr>
  <tr>
    <td><a href="{{ action('RecipeController@index') }}"  ><button class="button button1">Recipes</button></a></td>
    <td><a href="{{ action('RecipeController@index') }}"  ><img src="http://i.istockimg.com/file_thumbview_approve/81553369/5/stock-illustration-81553369-notebook-notepad-flat-style.jpg" HEIGHT="100" WIDTH="110" BORDER="0"/></a></td>    
    
  </tr>
  <tr>
    <td><a href="{{ action('VideoController@index') }}"><button class="button button1">Video Recipe</button></a></td>
    <td><a href="{{ action('VideoController@index') }}"><img src="http://www.glaucoma.co.il/wp-content/uploads/video-icon-green.jpg" HEIGHT="80" WIDTH="100" BORDER="0"/></a></td>		
    
  </tr>
  <tr>
    <td><a href="{{ action('FolderController@index') }}"  ><button class="button button1">Folder Favorites</button></a></td>
    <td><a href="{{ action('FolderController@index') }}"  ><img src="http://thumbs.dreamstime.com/m/yellow-folder-red-heart-28433241.jpg" HEIGHT="80" WIDTH="100" BORDER="0"/></a></td>		
    
  </tr>
  <tr>
    <td><a href="{{ action('TutorialController@index') }}"><button class="button button1">Tutorial</button></a></td>
    <td><a href="{{ action('TutorialController@index') }}"><img src="http://www.iconsdb.com/icons/preview/icon-sets/web-2-orange-2/video-play-xxl.png" HEIGHT="80" WIDTH="85" BORDER="0"/></a></td>		
    
  </tr>
  <tr>
    <td><button class="button button1">Contact FS</button></td>
    <td><img src="http://www.gokkusagianaokulu.k12.tr/images/contact_us_icon.png" HEIGHT="100" WIDTH="110" BORDER="0"/></td>		
    
  </tr>
      <tr>
    <td><a href="/logout"><button class="button button1" style="color:gray;">Logout</button></a></td>
    <td></td>   
    
  </tr>
  <tr>
    <td><button class="button button1" style="color:gray;">Coming Soon</button></td>
    <td></td>		
    
  </tr>
  
</table>

		
		
	</body>
</html>
