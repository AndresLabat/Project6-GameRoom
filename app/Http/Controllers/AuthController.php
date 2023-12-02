<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {

        try {
          
    
       
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    // TODO
    private function validateDataUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:255',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6|max:12|^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$',
        ]);

        return $validator;
    }
}
