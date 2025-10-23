<?php

namespace App\Http\Controllers\Auth;
use App\Models\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
interface AuthApi {
    public function RegisterUser(RegisterRequest $request, Users $users) : JsonResponse;
    public function LoginUser(LoginRequest $request, Users $users) : JsonResponse; 
}
class AuthController extends Controller implements AuthApi
{
    public function RegisterUser(RegisterRequest $request, Users $users) : JsonResponse {
        $validated = $request->validated();
        try {
             $user = Users::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

         $token = $user->createToken('api-token')->plainTextToken;
                return response()->json(
                [
                    'status' => true,
                    'message' => 'Anda Berhasil Membuat Account',
                    'data'=> $user,
                    'token' => $token
                ],201
            );
        } catch (\Throwable $th) {
           return response()->json(
            [
                'status' => false,
                'error' => $th->getMessage()
            ], 500);
        }   
    }
      public function LoginUser(LoginRequest $request, Users $users) : JsonResponse {
        $validated = $request->validated();
        $user = Users::where('email', $validated['email'])->first();
        if (!Hash::check($validated['password'], $user->password)) {
            return response()->json(
            [
                'status' => false,
                'error' => 'Password atau Email Anda Salah'
            ], 401);
        }
    
        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json(
            [   
                'status' => true,
                'message' => 'Anda Berhasil Login',
                'data'=> $user,
                'token' => $token
            ],200
        );
      }

      public function LogoutUser(Request $request)  {
        $request->user()->currentAccessToken()->delete();
        return response()->json(
            [
                "status" => true,
                "message" => "Anda Berhasil Logout",                
            ],200
        );        
      }
}
