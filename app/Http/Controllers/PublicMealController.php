<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Recipe;

use App\MealPlanner;

use Auth;

use DB;

class PublicMealController extends Controller
{
     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($mealid)
    {

    	$meal = DB::table('meal_planner')->leftjoin('recipes', 'meal_planner.recipe_id', '=' , 'recipes.id')->where('meal_planner.meal_id', $mealid )->get();
        
    	//print_r( $meals );

       	//$recipe = Recipe::where('id',$id)->get();

        //$author_id = Auth::user()->id;

        //$recipe_author = $recipe[0]->author_id;

        
        return view('publicMeal', ['meal' => $meal[0]]);
       
    
    }
}
