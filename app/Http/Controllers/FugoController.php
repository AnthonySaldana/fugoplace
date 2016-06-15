<?php

namespace App\Http\Controllers;

use App\User;

use Auth;

use Illuminate\Http\Request;

use App\Http\Requests;

use Validator;

use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

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
			    'email'    => 'required|email', 
			    'password' => 'required|min:3'
			);

			//$validator = Validator::make(Input::all(), $rules);
			$validator = Validator::make($request->all(), $rules);
			// if the validator fails, redirect back to the form
			if ($validator->fails()) {
			    return redirect('/login')->withErrors($validator)->withInput( $request->except('password') ); // send back the input (not the password) so that we can repopulate the form
			} else {

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