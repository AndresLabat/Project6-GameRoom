<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class GameController extends Controller
{
    public function getAllGames(Request $request)
    {
        try {
            $games = Game::query()->get();

            if($games->isEmpty()){
                return response()->json(
                    [
                        "success" => true,
                        "message" => "There are not any game", 
                    ],
                    Response::HTTP_OK
                ); 
            }

            return response()->json(
                [
                    "success" => true,
                    "message" => "User",
                    "data" => $games
                ],
                Response::HTTP_OK
            );

        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return response()->json(
                [
                    "success" => false,
                    "message" => "Error updating profile user"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
}
