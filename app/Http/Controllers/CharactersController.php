<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gdakuzak\Services\CharacterService;

class CharactersController extends Controller
{
    public function __construct(CharacterService $characterService)
    {
        $this->characterService = $characterService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chars = $this->characterService->renderList();
        
        return response()->json($chars,200);
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
