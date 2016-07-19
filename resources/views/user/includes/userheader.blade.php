<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style>

    #dashboard{
        float:left; 
        /*width:25%;*/
    }

    #dashboard .nav-container tr td{
        width:200px;
        text-align: right;
    }

    #dashboard .nav-container{
        margin-left: 15px;
    }
      #dashboard .two {
border-radius: 17px;
width: 10px;
padding: 5px;
border: 2px solid #ff9900;
margin: 0;
font-size:80px;
position: relative;
right: -10px;
bottom: -15px;
}

#dashboard u {
position: relative;
right: -10px;
bottom: -15px;
}

#dashboard .subheader {
position: relative;
bottom: -20px;
right: -20px;
}

#dashboard .container{
width:100%; /*modified from 110px*/
height:130px;
display:block;
background-color:#99ccff;
position:absolute;
top:0;left:0;

}


::-webkit-input-placeholder {
color: #cdd9f1;
}
:-moz-placeholder {
color: #cdd9f1;
}
::-moz-placeholder {
color: #cdd9f1;
}
:-ms-input-placeholder {
color: #cdd9f1;
}
#dashboard input:focus{
outline:none;
content:"";
}
:focus::-webkit-input-placeholder { 
color: #6779bc; 
text-shadow:0 -1px 0 rgba(0, 0, 0, .2);
font-size:1em;
}

#dashboard #icon{
width:21px;
height:21px;
position:relative;
top:5%;
left:9.6%;
z-index:2;
border-box:1px solid black;
background:white;
border-radius:3px;
padding-right:2px;
text-align:right;
font-size:1.4em;
font-family: Klavika, 'lucida grande', 'lucida sans', sans-serif; 
font-weight:bold;
overflow:hidden;
color:#4c66a4;
display:inline-block;
}


#dashboard .input1 {
height:20px;
width:130px;
margin-top:3px;
margin-left:10%;
background-color:#4c66a4;
border:none;
line-height:24px;
position:relative;
right: -380px;
top: 40px;
background-color: white;
}

#dashboard .input2 {
height:20px;
width:130px;
margin-top:3px;
margin-left:10%;
background-color:#4c66a4;
border:none;
line-height:24px;
position:relative;
right: -315px;
top: 40px;
background-color: white;
}

#dashboard .spanone {
color: white; 
font-family: sans-serif;
position: relative;
right: -485px;
top: 40px;
color: white;
}

#dashboard .space {
padding: 60px;
}

#dashboard .logout {
position: relative;
/**left: 950px; **/
bottom: 10px;
width: 	155px;
margin-right: 0;
margin-left: auto;
}

#dashboard .tablespace {
padding: 10px;
}

.fugoschool_link{
	text-align: left;
	padding: 10px;
	padding-bottom: 0;
}

.fugoschool_link a:hover{
	text-decoration: none;
}
    </style>
}
}
<!--<ul class="userheader">
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
</ul>-->
<div id="dashboard">
<script>
    $( document ).ready(function() {
        $('.active').on("click", function (e) {
        e.preventDefault();
    });

    });
</script>
<!--<div class="box"></div>-->
<div></div>
<div class="container">



<strong><span class="two">Fugo</span></strong>&nbsp;&nbsp;<u><strong>Place</strong></u><br />
<span class="subheader"><strong>The helpful friend of foodservice.</strong></span>
<div class="logout">
<?php $link = $_SERVER['HTTP_HOST'] . '/school/' . Auth::user()->school_slug; ?>
<a href="/logout" type="button" class="btn btn-default btn-sm">
<span class="glyphicon glyphicon-log-out"></span> Log out
</a>


</div>
</div>
<br />

<table class="nav-container">
<div class="space"></div>
 <div class="flash-message" style="margin-left:15px;">

        @if(Session::has('new_user'))

            <div style='text-align: center; background-color: #e6ffff; width: 100%; padding: 35px; margin: 25px; font-family: Helvetica; margin-left:0;' >
            <h2 style='text-align: center;'>Welcome to FugoPlace!</h2>
            You have now activated your FugoPlace account. We hope everything is to your liking and if you have any questions or suggestions you can contact us below. <br />We thank you for using FugoPlace.
            </div>
            @endif
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
  </div> <!-- end .flash-message -->
<tr>
<td colspan="1"><a href="{{ action('MealController@index') }}"  {{{ (Request::is('user/meal-planner') ? 'class=active' : '') }}}><button class="button button1">Meal Planner</button></a></td>
<td><a href="{{ action('MealController@index') }}"  ><img src="{{ URL::asset('siteimages/stock-illustration-62639690-vector-flat-calendar-illustration.jpg') }}" HEIGHT="95" WIDTH="110" BORDER="0"/></a></td>		

</tr>
<tr>
<td><a href="{{ action('NotesController@index') }}" {{{ (Request::is('user/notes') ? 'class=active' : '') }}} ><button class="button button1">Notes</button></a></td>
<td><a href="{{ action('NotesController@index') }}"  ><img src="{{ URL::asset('siteimages/stock-illustration-81553369-notebook-notepad-flat-style.jpg') }}" HEIGHT="100" WIDTH="110" BORDER="0"/></a></td>		

</tr>
<tr>
<td><a href="{{ action('VideoController@index') }}" {{{ (Request::is('user/video-recipes') ? 'class=active' : '') }}}><button class="button button1">Video Recipes</button></a></td>
<td><a href="{{ action('VideoController@index') }}"><img src="{{ URL::asset('siteimages/video-icon-green.jpg') }}" HEIGHT="80" WIDTH="100" BORDER="0"/></a></td>		

</tr>
<tr>
<td><a href="{{ action('FolderController@index') }}"  {{{ (Request::is('user/folder-fav') ? 'class=active' : '') }}}><button class="button button1">Folder Favorites</button></a></td>
<td><a href="{{ action('FolderController@index') }}"  ><img src="{{ URL::asset('siteimages/yellow-folder-red-heart-28433241.jpg') }}" HEIGHT="80" WIDTH="100" BORDER="0"/></a></td>		

</tr>
<tr>
<td><a href="{{ action('RecipeController@index') }}" {{{ (Request::is('user/recipes') ? 'class=active' : '') }}} ><button class="button button1">All Recipes</button></a></td>
<td><a href="{{ action('RecipeController@index') }}"  ><img src="{{ URL::asset('siteimages/CookbookIcon.png') }}" HEIGHT="100" WIDTH="110" BORDER="0"/></a></td>    

</tr>
<tr>
<td><a href="http://{{ $link }}" ><button class="button button1">Public Page</button></a></td>
<td><a href="http://{{ $link }}"><img src="http://images.all-free-download.com/images/graphicthumb/offline_web_pages_37174.jpg" HEIGHT="100" WIDTH="110" BORDER="0"/></a></td> 
</tr>
<tr>
<td><a href="{{ action('TutorialController@index') }}" {{{ (Request::is('user/tutorials') ? 'class=active' : '') }}}><button class="button button1">Tutorial</button></a></td>
<td><a href="{{ action('TutorialController@index') }}"><img src="{{ URL::asset('siteimages/video-play-xxl.png') }}" HEIGHT="80" WIDTH="85" BORDER="0"/></a></td>		

</tr>
<tr>
<td><a href="http://{{ $link }}/contact" ><button class="button button1">Contact FS</button></a></td>
<td><a href="http://{{ $link }}/contact" ><img src="{{ URL::asset('siteimages/contact_us_icon.png') }}" HEIGHT="100" WIDTH="110" BORDER="0"/></a></td>		

</tr>
<!--<tr>
<td><a href="/logout"><button class="button button1" style="color:gray;">Logout</button></a></td>
<td></td>   

</tr>-->
<tr>
<td><button class="button button1" style="color:gray;">Coming Soon</button></td>		
</tr>

<?php if( isset( $showpubliclink ) ){ ?>

<tr class="link_container" style="position:absolute; right:0; background-color: #efefef;">
	<td style="width:400px;">
	<br/>
	<p style="text-align:left; margin-left:10px;">Your Public Image link can be found below: </p>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.12/clipboard.min.js">	</script>
	<script>
		var Clipboard = new Clipboard('.clip'); 
		$( document ).ready(function() {



			$('.link_tooltip').hide();
			Clipboard.on('success', function(e) {
			    /*console.info('Action:', e.action);
			    console.info('Text:', e.text);
			    console.info('Trigger:', e.trigger);
			    e.clearSelection();*/
			    $('#linkhtml').select();
			    //$('.link_tooltip').show();
			    $(".link_tooltip").fadeIn(100).delay(1000).fadeOut(2000);
			});

			/*$('.hide_link').click( function(){
				$( 'link_container' ).css('bottom','0');
			});*/
		});
	</script>
		<?php $linkhtml = '<div style="width:450px;" class="fugoschool_link"><a href="http://' . $link . '" style="text-decoration:none; margin:25px; display:block; text-decoration:none;">
			<span class="two" style="position:static; border-radius: 17px; width: 10px; padding: 10px; border: 2px solid #ff9900; margin: 0px; font-size: 45px; font-family: sans-serif, Helvetica; color:black; text-decoration:none;">
				  Fugo
			</span>
			&nbsp;
			&nbsp;
			<u style="position:static;font-size: 45px; font-family: sans-serif, Helvetica; color:black;">Place</u>
		</a></div>' ?>
		{!!	$linkhtml !!}
		<hr/>
		<input id="linkhtml" value="{{ $linkhtml }}" style="width:90%;" onclick="this.select()" readonly>
		<button class="clip" data-clipboard-target="#linkhtml" style="position:relative;">
		<p style="position:absolute; top: -20px; left:-20px;" class="link_tooltip">Copied!!</p>
		    <img width="15px;" src="{{ URL::asset('siteimages/clippy.svg') }}" alt="Copy to clipboard">
		</button>
	</td>
</tr>
<?php } ?>
</table>



</div>