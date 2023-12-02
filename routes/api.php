<?php

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\Super_adminController;
use App\Http\Controllers\Room_userController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/api', function (Request $request) {
    return response()->json(
        [
            "success" => true,
            "message" => "Healthcheck ok"
        ],
        Response::HTTP_OK
    );
});

// USERS
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group([
    'middleware' => ['auth:sanctum']
], function () {
Route::get('/profile', [AuthController::class, 'profile']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::put('/user', [UserController::class, 'updateProfile']);
Route::delete('/user', [UserController::class, 'deleteUser']);
});

// GAMES
Route::get('/games', [GameController::class, 'getAllGames']);
Route::get('/game/{id}', [GameController::class, 'getGameById']);

// ROOMS
Route::group([
    'middleware' => ['auth:sanctum']
], function () {
Route::get('/room/{id}', [RoomController::class, 'getRoomById']);
Route::post('/room', [RoomController::class, 'createRoom']);
Route::put('/room/{id}', [RoomController::class, 'updateRoom']);
Route::delete('/room/{id}', [RoomController::class, 'deleteRoom']);
});

// ROOM_USER
Route::group([
    'middleware' => ['auth:sanctum']
], function () {
Route::get('/members-room', [Room_userController::class, 'getMembersRoom']);
Route::get('/rooms-user', [Room_userController::class, 'getRoomsUser']);
Route::post('/room-user', [Room_userController::class, 'createRoomUser']);
Route::put('/room-user', [Room_userController::class, 'updateRoomUser']);
Route::delete('/room-user', [Room_userController::class, 'deleteRoomUser']);
});

// MESSAGES
Route::group([
    'middleware' => ['auth:sanctum']
], function () {
Route::get('/messages', [MessageController::class, 'roomChat']);
Route::get('/message', [MessageController::class, 'getMessage']);
Route::post('/message', [MessageController::class, 'createMessage']);
Route::put('/message', [MessageController::class, 'updatedMessage']);
Route::delete('/message', [MessageController::class, 'deleteMessage']);
});

// SUPER_ADMIN
Route::group([
    'middleware' => ['auth:sanctum', 'is_super_admin']
], function () {
Route::post('/game', [Super_adminController::class, 'createGame']);
Route::put('/game', [Super_adminController::class, 'updateGame']);
Route::delete('/game', [Super_adminController::class, 'deleteGame']);
Route::get('/rooms', [Super_adminController::class, 'getAllRooms']);
Route::get('/users', [Super_adminController::class, 'getAllUsers']);
});