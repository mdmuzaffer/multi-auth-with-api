<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JWTAuth;
use App\Models\User;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;


class ApiController extends Controller
{
    

    public function register(Request $request)
    {

        $data = $request->only('name', 'email', 'password');
        $validator = Validator::make($data, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|max:50'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is valid, create new user
        $user = User::create([
         'name' => $request->name,
         'email' => $request->email,
         'password' => bcrypt($request->password),
         'role'=> '4'
        ]);

        //User created, return success response
        return response()->json([
            'success' => true,
            'message' => 'User created successfully',
            'data' => $user
        ]);
    }




    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        //valid credential
        $validator = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required|string|min:6|max:50'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is validated
        //Crean token
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json([
                 'success' => false,
                 'message' => 'Login credentials are invalid.',
                ], 400);
            }
        } catch (JWTException $e) {
     return $credentials;
            return response()->json([
                 'success' => false,
                 'message' => 'Could not create token.',
                ], 500);
        }
  
   //Token created, return with success response and jwt token
        return response()->json([
            'success' => true,
            'token' => $token,
        ]);
    }


    public function getUser(Request $request)
    {
        $token = $request->bearerToken();
        $user = JWTAuth::authenticate($token); 
        return response()->json(['user' => $user]);
    }



    public function logout(Request $request)
    {
       
        try {

            $token = $request->bearerToken();
            JWTAuth::invalidate($token);

            return response()->json([
                'status_code' => 200,
                'message' => 'User has been logged out',
                'data' =>[],
            ],200);
        } catch (JWTException $exception) {
            return response()->json([
                'status_code' => 500,
                'message' => 'Sorry, user cannot be logged out',
                'data' => []
            ], 500);
        }
    }



}
