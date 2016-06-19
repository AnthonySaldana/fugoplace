<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getImageRecipe( $filename )
    {
        //
        $path = storage_path( 'recipes/' . $filename );
       $type = "image/jpeg";
       header('Content-Type:'.$type);
       header('Content-Length: ' . filesize($path));
       readfile($path);
    }
}
