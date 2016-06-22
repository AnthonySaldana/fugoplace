<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Recipe;

use Redirect;

use Auth;

use File;

use Validator;

class RecipeController extends Controller
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
        $user_id = Auth::user()->id;

        $recipes = Recipe::where('author_id',$user_id)->get();

        return view('user.recipes', [
            'Recipes' => $recipes
        ]);

        //return view('user.recipes');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.recipe-editor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if( isset( $request->send ) ){

            $rules = array(
                'media'                     => 'max:5000|mimes:jpeg,png',
            );

            //$validator = Validator::make(Input::all(), $rules);
            $validator = Validator::make($request->all(), $rules);
            // if the validator fails, redirect back to the form
            if ($validator->fails()) {
                return view('user.recipe-editor')->withErrors($validator)->withInput( $request ); // send back the input (not the password) so that we can repopulate the form
            }
            
            if( isset( $request->recipeid ) ){

                $recipe = Recipe::find( $request->recipeid ); //get recipe by id

                $user_id = Auth::user()->id;
                
                $recipe_author = $recipe->author_id;

                if ( $recipe_author != $user_id ){
                    
                    return redirect('user/recipes');
                    
                }

            }else{

                $recipe = new Recipe; //if no recipe id was sent,  create a new one
            
            }

            $author_id = Auth::user()->id;

            $recipe->title = $request->title;

            $recipe->content = $request->content;

            /**
            *   Handle file uplaod
            */
            if( $request->hasfile('media') && $request->file('media')->isValid() ){

                $recipe_media = $request->file('media');

                $random = str_random(10);
                $extension = $request->file('media')->getClientOriginalExtension();
                $recipe_file_name = $request->title . "_" . $author_id . "_" . $random . "." . $extension;
                $storage_path = storage_path('recipes/');
                $recipe_media->move( $storage_path, $recipe_file_name );

                

                if( isset( $recipe->media ) ){

                    File::delete($storage_path . "/" . $recipe->media);

                }

                $recipe->media = $recipe_file_name;;

            }

            /**
            *   check for and update videolink
            */
            if( isset( $request->videolink ) ){

                $recipe->videolink = $request->videolink;
            
            }

            /**
            *   Check for and update 'is video' setting
            */
            if( isset( $request->video ) && $request->video == 1 ){

                $recipe->video_recipe = 1;
            
            }else{
               
                $recipe->video_recipe = 0;
            
            }


            /**
            *   Check for and update 'is favorite' setting
            */
            if( isset( $request->favorite ) && $request->favorite == 1 ){

                $recipe->favorite = 1;
            
            }else{
                
                $recipe->favorite = 0;
            
            }

            $recipe->author_id = $author_id;
            $recipe->save();
                

        }elseif( isset( $request->delete ) && isset( $request->recipeid ) ){

                $this->destroy($request->recipeid);
        }

        return redirect('/user/recipes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $recipe = Recipe::where('id',$id)->get();

        $author_id = Auth::user()->id;

        $recipe_author = $recipe[0]->author_id;

        if ( $recipe_author == $author_id ){
        
            return view('user.meal', ['Recipe' => $recipe]);
        
        }else{
        
            return redirect('/user/recipes');
        
        }
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $recipe = Recipe::where('id',$id)->get();

        $author_id = Auth::user()->id;

        $recipe_author = $recipe[0]->author_id;

        if ( $recipe_author == $author_id ){

            return view('user.recipe-editor', ['recipe' => $recipe]);

        }else{

            return redirect('/user/recipes');

        }
    }

    /**
     * Update the specified resource in storage.
     * Quick Favorite for our recipes
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if( isset($request->quickfav) ){

            if( isset( $request->fav ) ){
                //return "hello";
                $recipe = Recipe::find($request->id);
                $recipe->favorite = 1;
                $recipe->save();
            }

            if( isset( $request->unfav ) ){

                $recipe = Recipe::find($request->id);
                $recipe->favorite = 0;
                $recipe->save();
                
            }
           

        }
            return Redirect::back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $recipe = Recipe::find( $id );
        $user_id = Auth::user()->id;
        
        $recipe_author = $recipe->author_id;

        if ( $recipe_author == $user_id ){
            
            $recipe->delete();
            
        }

        return redirect('/user/recipes');

    }
}
