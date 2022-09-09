<?php

namespace App\Http\Controllers;

use Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Gdakuzak\Models\User;
use App\Gdakuzak\Services\UserService;

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

            $password = Str::random(20);

            $insert = $this->userService->buildInsert($request->merge([
                'password' => Hash::make($password),
            ])->all());

            $token = $insert->createToken('api-response');

            return response()->json([
                'email' => $insert->email,
                'token' => $token->plainTextToken,
                'password' => $password,
            ],200);

        } catch (\Exception $e)
        {
            \Log::error($e->getFile() . "\n" . $e->getLine() . "\n" . $e->getMessage());
            return response()->json([
                'msg' =>  $e->getMessage()
            ],500);
        }
    }

    public function login(Request $request)
    {
        try {
            $validator = $request->validate([
                'email' => 'required',
                'password' => 'required',
            ]);

            $user = $this->userService->renderByEmail($request->email);

            if ($user) {
                if (Hash::check($request->password, $user->password)) {
                    $token = $user->createToken('api-response')->plainTextToken;
                    $response = ['token' => $token];
                    return response($response, 200);
                } else {
                    $response = ["message" => "Password mismatch"];
                    return response($response, 422);
                }
            } else {
                $response = ["message" =>'User does not exist'];
                return response($response, 422);
            }

        } catch (\Exception $e)
        {
            \Log::error($e->getFile() . "\n" . $e->getLine() . "\n" . $e->getMessage());
            return response()->json([
                'msg' =>  $e->getMessage()
            ],500);
        }
    }
}
