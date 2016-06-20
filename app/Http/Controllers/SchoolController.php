<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use App\Recipe;

use DB;

class SchoolController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showSchool($school)
    {
        $user = User::where('school_slug',$school)->get();

    	$school_name = $user[0]->school_name;
    	$school_slug = $user[0]->school_slug;


    	//return view('school' , [ 'user' => $user ]);

    	$user_id = $user[0]->id;

        /**
        *   Build our meal planner query
        *   We left join our recipes table to our meal planner, giving us access to each meal and recipe details for each meal.
        *   We then first order the data by date, followed by another ordering by meal type. We made our meal types alphabetical.
        */
        $meals = DB::table('meal_planner')->leftjoin('recipes', 'meal_planner.recipe_id', '=' , 'recipes.id')->where('meal_planner.user_id', $user_id )->whereDay('date', '>=' , date('d') )->orderBy('date','asc')->orderBy('meal','asc')->take(20)->get();

        $templevel = 0;

        $newkey = 0;

        $newgroup = array();

        foreach( $meals as $key => $meal ){

            $newgroup[$meal->date][$meal->meal][]=$meal;

        }

        /*echo "<pre>";
        print_r( $newgroup );
        echo "</pre>";*/

        


        return view('school', [
            'meals'   => $newgroup,
            'user'	  => $user[0]
        ]);
    }

    public function showRecipe( $id ){

    	$recipe = Recipe::find($id);

    	if( empty( $recipe ) ){
    		return redirect('/');
    	}
        
        return view('meal', ['Recipe' => $recipe]);


    }

}
