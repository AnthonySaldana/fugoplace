<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Recipe;

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
        $recipes = Recipe::where('author_id',0)->get();

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
            
            if( isset( $request->recipeid ) ){
                $recipe = Recipe::find( $request->recipeid );
            }else{
                $recipe = new Recipe;
            }
            $recipe->title = $request->title;
            $recipe->content = $request->content;
            if( isset( $request->video ) && $request->video == 1 ){
                $recipe->video_recipe = 1;
            }else{
                $recipe->video_recipe = 0;
            }

            if( isset( $request->favorite ) && $request->favorite == 1 ){
                $recipe->favorite = 1;
            }else{
                $recipe->favorite = 0;
            }
            $recipe->author_id = 0;
            $recipe->save();
            //dd($request->all());
            //$note->create($request_all());
            //$note->title = $request->title;
            //$note->content = $request->content;
            //$note->author_id = 0;
            

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

        return view('user.meal', ['Recipe' => $recipe]);
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
        return view('user.recipe-editor', ['recipe' => $recipe]);
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
        //
    }
}
