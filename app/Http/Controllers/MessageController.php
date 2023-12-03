<?php

namespace App\Http\Controllers;

use App\Models\Message; 
use App\Models\Room_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; 
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
                    "data" =>  $roomChat
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

    public function deleteMessage(Request $request)
    {
        try {
            $user = auth()->user();
            $room_id = $request->input('room_id');
            $message = $request->input('message');

            $user_room = Message::query()->where('user_id', $user->id)->where('room_id', $room_id)->where('message', $message)->first();

            if (!$user_room) {
                return response()->json(
                    [
                        "success" => true,
                        "message" => "This message does not exist"
                    ],
                    Response::HTTP_OK
                );
            }

            Message::destroy($user_room->id);

            return response()->json(
                [
                    "success" => true,
                    "message" => "Message deleted succesfully",
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

    public function updatedMessage(Request $request)
    {
        try {
            $user = auth()->user();
            $room_id = $request->input('room_id');
            $message = $request->input('message');
            $newMessage = $request->input('newMessage');

            $text = Message::query()->where('user_id', $user->id)->where('room_id', $room_id)->where('message', $message)->first();

            if (!$text) {
                return response()->json(
                    [
                        "success" => true,
                        "message" => "This message does not exist"
                    ],
                    Response::HTTP_OK
                );
            } 

            if ($request->has('message')) {
                $text->message = $newMessage;
            }

            $text->save();

            return response()->json(
                [
                    "success" => true,
                    "message" => "Message updated succesfully",
                    "data" => $text
                ],
                Response::HTTP_OK
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return response()->json(
                [
                    "success" => false,
                    "message" => "Error updating a message"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
}
