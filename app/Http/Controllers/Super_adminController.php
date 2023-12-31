<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Room;
use App\Models\User;
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
                    "user_id" => $user->id
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

    public function deleteGame(Request $request, $id)
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

            if ($game) {

                Game::destroy($id);

                return response()->json(
                    [
                        "success" => true,
                        "message" => "Game deleted successfully"
                    ],
                    Response::HTTP_OK
                );
            }

            return response()->json(
                [
                    "success" => true,
                    "message" => "Game not exist"
                ],
                Response::HTTP_OK
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

    public function getAllRooms(Request $request)
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

            $rooms = Room::query()->get();

            if($rooms->isEmpty()){
                return response()->json(
                    [
                        "success" => true,
                        "message" => "There are not any room", 
                    ],
                    Response::HTTP_OK
                ); 
            }

            return response()->json(
                [
                    "success" => true,
                    "message" => "Rooms obtained succesfully",
                    "data" => $rooms
                ],
                Response::HTTP_OK
            );

        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return response()->json(
                [
                    "success" => false,
                    "message" => "Error obtaining rooms",
                    "data" => $rooms
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
    
    public function getAllUsers(Request $request)
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

            $users = User::query()->get();

            if($users->isEmpty()){
                return response()->json(
                    [
                        "success" => true,
                        "message" => "There are not any user", 
                    ],
                    Response::HTTP_OK
                ); 
            }

            return response()->json(
                [
                    "success" => true,
                    "message" => "Users obtained succesfully",
                    "data" => $users
                ],
                Response::HTTP_OK
            );

        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return response()->json(
                [
                    "success" => false,
                    "message" => "Error obtaining users",
                    "data" => $users
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
}