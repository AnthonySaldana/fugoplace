<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Invitations;

use App\Settings;

use Validator;

class AdminInvitationsController extends Controller
{
     /**
     * Update the specified Invitation in storage.
     *
     * @param  \Illuminate\Http\Request  $requests
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

    	$rules = array(
		    'status'    => 'required',
		    'id'		=> 'required'  
		);

		$validator = Validator::make($request->all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
		    return back()->withErrors($validator);
		}

    	$invitationId = $request->id;
    	$newstatus = $request->status;

    	$invitation = Invitations::where('id' , $invitationId)->get()->first();
    	$invitation->status = $newstatus;
    	$invitation->save();

    	$statusname = Settings::where( 'meta_name', 'user_status_name' . $newstatus )->get()->first();

    	$request->session()->flash('alert-success', 'Invitation Status was successfully set to ' . $statusname->meta_value );

    	return back();
    }

     public function destroy( Request $request ){

        
        $invitation = Invitations::where( 'id' , $request->id)->get()->first();

        if( !empty( $invitation ) ){
             if( $invitation->status == 2 ){
	        	$invitation->delete();
	        	$request->session()->flash('alert-warning', 'Invitation Was Successfully Deleted' );
	        }else{
	        	 $request->session()->flash('alert-warning', 'This invitation has already been modified. To remove this invitation, the user it is associated with must be deleted.' );
	        	 return back();
	        }
        }else{
        	$request->session()->flash('alert-warning', 'No invitation Detected' );
	        return back();
        }
        
        return back();

    }
}
