<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gdakuzak\Services\UserService;
use Hash;
use Illuminate\Support\Str;

class TokenController extends Controller
{
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function createToken(Request $request)
    {
        try {
            $validator = $request->validate([
                'name' => 'required',
                'email' => 'required|unique:users',
            ]);
            
            $insert = $this->userService->buildInsert($request->merge([
                'password' => Hash::make(Str::random(20)),
            ])->all());

            $token = $insert->createToken($insert->email);

            return response()->json([
                'email' => $insert->email,
                'token' => $token->plainTextToken
            ],200);
            
        }catch (\Exception $e)
        {
            \Log::error($e->getFile() . "\n" . $e->getLine() . "\n" . $e->getMessage());
            return response()->json([
                'msg' =>  $e->getMessage()
            ],500);
        }

    }
}
