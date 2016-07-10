<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use App\Recipe;

use Auth;

use Datetime;
use DateInterval;
use DatetimeZone;

use DB;

class SchoolController extends Controller
{

    public function schoolData($school){

        $user = User::where('school_slug',$school)->get();

        if( $user->isEmpty() ){
            return redirect('/');
        }
        $school_name = $user[0]->school_name;
        $school_slug = $user[0]->school_slug;


        //return view('school' , [ 'user' => $user ]);

        $user_id = $user[0]->id;


        if (Auth::check()) {
            $isuser = true;
        }else{
            $isuser = false;
        }

        $userdata = array(
            'school_name'   => $school_name,
            'school_slug'   => $school_slug,
            'school_id'     => $user_id,
            'is_user'       => $isuser
            );

        return $userdata;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showSchool($school)
    {
        $user = User::where('school_slug',$school)->get();

        if( $user->isEmpty() ){
            return redirect('/');
        }
    	$school_name = $user[0]->school_name;
    	$school_slug = $user[0]->school_slug;


    	//return view('school' , [ 'user' => $user ]);

    	$user_id = $user[0]->id;

        $videorecipes = Recipe::where('author_id', $user_id)->where('video_recipe' , 1)->get();
        /**
        *   Build our meal planner query
        *   We left join our recipes table to our meal planner, giving us access to each meal and recipe details for each meal.
        *   We then first order the data by date, followed by another ordering by meal type. We made our meal types alphabetical.
        */
        $now = new DateTime;
        $today = new DateTime;
        $today->setTimeZone( new DateTimeZone('America/Los_Angeles') );
        $today_day = date('l', strtotime( $today->format('Y-m-d') ) );
        if( 'Monday' == $today_day ){
            $monday = $today->format('Y-m-d');//date( 'Y-m-d' , strtotime('Monday this week') );
        }else{
            $monday = date( 'Y-m-d' , strtotime('Next monday -1 week'));//date( 'Y-m-d' , strtotime('Monday this week') );
        }
        $interval = new DateInterval('P1W');
        //$monday = date( 'Y-m-d' , strtotime('next Monday -1 week'));//date( 'Y-m-d' , strtotime('Monday this week') );
        $monday_datetime = DateTime::createFromFormat('Y-m-d', trim($monday));
        $nextmonday = $monday_datetime->add( $interval )->format('Y-m-d');

        $meals = DB::table('meal_planner')->leftjoin('recipes', 'meal_planner.recipe_id', '=' , 'recipes.id')->where('meal_planner.user_id', $user_id )->whereDate('date', '<' , $nextmonday )->whereDate('date', '>=' , $monday )->orderBy('date','asc')->orderBy('meal','asc')->get();
        
        //$meals = DB::table('meal_planner')->leftjoin('recipes', 'meal_planner.recipe_id', '=' , 'recipes.id')->where('meal_planner.user_id', $user_id )->whereBetween('date', array( $monday , $nextmonday) )->orderBy('date','asc')->orderBy('meal','asc')->get();

        $templevel = 0;

        $newkey = 0;

        $newgroup = array();

        foreach( $meals as $key => $meal ){

            $newgroup[$meal->date][$meal->meal][]=$meal;

        }

        /*echo "<pre>";
        print_r( $newgroup );
        echo "</pre>";*/

        if (Auth::check()) {
            $isuser = true;
        }else{
            $isuser = false;
        }


        return view('school', [
            'meals'   => $newgroup,
            'user'	  => $user[0],
            'videorecipes' => $videorecipes,
            'today'   => $now,
            'isuser'  => $isuser,
            'school_link' => $school_slug 
        ]);
    }

    public function showRecipe( $id ){

    	$recipe = Recipe::find($id);

    	if( empty( $recipe ) ){
    		return redirect('/');
    	}
        
        return view('meal', ['Recipe' => $recipe]);


    }

    public function showabout($school){

        $school = $this->schoolData( $school );
        //return $school_data;

        //$school_link = $_SERVER['HTTP_HOST'] . '/school/' . $school['school_slug'];

        return view('school/about', [
            'school_link'    => $school['school_slug'],
            'isuser'  => $school['is_user']
        ]);

    }

    public function showfaq($school){

        $school = $this->schoolData( $school );

        return view('school/faq', [
            'school_link'    => $school['school_slug'],
            'isuser'  => $school['is_user']
        ]);

    }

    public function showcontact($school){

        $school = $this->schoolData( $school );

        return view('school/contact', [
            'school_link'    => $school['school_slug'],
            'isuser'  => $school['is_user']
        ]);

    }

    public function showfugo($school){

        $school = $this->schoolData( $school );

        return view('school/welcome', [
            'school_link'    => $school['school_slug'],
            'isuser'  => $school['is_user']
        ]);

    }



}
