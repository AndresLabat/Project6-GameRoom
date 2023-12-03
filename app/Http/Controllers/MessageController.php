<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Room;
use App\Models\Room_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class MessageController extends Controller
{
    public function roomChat(Request $request)
    {
        try {
            
            $user = auth()->user();
            $room_id = $request->input('room_id');
            $user_room = Room_user::query()->where('user_id', $user->id)->where('room_id', $room_id)->first();

            if (!$user_room) {
                return response()->json(
                    [
                        "success" => true,
                        "message" => "You are not a member of this chat"
                    ],
                    Response::HTTP_OK
                );
            }

            $roomChat = Message::query()->where('room_id', $room_id)->get();

            if ($roomChat->isEmpty()) {
                return response()->json(
                    [
                        "success" => true,
                        "message" => "This chat is void"
                    ],
                    Response::HTTP_OK
                );
            }

            return response()->json(
                [
                    "success" => true,
                    "message" => "Room chat obtained succesfully",
                    // "data" =>  $user_room
                ],
                Response::HTTP_OK
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return response()->json(
                [
                    "success" => false,
                    "message" => "Error obtaining a chat room"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    public function createMessage(Request $request)
    {
        try {
            $user = auth()->user();
            $room_id = $request->input('room_id');
            $user_room = Room_user::query()->where('user_id', $user->id)->where('room_id', $room_id)->first();

            if (!$user_room) {
                return response()->json(
                    [
                        "success" => true,
                        "message" => "You are not a member of this chat"
                    ],
                    Response::HTTP_OK
                );
            }

            $message = Message::query()->create([
                'user_id' => $user->id,
                'room_id' => $room_id,
                'message' => $request->input('message')
            ]);

            return response()->json(
                [
                    "success" => true,
                    "message" => "Message created succesfully",
                    "data" => $message
                ],
                Response::HTTP_OK
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return response()->json(
                [
                    "success" => false,
                    "message" => "Error obtaining a chat room"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }


}