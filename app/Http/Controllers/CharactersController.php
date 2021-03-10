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
    public function show($id)
    {
        $char = $this->characterService->renderEdit($id);
        
        return response()->json($char,200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function comics($id)
    {
        $char = $this->characterService->renderEdit($id);

        $data = [
            'id' => $char->id,
            'name' => $char->name,
            'description' => $char->description,
            'comics' => $char->comics,
        ];
        
        return response()->json($data,200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function events($id)
    {
        $char = $this->characterService->renderEdit($id);

        $data = [
            'id' => $char->id,
            'name' => $char->name,
            'description' => $char->description,
            'events' => $char->events,
        ];
        
        return response()->json($data,200);
    }
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function series($id)
    {
        $char = $this->characterService->renderEdit($id);

        $data = [
            'id' => $char->id,
            'name' => $char->name,
            'description' => $char->description,
            'series' => $char->series,
        ];
        
        return response()->json($data,200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function stories($id)
    {
        $char = $this->characterService->renderEdit($id);

        $data = [
            'id' => $char->id,
            'name' => $char->name,
            'description' => $char->description,
            'stories' => $char->stories,
        ];
        
        return response()->json($data,200);
    }
}
