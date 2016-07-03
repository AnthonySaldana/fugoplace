<ul class="userheader">
<li><a href="/user/dashboard">Dashboard</a></li>
<li><a href="{{ action('MealController@index') }}">Meal Planner</a></li>
<li><a href="{{ action('NotesController@index') }}">Notes</a></li>
<li><a href="{{ action('VideoController@index') }}">Video Recipes</a></li>
<li><a href="{{ action('FolderController@index') }}">Folder Fav</a></li>
<li><a href="{{ action('RecipeController@index') }}">All Recipes</a></li>
<li><a href="{{ action('TutorialController@index') }}">Tutorials</a></li>
<br/>

<?php $link = $_SERVER['HTTP_HOST'] . '/school/' . Auth::user()->school_slug; ?>


<li><a href="/"><small>Home</small></a></li>
<li><a href="/logout"><small>Log Out</small></a></li>
<br/>
<li>Your School link is: <a href="http://{{ $link }}"> {{ $link }} </a> </li>
</ul>