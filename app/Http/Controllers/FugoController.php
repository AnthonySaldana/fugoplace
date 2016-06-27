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

use Auth;

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


    public function createUser( Request $request  ){

    		$rules = array(
			    'email'    					=> 'required|unique:users|email|confirmed',
			    'email_confirmation'		=> 'required|email',
			    'password' 					=> 'required|min:6|confirmed',  
			    'password_confirmation' 	=> 'required|min:6',
			    'school_name' 				=> 'required',
			    
			);

			//$validator = Validator::make(Input::all(), $rules);
			$validator = Validator::make($request->all(), $rules);
			// if the validator fails, redirect back to the form
			if ($validator->fails()) {
			    return redirect('/login')->withErrors($validator)->withInput( $request->except('password') ); // send back the input (not the password) so that we can repopulate the form
			} else {

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
		       ]);

				//Example recipes to start

				if ( Auth::attempt( ['email' => $request->email, 'password' => $request->password ] ) ) {

					$notedata = array(

						    array(
						        'title'     	=> 'To do List',
						        'content'    	=> '<ul>
														<li>Task number 1</li>
														<li>Task number 2</li>
														<li>Task number 3</li>
													</ul>',
						        'author_id' 	=> Auth::user()->id,
						        'created_at'=>date('Y-m-d H:i:s')

						    ),array(
						        'title'     	=> 'Organize',
						        'content'    	=> '<ul>
														<li>Task number 1</li>
														<li>Task number 2</li>
														<li>Task number 3</li>
													</ul>',
						        'author_id' 	=> Auth::user()->id,
						        'created_at'=>date('Y-m-d H:i:s')

						    ),
						    array(
						        'title'     	=> 'Email back',
						        'content'    	=> '<ul>
														<li>Email Person 1</li>
														<li>Task number 2</li>
														<li>Task number 3</li>
													</ul>',
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
						'media'			=> 'deep-dish.jpg',
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
						'title'     	=> 'Healthy Vegan Recipes',
				        'content'    	=> '<ul><li>1. Hurom Slow Juicer</li>
												<li>2. Traditional Medicinals Mint Tea</li>
												<li>3. Traditional Medicinals Chamomile Tea</li>
												<li>4. Sunwarrior Protein Powder</li>
												<li>5. Dr. Ohhiras Probiotics</li>
												<li>6. Prairie Naturals Chlorella</li>
												<li>7. VitaVegan Multivitamin</li>
												<li>8. Marys Organic Crackers</li>
												<li>9. Crazy Sexy Diet Book</li>
												<li>10. Fablunch Containers</li>
											</ul>',
						'media'			=> '',
				        'author_id' 	=> Auth::user()->id,
				        'video_recipe'	=> 1,
				        'videolink'	=> 'https://www.youtube.com/embed/kXm5tvnEMgM',
				        'favorite'		=> 0,
				        'created_at'=>date('Y-m-d H:i:s')
					 ),
					array( 
						'title'     	=> 'Healthy Vegan Recipes',
				        'content'    	=> '<ul>
												<li>1. Hurom Slow Juicer</li>
												<li>2. Traditional Medicinals Mint Tea</li>
												<li>3. Traditional Medicinals Chamomile Tea</li>
												<li>4. Sunwarrior Protein Powder</li>
												<li>5. Dr. Ohhiras Probiotics</li>
												<li>6. Prairie Naturals Chlorella</li>
												<li>7. VitaVegan Multivitamin</li>
												<li>8. Marys Organic Crackers</li>
												<li>9. Crazy Sexy Diet Book</li>
												<li>10. Fablunch Containers</li>
											</ul>',
						'media'			=> '',
				        'author_id' 	=> Auth::user()->id,
				        'video_recipe'	=> 1,
				        'videolink'	=> 'https://www.youtube.com/embed/kXm5tvnEMgM',
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

				$request->session()->flash('alert-success', 'You were registered successfully.');
		        return redirect('/user'); 

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
    	return redirect('login'); 
    }

    public function catchAllURL(){

    		return redirect('/');

    }

}