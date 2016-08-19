<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Validator;

use App\User;

use App\Notes;

use App\Recipe;

use App\MealPlanner;

use App\Invitations;

use Auth;

use Session;

use DateTime;

use DateInterval;


class FugoController extends Controller
{
    //

    public function home(){

    	return 'Welcome home!';

    }

    public function meal(){
    	return 'Meal Planner';
    }

    public function showLogin(){

    	if (Auth::check()) {
    		return redirect('/user');
		}
    	return view('login');
    }

    public function registration( Request $request ){
    	$data = $request->input();
    	$headmessage = 'For information about registration, use the form on the contact page.';
    	$errors = array();
    	$error1 = 'No invite detected';
    	$error2 = 'Invalid Parameters detected';

    	if( empty( $data ) ){

    		$errors[] = $error1;

    	}else if( !empty( $data['key'] ) && count( $data ) == 1 ){

	    	 if( strlen( $data['key'] ) == 10 ) {
	    	 	$invitation = Invitations::where('key' , $data['key'])->get()->first();
	    	 	if( empty( $invitation) ){
	    	 		$errors[] = 'No Invitation was found';
	    	 	}else{

	    	 		if( $invitation['status'] == 2 ){
	    	 			$sorted_invitation = array(
	    	 			'id'		=> $invitation['id'],
	    	 			'key'		=> $invitation['key'],
	    	 			'sent_to'	=> $invitation['sent_to'],
	    	 			'role'		=> $invitation['role']
	    	 			);

	    	 			return view('login', [
			    		'allowreg' 		=> true,
			    		'invitation'	=> $sorted_invitation
		    		]);
	    	 		}elseif( $invitation['status'] == 1 ){
	    	 			$errors[] = 'This invitation has already been approved';
	    	 		}else{
	    	 			$errors[] = 'This invitiation has been denied or does not exist.';
	    	 		}

	    	 	}
	    	}else{
    			$errors[] = 'invalid invitation';
	    	}


    	}else{
    		//If any other query paramters are found or key is not found we process through here
    		$errors[] = $error2;
    		
    	}

    	return view('login', [
    		'customerrors' => array(
    			'head'		=> $headmessage,
    			'errors'	=> $errors
    			)
    		]);
    }


    public function createUser( Request $request  ){

    		$rules = array(
			    'email'    					=> 'required|email|confirmed',
			    'email_confirmation'		=> 'required|email',
			    'password' 					=> 'required|min:6|confirmed',  
			    'password_confirmation' 	=> 'required|min:6',
			    'school_name' 				=> 'required',
			    'invitationid'				=> 'required',
			    'invitationkey'				=> 'required'
			    
			);

			//$validator = Validator::make(Input::all(), $rules);
			$validator = Validator::make($request->all(), $rules);
			// if the validator fails, redirect back to the form
			if ($validator->fails()) {
			    return back()->withErrors($validator)->withInput( $request->except('password') ); // send back the input (not the password) so that we can repopulate the form
			} else {

				//Validate invitation and proceed with user creation. 
				$invitationid = $request->invitationid;
				$invitationkey = $request->invitationkey;

				$invitation = Invitations::where('key' , $invitationkey)->where('id' , $invitationid)->where('status', 2 )->get()->first();

				//return $invitation->sent_by;

				$school_slug = str_replace(' ', '-', $request->school_name);

				$usercount = User::where('school_slug', '=', $school_slug)->count();

				if ( $usercount > 0 ) {
				   $school_slug = $school_slug . "-" . $usercount .  str_random(2);
				}

				User::create([
		           'name' 			=> $request->school_name,
		           'email' 			=> $request->email,
		           'school_name' 	=> $request->school_name,
		           'school_slug'	=> $school_slug,
		           'password' 		=> bcrypt($request->password),
		           'invite_id'		=> $invitationid,
		           'group_id'		=> $invitation->sent_by,
		           'role'			=> $invitation->role
		       ]);

				$invitation->status = 1;
				$invitation	->save();

				//Example recipes to start

				if ( Auth::attempt( ['email' => $request->email, 'password' => $request->password ] ) ) {

$notedata = array(

array(
'title'     	=> 'To do List',
'content'    	=> 'Task number 1
Task number 2 
Task number 3',
'author_id' 	=> Auth::user()->id,
'created_at'=>date('Y-m-d H:i:s')

),array(
'title'     	=> 'Organize',
'content'    	=> 'Task number 1
Task number 2
Task number 3',
'author_id' 	=> Auth::user()->id,
'created_at'=>date('Y-m-d H:i:s')

),
array(
'title'     	=> 'Email back',
'content'    	=> 'Email Person 1
Task number 2
Task number 3',
'author_id' 	=> Auth::user()->id,
'created_at'=>date('Y-m-d H:i:s')

)
);

					Notes::insert( $notedata );


					$data = array(
				    array(
				        'title'     	=> 'Pancake',
				        'content'    	=> '<ul>
												<li>1 1/2 cups all-purpose flour</li>
												<li>3 1/2 teaspoons baking powder</li>
												<li>1 teaspoon salt</li>
												<li>1 tablespoon white sugar</li>
												<li>1 1/4 cups milk</li>
												<li>1 egg</li>
												<li>3 tablespoons butter, melted</li>
											</ul>',
						'media'			=> 'pancake.jpg',
				        'author_id' 	=> Auth::user()->id,
				        'video_recipe'	=> 0,
				        'videolink'	=> '',
				        'favorite'		=> 1,
				        'created_at'=>date('Y-m-d H:i:s')

				    ),
				    array(
				    	'title'     	=> 'Deep Dish Pizza',
				        'content'    	=> '<ul>
												<li>2 tablespoons olive oil</li>
												<li>1 tablespoon chopped fresh garlic</li>
												<li>2 teaspoons chopped fresh basil</li>
												<li>1 teaspoon chopped fresh oregano</li>
												<li>1/4 teaspoon fennel seeds</li>
												<li>1/2 teaspoon salt</li>
												<li>1/4 teaspoon freshly ground black pepper</li>
												<li>1/4 teaspoon red pepper flakes</li>
												<li>1 (28-ounce) can plum tomatoes, coarsely crushed</li>
												<li>1 tablespoon dry red wine</li>
												<li>1 teaspoon sugar</li>
												<li>1 tablespoon extra-virgin olive oil</li>
												<li>1 pound mozzarella cheese, sliced</li>
												<li>8 ounces pepperoni, thinly sliced</li>
												<li>8 ounces mushrooms, wiped clean and thinly sliced</li>
												<li>1 green bell pepper, cored and cut into thin rings</li>
												<li>1 yellow onion, cut into thin rings</li>
												<li>1 cup thinly sliced black olives</li>
												<li>1 pound crumbled hot Italian sausage</li>
												<li>1 cup grated Parmesan</li>
											</ul>',
						'media'			=> 'deepdish.jpg',
				        'author_id' 	=> Auth::user()->id,
				        'video_recipe'	=> 0,
				        'videolink'	=> '',
				        'favorite'		=> 1,
				        'created_at'=>date('Y-m-d H:i:s')
				    ),
					array( 
						'title'     	=> 'Lasagna',
				        'content'    	=> '<ul>
												<li>1 (16 ounce) package lasagna noodles.</li>
												<li>1 (10 ounce) package frozen chopped spinach.</li>
												<li>3 cooked, boneless chicken breast halves, diced.</li>
												<li>2 (16 ounce) jars Alfredo-style pasta sauce.</li>
												<li>4 cups shredded mozzarella cheese.</li>
												<li>2 pints ricotta cheese.</li>
												<li>salt and ground black pepper to taste.</li>
											</ul>',
						'media'			=> 'lasagna.jpg',
				        'author_id' 	=> Auth::user()->id,
				        'video_recipe'	=> 0,
				        'videolink'	=> '',
				        'favorite'		=> 0,
				        'created_at'=>date('Y-m-d H:i:s')
					 ),
					array( 
						'title'     	=> 'Chicken & Couscous',
				        'content'    	=> '<ul>
												<li>9 oz. (250 g) couscous</li>
												<li>12 oz. (350 g) chicken breast</li>
												<li>7 oz. (200 g) rocket</li>
												<li>2tbsp butter</li>
												<li>10cherry tomatoes</li>
												<li>Black olives</li>
												<li>Sultanas</li>
												<li>1tbsp oil </li>
												<li>Salt</li>
											</ul>',
						'media'			=> '',
				        'author_id' 	=> Auth::user()->id,
				        'video_recipe'	=> 1,
				        'videolink'	=> 'https://www.youtube.com/embed/qPIjWW28E3A',
				        'favorite'		=> 0,
				        'created_at'=>date('Y-m-d H:i:s')
					 ),
					array( 
						'title'     	=> 'Stuffed peppers',
				        'content'    	=> '<ul>
												<li>Red bell peppers</li>
												<li>Half an onion</li>
												<li>Half a cup of tomato sauce</li>
												<li>Half a cup of beef broth </li>
												<li>Red pepper flakes</li>
												<li>Salt</li>
												<li>Pound and a half of ground meet</li>
												<li>Garlic</li>
												<li>Parsley </li>
												<li>Black pepper</li>
												<li>Parmesan cheesy</li>
												<li>Rice</li>
											</ul>',
						'media'			=> '',
				        'author_id' 	=> Auth::user()->id,
				        'video_recipe'	=> 1,
				        'videolink'	=> 'https://www.youtube.com/embed/KD7_HOERkYg',
				        'favorite'		=> 0,
				        'created_at'=>date('Y-m-d H:i:s')
					 ),
					array( 
						'title'     	=> 'Truffle Cauliflower Gratin',
				        'content'    	=> '<ul>
												<li>Truffle pecorino cheese </li>
												<li>Butter</li>
												<li>Flower</li>
												<li>Milk </li>
												<li>Cayenne pepper</li>
												<li>Salt</li>
												<li>Nutmeg</li>
												<li>Cauliflower</li>
												<li>Plain bread crumbs </li>
												<li>Parmesan cheesy</li>
												<li>Olive oil</li>
											</ul>',
						'media'			=> '',
				        'author_id' 	=> Auth::user()->id,
				        'video_recipe'	=> 1,
				        'videolink'	=> 'https://www.youtube.com/embed/wg2ajk7W6t4',
				        'favorite'		=> 0,
				        'created_at'=>date('Y-m-d H:i:s')
					 )
				);

				Recipe::insert($data);

				
				$recipes = Recipe::where('author_id',Auth::user()->id )->get();

				$now = new DateTime;
				$interval = new DateInterval('P1W');
				$interval_two = new DateInterval('P1D');

				$next_week = $now->add( $interval )->format('Y-m-d');
				$preformat_date2 = $now->add( $interval_two )->format('Y-m-d');
				$preformat_date3 = $now->add( $interval_two )->format('Y-m-d');

				$meal_date = array(
					$next_week,
					$preformat_date2,
					$preformat_date3
					);

				$meal_data = array();
				$meals = array( 'B','BR','L' );

				for( $day = 0; $day < 3; $day++ ){

					foreach ($recipes as $recipe) {

						if( !empty( $recipe['videolink'] ) ){
							$meal_media = 'V';
						}else{
							$meal_media = 'I';
						}

							$meal_data[] = array(

									'user_id'     	=> Auth::user()->id,
					        		'date'    		=> $meal_date[ $day ],
									'meal'			=> $meals[ rand(0,2) ],
									'mealmedia'		=> $meal_media,
					        		'recipe_id' 	=> $recipe['id'],
					        		'created_at'	=>date('Y-m-d H:i:s')
								
								);

					}

				}

				MealPlanner::insert( $meal_data );
				//$request->session()->flash('alert-success', 'You were registered successfully.');
		        //return redirect('/user'); 

				 return redirect('/user/meal-planner')->with('new_user', [1]); 

				 return view('user.meal-planner', [
		            'user_id' => Auth::user()->id,
		            'meals'   => $newgroup,
		            'today'   => $today,
		            'school_link'   => Auth::user()->school_slug
		        ]);

		         return view('user.dashboard', [
		            'new_user' => 1
		        ]);

			    } else {        

			        // validation not successful, send back to form with errors
			        return redirect('/login')->withErrors($validator)->withInput( $request->except('password') ); 

			    }

			}
    }

    public function doLogin( Request $request ){
	    	// validate the info, create rules for the inputs
			$rules = array(
			    'email'    => 'required|email', 
			    'password' => 'required|min:3'
			);

			//$validator = Validator::make(Input::all(), $rules);
			$validator = Validator::make($request->all(), $rules);
			// if the validator fails, redirect back to the form
			if ($validator->fails()) {
			    return redirect('/login')->withErrors($validator)->withInput( $request->except('password') ); // send back the input (not the password) so that we can repopulate the form
			} else {
				//	dd($request->all());
			

		    // create our user data for the authentication
		    //echo $request->email . " + " . $request->password;
		    	//die();
		    // attempt to do the login
				$email = $request->email;
				$pw = $request->password;
		    if ( Auth::attempt( ['email' => $email, 'password' => $pw ] ) ) {

		        // validation successful!
		        // redirect them to the secure section or whatever
		        // return Redirect::to('secure');
		        // for now we'll just echo success (even though echoing in a controller is bad)
		        return redirect('/user'); 

		    } else {        

		        // validation not successful, send back to form 
		        return redirect('/login'); 
		        //return redirect('login')->withInput( $request->except('password') );

		    }

		    	
	    }
	}

    public function doLogout(){
    	Auth::logout(); // log the user out of our application
    	Session::flush();
    	return redirect('login'); 
    }

    public function catchAllURL(){

    		return redirect('/');

    }

}