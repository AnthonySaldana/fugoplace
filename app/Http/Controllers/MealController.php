<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use Auth;

use Datetime;
use DateInterval;
use DatetimeZone;

use Validator;

use App\MealPlanner;

use App\Recipe;

class MealController extends Controller
{

    public $user_role;

    public function __construct(){

        if ( null != Auth::check()){
            $this->user_role = Auth::user()->role;
        }else{
            return redirect('/login');
        }
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ( null != Auth::check()){

        $user_id = Auth::user()->id;

        /**
        *   Build our meal planner query
        *   We left join our recipes table to our meal planner, giving us access to each meal and recipe details for each meal.
        *   We then first order the data by date, followed by another ordering by meal type. We made our meal types alphabetical.
        */

        //$now = new DateTime;
        $today = new DateTime;
        $today->setTimeZone( new DateTimeZone('America/Los_Angeles') );
        $today_day = date('l', strtotime( $today->format('Y-m-d') ) );
        if( 'Monday' == $today_day ){
            $monday = $today->format('Y-m-d');//date( 'Y-m-d' , strtotime('Monday this week') );
        }else{
            $monday = date( 'Y-m-d' , strtotime('Next monday -1 week'));//date( 'Y-m-d' , strtotime('Monday this week') );
        }

        $interval = new DateInterval('P1W');
        
        //$nextmonday = date( 'Y-m-d' , strtotime('Next monday') );
        $monday_datetime = DateTime::createFromFormat('Y-m-d', trim($monday));
        $monday_datetime->setTimeZone( new DateTimeZone('America/Los_Angeles') );
        $monday = $monday_datetime->format('Y-m-d');
        $nextmonday = $monday_datetime->add( $interval )->format('Y-m-d');
        //print_r( "Monday: " . $monday . " / Next Monday: " . $nextmonday . "Today: " . $today->format('Y-m-d') );
        //die();
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

        


        return view('user.meal-planner', [
            'user_id' => $user_id,
            'meals'   => $newgroup,
            'today'   => $today,
            'school_link'   => Auth::user()->school_slug,
            'user_role' => $this->user_role
        ]);
        }else{
            return redirect('/login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         if ( null != Auth::check()){
            $user_id = Auth::user()->id;

            $recipes = Recipe::where('author_id',$user_id)->get();

            /**
            *   Build our meal planner query
            *   We left join our recipes table to our meal planner, giving us access to each meal and recipe details for each meal.
            *   We then first order the data by date, followed by another ordering by meal type. We made our meal types alphabetical.
            */
            $meals = DB::table('meal_planner')->leftjoin('recipes', 'meal_planner.recipe_id', '=' , 'recipes.id')->where('meal_planner.user_id', $user_id )->orderBy('date','asc')->orderBy('meal','asc')->get();


            return view('user.meal-planner-editor', [
                'recipes' => $recipes,
                'user_id' => $user_id,
                'meals'   => $meals,
                'user_role' => $this->user_role
            ]);
        }else{
            return redirect('/login');
        }
        
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

                $user_id = Auth::user()->id;
                $recipes = Recipe::where('author_id',$user_id)->get();
                $meals = DB::table('meal_planner')->leftjoin('recipes', 'meal_planner.recipe_id', '=' , 'recipes.id')->where('meal_planner.user_id', $user_id )->orderBy('date','asc')->orderBy('meal','asc')->get();


                return view('user.meal-planner-editor',['meals' => $meals, 'recipes' => $recipes, 'user_id' => $user_id, 'user_role' => $this->user_role ])->withErrors($validator)->withInput( $request ); // send back the input (not the password) so that we can repopulate the form
            
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
            * Simple check on our media type radio buttons
            */

            if( 'I' == $request->meal_media || 'V' == $request->meal_media ){

                $meal_object->mealmedia = $request->meal_media;
            
            }

            /**
            *   Assign our properties to our model
            */

            $meal_object->user_id = $user_id;

            $meal_object->date = $request->meal_date;

            $meal_object->meal = $meal;

            $meal_object->recipe_id = $recipe_id;

            $meal_object->save(); //save it :)

            $request->session()->forget('mealdate');
            $request->session()->put('mealdate', $request->meal_date);

            $request->session()->forget('mealtype');
            $request->session()->put('mealtype', $meal);

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

            return view('user.meal-planner', ['user_id' => $id, 'user_role' => $this->user_role]);
        
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
            $meals = DB::table('meal_planner')->leftjoin('recipes', 'meal_planner.recipe_id', '=' , 'recipes.id')->where('meal_planner.user_id', $user_id )->orderBy('date','asc')->orderBy('meal','asc')->get();

            return view('user.meal-planner-editor', [
                'recipes' => $recipes,
                'user_id' => $user_id,
                'meals'   => $meals,
                'user_role' => $this->user_role
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

        if(  '*ALL*' == $id ){
            $user_id = Auth::user()->id;

            MealPlanner::where('user_id' , $user_id)->delete();
            return redirect('user/meal-planner/');
        }else{

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

    public function destroyall($id)
    {

       print_r($id);

    }
}
