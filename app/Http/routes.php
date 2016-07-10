<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use Illuminate\Http\Request;

/**
*	BASIC PAGE ROUTER HANDLERS
*/

Route::get('/images/recipes/{file}','ImageController@getImageRecipe');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function(){
	return view('welcome');
});

Route::get('/faq', function(){
	return view('faq');
});

Route::get('/about',function(){
	return view('about');
});

Route::get('/contact',function(){
		return view('contact');
});

Route::get('/school/{all}', 'SchoolController@showSchool');

Route::get('/school/{all}/about', 'SchoolController@showabout');

Route::get('/school/{all}/faq', 'SchoolController@showfaq');

Route::get('/school/{all}/contact', 'SchoolController@showcontact');

Route::get('/school/{all}/fugo', 'SchoolController@showfugo');


Route::get('/recipe/{id}', 'SchoolController@showRecipe');

Route::get('/meal/{id}', 'PublicMealController@show');
/**
*	LOGIN / REGISTRATION ROUTE HANDLING
*/

// route to process the form
Route::post('/login', ['uses' => 'FugoController@doLogin']);

// route to show the login form
Route::get('/login', ['uses' => 'FugoController@showLogin']);

Route::get('/logout', ['uses' => 'FugoController@doLogout']);

Route::post('/register' , [ 'uses' => 'FugoController@createUser' ] );

Route::get('/register', function(){
	return redirect('/login');
});


/**
*	USER PAGES ROUTE HANDLING
*/

Route::get('/user/', ['middleware' => 'auth', function(){
	//return view('user.dashboard');
	return redirect('/user/meal-planner');
}
]);

Route::get('/user/dashboard', ['middleware' => 'auth', function(){
		return view('user.dashboard');
} 
]);

Route::get('/test/mail/{message}' , ['uses' => 'MailController@sendmail'] );

Route::resource('/user/meal-planner', 'MealController');

Route::resource('/user/folder-fav', 'FolderController');

Route::resource('/user/video-recipes', 'VideoController');

Route::resource('/user/notes', 'NotesController'); //auth verified

Route::resource('/user/tutorials', 'TutorialController');

Route::resource('/user/recipes', 'RecipeController');

/**
*	SEPERATE CATCH ALL FOR USER PAGE VS EVERYOTHER NON EXISTENT PAGE
*/

Route::any('user/{all}', function(){
	return redirect('/user');
})->where('all', '.*'); // Catch All Route

Route::any('{all}', array('uses' => 'FugoController@catchAllURL'))->where('all', '.*'); // Catch All Route