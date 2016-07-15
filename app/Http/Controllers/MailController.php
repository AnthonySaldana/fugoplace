<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Mail;

use App\User;

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
            $m->from('fugoplace@mg.anthonysaldana.com', 'fugoplace');

        });

        return redirect()->back()->with('sent',[1]);
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
