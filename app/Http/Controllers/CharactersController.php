<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CharactersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ['name' => 'Abigail', 'state' => 'CA'];
        
        return response()->json($data,200);
    }

            /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }
   
}
