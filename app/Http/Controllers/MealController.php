<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use Auth;

use Validator;

use App\MealPlanner;

use App\Recipe;

class MealController extends Controller
{

    public function __construct(){

        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        /*$user_id = Auth::user()->id;

        return view('user.meal-planner', [
            'user_id' => $user_id
        ]);*/

        $user_id = Auth::user()->id;

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

        


        return view('user.meal-planner', [
            'user_id' => $user_id,
            'meals'   => $newgroup
        ]);

        //return "hello world index";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user_id = Auth::user()->id;

        $recipes = Recipe::where('author_id',$user_id)->get();

        /**
        *   Build our meal planner query
        *   We left join our recipes table to our meal planner, giving us access to each meal and recipe details for each meal.
        *   We then first order the data by date, followed by another ordering by meal type. We made our meal types alphabetical.
        */
        $meals = DB::table('meal_planner')->leftjoin('recipes', 'meal_planner.recipe_id', '=' , 'recipes.id')->orderBy('date','asc')->orderBy('meal','asc')->get();

        return view('user.meal-planner-editor', [
            'recipes' => $recipes,
            'user_id' => $user_id,
            'meals'   => $meals
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * Stores user id for this meal, the date, the meal, and the recipe id.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if( isset( $request->send ) ){

            $rules = array(
                'meal_date'         => 'required|date',
                'recipe_select'     => 'required',
                'meal'              => 'required',
            );

            //$validator = Validator::make(Input::all(), $rules);
            $validator = Validator::make($request->all(), $rules);
            // if the validator fails, redirect back to the form
            if ($validator->fails()) {

                return view('user.meal-planner-editor')->withErrors($validator)->withInput( $request ); // send back the input (not the password) so that we can repopulate the form
            
            }

            $meal_object = new MealPlanner;

            $user_id = Auth::user()->id;

            /**
            *   Minor validation for possible front end manipulation. Only allow certain values for meal selector.
            */
            switch ( $request->meal ) {
                case 'B':
                    $meal = 'B';
                break;
                
                case 'BR':
                    $meal = 'BR';
                break;

                case 'L':
                    $meal = 'L';
                break;

                default:
                    $message = "Invalid Meal Selected";
                    return view('user.meal-planner-editor')->withErrors($message)->withInput( $request );
                break;
            }

            /**
            *   Double Check that our recipe id is valid
            */
            if ( isset( $request->recipe_select ) ){

                $recipe = Recipe::findOrFail( $request->recipe_select );

                $recipe_id = $recipe->id;

            }

            /**
            *   Assign our properties to our model
            */

            $meal_object->user_id = $user_id;

            $meal_object->date = $request->meal_date;

            $meal_object->meal = $meal;

            $meal_object->recipe_id = $recipe_id;

            $meal_object->save(); //save it :)

            $request->session()->flash('alert-success', 'Meal was created successfully!');

            return redirect('user/meal-planner/'. $user_id .'/edit');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $user_id = Auth::user()->id;

        if( $id == $user_id ){

            return view('user.meal-planner', ['user_id' => $id]);
        
        }

        return redirect('user/meal-planner');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user_id = Auth::user()->id;

        if( $id == $user_id ){

            $recipes = Recipe::where('author_id',$user_id)->get();

            /**
            *   Build our meal planner query
            *   We left join our recipes table to our meal planner, giving us access to each meal and recipe details for each meal.
            *   We then first order the data by date, followed by another ordering by meal type. We made our meal types alphabetical.
            */
            $meals = DB::table('meal_planner')->leftjoin('recipes', 'meal_planner.recipe_id', '=' , 'recipes.id')->orderBy('date','asc')->orderBy('meal','asc')->get();

            return view('user.meal-planner-editor', [
                'recipes' => $recipes,
                'user_id' => $user_id,
                'meals'   => $meals
            ]);

        }

        return redirect('user/meal-planner');

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        /**
        *   A try catch to handle deletion errors
        */
        try
        {
            $meal = MealPlanner::findOrFail( $id );
        }
        // catch(Exception $e) catch any exception
        catch(ModelNotFoundException $e)
        {
            $user_id = Auth::user()->id;
            $destroymessage = "An error occurred while trying to delete the meal with the id: " . $id;
            return redirect('user/meal-planner/'. $user_id .'/edit')->withErrors($destroymessage);
        }

        
        $user_id = Auth::user()->id;
        
        $meal_author = $meal->user_id;

        if ( $meal_author == $user_id ){
            
            $meal->delete();
            
        }

        return redirect('user/meal-planner/'. $user_id .'/edit');
    }
}
