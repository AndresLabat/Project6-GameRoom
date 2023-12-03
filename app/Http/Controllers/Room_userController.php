<?php

namespace App\Http\Controllers;

use App\Models\Room_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class Room_userController extends Controller
{
    public function getMembersRoom(Request $request, $id)
    {
        try {
            $user = auth()->user();
            $room_user = Room_user::query()->where('room_id', $id)->get();

            if ($room_user->isEmpty()) {
                return response()->json(
                    [
                        "success" => true,
                        "message" => "This room does not have any members."
                    ],
                    Response::HTTP_OK
                );
            }

            $isMember = $room_user->contains('user_id', $user->id);

            if (!$isMember) {
                return response()->json(
                    [
                        "success" => true,
                        "message" => "You aren't a member of this room"
                    ],
                    Response::HTTP_OK
                );
            }

            return response()->json(
                [
                    "success" => true,
                    "message" => "Members obtained succesfully",
                    "data" => $room_user
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

    public function getRoomsUser(Request $request)
    {
        try {
            $user = auth()->user();
            $room_user = Room_user::query()->where('user_id', $user->id)->get();

            if ($room_user->isEmpty()) {
                return response()->json(
                    [
                        "success" => true,
                        "message" => "This user does not have any rooms."
                    ],
                    Response::HTTP_OK
                );
            }

            return response()->json(
                [
                    "success" => true,
                    "message" => "Rooms obtained succesfully",
                    "data" => $room_user
                ],
                Response::HTTP_OK
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return response()->json(
                [
                    "success" => false,
                    "message" => "Error obtaining the rooms"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    public function createRoomUser(Request $request)
    {
        try {
            $user_id = $request->input('user_id');
            $room_id = $request->input('room_id');

            $user = auth()->user();
            $room_user = Room_user::query()->where('room_id', $room_id)->first();

            if (!$room_user) {
                return response()->json(
                    [
                        "success" => true,
                        "message" => "This room does not exist"
                    ],
                    Response::HTTP_OK
                );
            }

            if ($room_user->user_id != $user->id) {
                return response()->json(
                    [
                        "success" => true,
                        "message" => "You aren't an owner of this room"
                    ],
                    Response::HTTP_OK
                );
            }

            $newMember = Room_user::create(
                [
                    "user_id" => $user_id,
                    "room_id" => $room_id
                ]
            );

            return response()->json(
                [
                    "success" => true,
                    "message" => "User member added succesfully",
                    "data" => $newMember
                ],
                Response::HTTP_OK
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return response()->json(
                [
                    "success" => false,
                    "message" => "Error can't adding a new member to the room "
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    public function deleteRoomUser(Request $request)
    {
        try {
            $user_id = $request->input('user_id');
            $room_id = $request->input('room_id');

            $user = auth()->user();
            $room_user = Room_user::query()->where('room_id', $room_id)->first();

            if (!$room_user) {
                return response()->json(
                    [
                        "success" => true,
                        "message" => "This room does not exist"
                    ],
                    Response::HTTP_OK
                );
            }

            if ($room_user->user_id != $user->id) {
                return response()->json(
                    [
                        "success" => true,
                        "message" => "You aren't an owner of this room"
                    ],
                    Response::HTTP_OK
                );
            }
            $user_data = Room_user::query()->where('user_id', $user_id)->where('room_id', $room_id)->first();
            Room_user::destroy($user_data->id);

            return response()->json(
                [
                    "success" => true,
                    "message" => "User member deleted succesfully"
                ],
                Response::HTTP_OK
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return response()->json(
                [
                    "success" => false,
                    "message" => "Error can't deleting a member to the room "
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
}