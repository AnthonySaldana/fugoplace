<?php

namespace App\Http\Controllers;

use App\User;

use App\Invitations;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

class AdminUsersController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $user_role = Auth::user()->role;
        $user_status = Auth::user()->status;

        if( $user_role == 0 ){
        	$users_raw = User::get();
        	$invites_raw = Invitations::get();
        	//$user_array = array();
        	//get all users
        	//get all invitiations
        }else if( $user_role == 1 ){
        	$users_raw = User::where('group_id', $user_id )->get();
        	$invites_raw = Invitations::where('sent_by', $user_id)->get();
        	//print_r( $users_raw );
        	//get all users that have a group id equal to this users id
        	//get all invitations that have sent_by equal to this users id
        }else{
        	//kick out with error
        }

        //send through our sorting functions that will take care of sorting our data into an array with only the needed data
        $users_data = $this->sort_user_raw( $users_raw );
        $invite_data = $this->sort_invite_raw( $invites_raw );

        //test display
    	echo "<pre>";
    	print_r( $users_data );
    	echo "<hr/>";
    	print_r( $invite_data );
    	echo "</pre>";

        /*return view('user.recipes', [
            'Recipes' => $recipes
        ]);*/

        //return view('user.recipes');
    }

     /**
     * Store an invitation and call our email function to generate our invitation email
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if( isset( $request->send ) ){

            $rules = array(
                'email'	=> 'required|unique:users|email|confirmed'

            );

            //$validator = Validator::make(Input::all(), $rules);
            $validator = Validator::make($request->all(), $rules);
            // if the validator fails, redirect back to the form
            if ($validator->fails()) {
                //throw error if duplicate email or wrong email
                //return view('user.recipe-editor')->withErrors($validator)->withInput( $request ); // send back the input (not the password) so that we can repopulate the form
            }

        }

        return redirect('/user/admin/users');
    }

    /**
    *	Parameter is a user object
    * 	this function takes a collection of users and sorts their data out for what we need
    */
    public function sort_user_raw( $users_raw ){
    	$users_data = array();

    	foreach( $users_raw as $user_raw ){
    		$users_data[] = array(
    			'id'		=> $user_raw->id,
    			'name'		=> $user_raw->name,
    			'email'		=> $user_raw->email,
    			'role'		=> $user_raw->role,
    			'status'	=> $user_raw->status
    			);
    	}

    	return $users_data;
    }

    /**
    *	Parameter is a user object
    * 	this function takes a collection of users and sorts their data out for what we need
    */
    public function sort_invite_raw( $invites_raw ){
    	$invite_data = array();

    	foreach( $invites_raw as $invite_raw ){
    		$invite_data[] = array(
    			'id'		=> $invite_raw->id,
    			'key'		=> $invite_raw->key,
    			'sent_by'		=> $invite_raw->sent_by,
    			'sent_to'		=> $invite_raw->sent_to,
    			'status'	=> $invite_raw->status
    			);
    	}

    	return $invite_data;
    }
}
