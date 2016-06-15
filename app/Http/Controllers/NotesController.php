<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Notes;

class NotesController extends Controller
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
        //
         $notes = Notes::where('author_id',0)->get();

        return view('user.notes', [
            'Notes' => $notes
        ]);
        //return view('user.notes');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.note-editor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd($request->all());
        
        /*$validator = Validator::make($request->all(), [
            'title' => 'required',
                    ]);

        if ( $validator->fails() ) {
            return redirect('/user/notes/create')->withInput()->withErrors($validator);
        }*/

        if( isset( $request->send ) ){
            
            if( isset( $request->noteid ) ){
                $note = Notes::find( $request->noteid );
            }else{
                $note = new Notes;
            }
            $note->title = $request->title;
            $note->content = $request->content;
            $note->author_id = 0;
            $note->save();
            //dd($request->all());
            //$note->create($request_all());
            //$note->title = $request->title;
            //$note->content = $request->content;
            //$note->author_id = 0;
            

        }elseif( isset( $request->delete ) && isset( $request->noteid ) ){
                $this->destroy($request->noteid);
        }
        return redirect('/user/notes');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
         $note = Notes::where('id',$id)->get();

        return view('user.note-editor', ['note' => $note]);
        //return view('user.notes', ['user_id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $note = Notes::where('id',$id)->get();
        return view('user.note-editor', ['note' => $note]);
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
        $note = Notes::where('id', $id)->delete();
    }
}
