<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;


class RoomController extends Controller
{
    public function getRoomById(Request $request, $id)
    {
        try {
            $room = Room::query()->find($id);

            if (!$room) {
                return response()->json(
                    [
                        "success" => true,
                        "message" => "Room doesn't exist",
                    ],
                    Response::HTTP_OK
                );
            }

            return response()->json(
                [
                    "success" => true,
                    "message" => "Room obtained succesfully",
                    "data" => $room
                ],
                Response::HTTP_OK
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return response()->json(
                [
                    "success" => false,
                    "message" => "Error obtaining a room"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    public function createRoom(Request $request)
    {
        try {
            // $validator = Validator::make($request->all(), [
            //     'name' => 'required|min:3|max:100',
            //     'game_id' => 'required|exists:games,id'
            // ]);

            // if ($validator->fails()) {
            //     return response()->json(
            //         [
            //             "success" => true,
            //             "message" => "Error creating a room",
            //             "error" => $validator->errors()
            //         ],
            //         Response::HTTP_BAD_REQUEST
            //     );
            // }

            $newRoom = Room::create(
                [
                    "name" => $request->input('name'), 
                    "game_id" => $request->input('game_id')
                ]
            );

            $user = auth()->user();
            $newRoom->room_userManyToMany()->attach($user->id);

            return response()->json(
                [
                    "success" => true,
                    "message" => "Room created successfully",
                    "data" => $newRoom
                ],
                Response::HTTP_CREATED
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return response()->json(
                [
                    "success" => false,
                    "message" => "Error creating a room"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    public function updateRoom(Request $request,$id )
    {
        try {
            $room = Room::query()->find($id);

            if (!$room) {
                return response()->json(
                    [
                        "success" => true,
                        "message" => "Room doesnt exists"
                    ],
                    Response::HTTP_BAD_REQUEST
                );
            };

            $name = $request->input('name');
            $game_id = $request->input('game_id');

            if ($request->has('name')) {
                $room->name = $name;
            }
            if ($request->has('game_id')) {
                $room->game_id = $game_id;
            }

            $room-> save();

            return response()->json(
                [
                    "success" => true,
                    "message" => "Room updated",
                    "data"=> $room
                ],
                Response::HTTP_OK
            );
            
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return response()->json(
                [
                    "success" => false,
                    "message" => "Error obtaining a room"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    public function deleteRoom(Request $request, $id)
    {
        try {
            $deleteRoom = Room::destroy($id);

            return response()->json(
                [
                    "success" => true,
                    "message" => "Room deleted",
                    "data" => $deleteRoom
                ],
                Response::HTTP_OK
            );
        } catch (\Throwable $th) {
            // Log::error($th->getMessage());

            return response()->json(
                [
                    "success" => false,
                    "message" => "Error obtaining a room"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }

    }

}
