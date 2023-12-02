<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function updateProfile(Request $request)
    {

        try {
            $token = auth()->user();
            $user = User::query()->find($token->id);

            $name = $request->input('name');
            $nickname = $request->input('nickname');
            $email = $request->input('email');
            $password = $request->input('password');
            $photo = $request->input('photo');

            if ($request->has('name')) {
                $user->name = $name;
            }

            if ($request->has('nickname')) {
                $user->nickname = $nickname;
            }

            if ($request->has('email')) {
                $user->email = $email;
            }

            if ($request->has('password')) {
                $user->password = bcrypt($password);
            }

            if ($request->has('photo')) {
                $user->photo = $photo;
            }

            $user->save();

            return response()->json(
                [
                    "success" => true,
                    "message" => "User updated",
                    "data" => $user
                ],
                Response::HTTP_CREATED
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

    public function deleteUser()
    {
        try {
            
            $token = auth()->user();
            User::destroy($token->id);

            return response()->json(
                [
                    "success" => true,
                    "message" => "User deleted",
                ],
                Response::HTTP_OK
            );

        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return response()->json(
                [
                    "success" => false,
                    "message" => "Error deleting user"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
}
