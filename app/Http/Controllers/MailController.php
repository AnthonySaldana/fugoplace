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
}
