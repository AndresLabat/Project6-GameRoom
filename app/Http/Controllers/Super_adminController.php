<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class Super_adminController extends Controller
{
    public function createGame(Request $request)
    {
        try {

            $user = auth()->user();
            if ($user->role != "super_admin") {
                return response()->json(
                    [
                        "success" => false,
                        "message" => "You are not an super admin"
                    ],
                    Response::HTTP_UNAUTHORIZED
                );
            }

            $validator = Validator::make($request->all(), [
                'name' => 'required|min:3|max:100',
                'category' => 'in:action,RPG,shooter,adventure'
            ]);

            if ($validator->fails()) {
                return response()->json(
                    [
                        "success" => true,
                        "message" => "Error creating a game",
                        "error" => $validator->errors()
                    ],
                    Response::HTTP_BAD_REQUEST
                );
            }

            $newGame = Game::create(
                [
                    "name" => $request->input('name'),
                    "category" => $request->input('category'),
                    "user_id" => $request->input('user_id')
                ]
            );

            return response()->json(
                [
                    "success" => true,
                    "message" => "Game created successfully",
                    "data" => $newGame
                ],
                Response::HTTP_CREATED
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return response()->json(
                [
                    "success" => false,
                    "message" => "Error creating a game"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }


    public function updateGame(Request $request, $id)
    {
        try {

            $user = auth()->user();
            
            if ($user->role != "super_admin") {
                return response()->json(
                    [
                        "success" => false,
                        "message" => "You are not an super admin"
                    ],
                    Response::HTTP_UNAUTHORIZED
                );
            }

            $game = Game::query()->find($id);

            $name = $request->input('name');
            $category = $request->input('category');
            $user_id = $request->input('user_id');

            $validator = Validator::make($request->all(), [
                'name' => 'required|min:3|max:100',
                'category' => 'in:action,RPG,shooter,adventure'
            ]);

            if ($validator->fails()) {
                return response()->json(
                    [
                        "success" => true,
                        "message" => "Error updating a game",
                        "error" => $validator->errors()
                    ],
                    Response::HTTP_BAD_REQUEST
                );
            }

                if ($request->has('name')) {
                    $game->name = $name;
                }
                if ($request->has('category')) {
                    $game->category = $category;
                }
                if ($request->has('user_id')) {
                    $game->user_id = $user_id;
                }

                $game->save();

            return response()->json(
                [
                    "success" => true,
                    "message" => "Game updated successfully",
                    "data" => $game
                ],
                Response::HTTP_CREATED
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return response()->json(
                [
                    "success" => false,
                    "message" => "Error updating a game"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
}