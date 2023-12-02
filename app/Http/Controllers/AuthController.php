<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            $validator = $this->validateRegister($request);

            if ($validator->fails()) {
                return response()->json(
                    [
                        "success" => false,
                        "message" => "Error registering user",
                        "error" => $validator->errors()
                    ],
                    Response::HTTP_BAD_REQUEST
                );
            }

            $newUser = User::create([
                "name" => $request->input('name'),
                "nickname" => $request->input('nickname'),
                "email" => $request->input('email'),
                "password" => bcrypt($request->input('password')),
                "photo" => $request->input('photo'),
            ]);

            return response()->json(
                [
                    "success" => true,
                    "message" => "User registered",
                    "data" => $newUser
                ],
                Response::HTTP_CREATED
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return response()->json(
                [
                    "success" => false,
                    "message" => "Error registering user"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    private function validateRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:100',
            'nickname' => 'required|unique:users|min:3|max:100',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6|max:12|regex:/^[a-zA-Z0-9._-]+$/',
            'photo' => 'max:255',
        ]);

        return $validator;
    }




}

