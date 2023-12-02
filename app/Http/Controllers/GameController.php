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
                    "message" => "Games obtained succesfully",
                    "data" => $games
                ],
                Response::HTTP_OK
            );

        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return response()->json(
                [
                    "success" => false,
                    "message" => "Error obtaining the games"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    public function getGameById(Request $request,$id)
    {
        try {
            $game = Game::query()->find($id);

            if(!$game){
                return response()->json(
                    [
                        "success" => true,
                        "message" => "Game doesn't exist", 
                    ],
                    Response::HTTP_OK
                ); 
            }

            return response()->json(
                [
                    "success" => true,
                    "message" => "Game obtained succesfully",
                    "data" => $game
                ],
                Response::HTTP_OK
            );

        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return response()->json(
                [
                    "success" => false,
                    "message" => "Error obtaining the game"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
}
