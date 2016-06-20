<ul class="userheader">
<li><a href="/user/dashboard">Dashboard</a></li>
<li><a href="{{ action('MealController@index') }}">Meal Planner</a></li>
<li><a href="{{ action('NotesController@index') }}">Notes</a></li>
<li><a href="{{ action('VideoController@index') }}">Video Recipes</a></li>
<li><a href="{{ action('RecipeController@index') }}">Recipes</a></li>
<li><a href="{{ action('FolderController@index') }}">Folder Fav</a></li>
<li><a href="{{ action('TutorialController@index') }}">Tutorials</a></li>
<br/>
<li>Your School slug is: </li>
<li><a href="/"><small>Home</small></a></li>
<li><a href="/logout"><small>Log Out</small></a></li>
</ul>