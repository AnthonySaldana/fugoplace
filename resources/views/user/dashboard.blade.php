<!DOCTYPE html>
<html>
	<head>
		<title>FugoPlace</title>
		<link rel="stylesheet" href="{{ URL::asset('css/user.css') }}">
	</head>
	<body id="dashboard">
	
		
    <h1><span class="two">Fugo</span>&nbsp;&nbsp;<u>Place</u><br /><span>

		<span>The helpful friend of foodservice.</span>
		<hr />
		<br />
		
    <div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
  </div> <!-- end .flash-message -->
    
		<table style="width:32%">
  <tr>
    <td><a href="{{ action('MealController@index') }}"  ><button class="button button1">Meal Planner</button></a></td>
    <td><a href="{{ action('MealController@index') }}"  ><img src="{{ URL::asset('siteimages/stock-illustration-62639690-vector-flat-calendar-illustration.jpg') }}" HEIGHT="95" WIDTH="110" BORDER="0"/></a></td>		
    
  </tr>
  <tr>
    <td><a href="{{ action('NotesController@index') }}"  ><button class="button button1">Notes/Task</button></a></td>
    <td><a href="{{ action('NotesController@index') }}"  ><img src="{{ URL::asset('siteimages/stock-illustration-81553369-notebook-notepad-flat-style.jpg') }}" HEIGHT="100" WIDTH="110" BORDER="0"/></a></td>		
    
  </tr>
  <tr>
    <td><a href="{{ action('VideoController@index') }}"><button class="button button1">Video Recipe</button></a></td>
    <td><a href="{{ action('VideoController@index') }}"><img src="{{ URL::asset('siteimages/video-icon-green.jpg') }}" HEIGHT="80" WIDTH="100" BORDER="0"/></a></td>		
    
  </tr>
  <tr>
    <td><a href="{{ action('FolderController@index') }}"  ><button class="button button1">Folder Favorites</button></a></td>
    <td><a href="{{ action('FolderController@index') }}"  ><img src="{{ URL::asset('siteimages/yellow-folder-red-heart-28433241.jpg') }}" HEIGHT="80" WIDTH="100" BORDER="0"/></a></td>		
    
  </tr>
    <tr>
    <td><a href="{{ action('RecipeController@index') }}"  ><button class="button button1">All Recipes</button></a></td>
    <td><a href="{{ action('RecipeController@index') }}"  ><img src="{{ URL::asset('siteimages/CookbookIcon.png') }}" HEIGHT="100" WIDTH="110" BORDER="0"/></a></td>    
    
  </tr>
  <tr>
    <td><a href="{{ action('TutorialController@index') }}"><button class="button button1">Tutorial</button></a></td>
    <td><a href="{{ action('TutorialController@index') }}"><img src="{{ URL::asset('siteimages/video-play-xxl.png') }}" HEIGHT="80" WIDTH="85" BORDER="0"/></a></td>		
    
  </tr>
  <tr>
    <td><button class="button button1">Contact FS</button></td>
    <td><img src="{{ URL::asset('siteimages/contact_us_icon.png') }}" HEIGHT="100" WIDTH="110" BORDER="0"/></td>		
    
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
