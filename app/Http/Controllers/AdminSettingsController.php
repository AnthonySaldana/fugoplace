<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

use App\Settings;

class AdminSettingsController extends Controller
{

    public $user_role;

     /**
     * Display the settings associated with the current user and role.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

         if ( null != Auth::check()){
            $user_id = Auth::user()->id;
        $this->user_role = Auth::user()->role;
        $user_status = Auth::user()->status;

        if( $this->user_role == 0 ){
            //User Role Label Setting
            $role_names[0] = Settings::where('meta_name' , 'user_role_name0')->get()->first();
            $role_names[1] = Settings::where('meta_name' , 'user_role_name1')->get()->first();
            $role_names[2] = Settings::where('meta_name' , 'user_role_name2')->get()->first();

            $user_role_names[0] = $role_names[0]->meta_value;
            $user_role_names[1] = $role_names[1]->meta_value;
            $user_role_names[2] = $role_names[2]->meta_value;

            $status_names[0] = Settings::where('meta_name' , 'user_status_name0')->get()->first();
            $status_names[1] = Settings::where('meta_name' , 'user_status_name1')->get()->first();
            $status_names[2] = Settings::where('meta_name' , 'user_status_name2')->get()->first();

            $user_status_names[0] = $status_names[0]->meta_value;
            $user_status_names[1] = $status_names[1]->meta_value;
            $user_status_names[2] = $status_names[2]->meta_value;
            //$user_role_names[2] = Settings::where('meta_key' , 'user_role_name2')->get();
 
        }else if( $this->user_role == 1 ){
            //show district specific settings
            echo 'District';
        }else{
            //kick out with error
            echo "error user shouldn't be here";
        }

         return view('admin.settings', [
            'user_role'     => $this->user_role,
            'user_status'   => $user_status,
            'user_role_names'   => $user_role_names,
            'user_status_names' => $user_status_names
        ]);
        }else{
            return redirect('/login');
        }
        

        /*return view('user.recipes', [
            'Recipes' => $recipes
        ]);*/

        //return view('user.recipes');
    }

}