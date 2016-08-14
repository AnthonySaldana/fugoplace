<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Mail;

use App\User;

use App\Invitations;

use Auth;

class mailController extends Controller
{
    public function sendmail( $email ){
    	//return $email;

    	//$user = User::findOrFail(6);
    	$user = User::where('email', '=', $email)->get()[0];
    	//print_r( $user );
    	//return 'hello';
        Mail::send('emails.activation', ['user' => $user], function ($m) use ($user) {
            $m->from('fugoplace@mg.anthonysaldana.com', 'fugoplace');

            $m->to($user->email, $user->name)->subject('Welcome to FugoPlace!');
        });

        return "success";
    }

    public function sendpublic( Request $request ){

        $rules = [
        'name'  => 'required',
        'email' => 'required',
        'message'   => 'required',
        'selection' => 'required'
        ];

        $this->validate($request, $rules);



        //return $email;

        //$user = User::findOrFail(6);
        //$user = User::where('email', '=', $email)->get()[0];
        //print_r( $user );
        //return 'hello';
        Mail::send('emails.contact', ['data' => $request], function ($m) use ($request) {
            $m->from( env('FROM_EMAIL' , ''), 'Fugoplace');
            $m->sender(env('FROM_EMAIL' , ''), 'Fugoplace');
            $m->to( env('CONTACT_EMAIL' , ''), 'FugoPlace')->subject( $request->selection );
        });

        return redirect()->back()->with('sent',[1]);
    }

     public function sendInvite( Request $request ){

        $rules = [
        'email' => 'required',
        'role'   => 'required'
        ];

        $this->validate($request, $rules);

        $random_key = str_random(7) . "37" . str_random(6);

        try{
         $invitation = Invitations::create([
                    'key'           => $random_key,
                   'sent_by'        => Auth::user()->id,
                   'sent_to'        => $request->email,
                   'role'           => $request->role,
                   'status'         => 2,
                   'created_at'     => date('Y-m-d H:i:s')
               ]);
             }
        catch( \Illuminate\Database\QueryException $e ){
            return redirect()->back()->with('sent_error','There was an error in sending this invitation. The email has already been used to receive an invitation.');
        }

        //$invitation = Invitations::where('email', $request->email)->get()->first();
        $key = $invitation->key;
        $url = 'http://fugoplace.local/register?key=' . $key;
        $sent_by = Auth::user()->email;

        $data = array(
            'email'     => $request->email,
            'role'      => $request->role,
            'key_url'   => $url,
            'sent_by'  => $sent_by
            );

        $sent_to = $request->email;

        Mail::send('emails.invitation', ['data' => $data], function ($m) use ($sent_to, $sent_by) {
            $m->from( $sent_by, 'Fugoplace');
            $m->sender($sent_by, 'Fugoplace');
            $m->to( $sent_to, 'FugoPlace')->subject( "you've been invited!" );
        });

        return redirect()->back()->with('sent','Your Invite has been sent successfully');
}



    /*public function sendschool( Request $request, $school ){
        //return $email;

        //$user = User::findOrFail(6);
        $user = User::where('email', '=', $email)->get()[0];
        //print_r( $user );
        //return 'hello';
        Mail::send('emails.activation', ['user' => $user], function ($m) use ($user) {
            $m->from('fugoplace@mg.anthonysaldana.com', 'fugoplace');

            $m->to($user->email, $user->name)->subject('Welcome to FugoPlace!');
        });

        return "success";
    }*/

}
