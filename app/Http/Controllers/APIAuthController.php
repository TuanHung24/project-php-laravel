<?php

namespace App\Http\Controllers;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Contracts\Providers\Auth as ProvidersAuth;

class APIAuthController extends Controller
{
    public function dangNhap(Request $request)
    { 
        $credentials= $request->only(['email','password']);
       
        if(!$token=auth('api')->attempt($credentials)){
            return response()->json(['error'=>"Đăng nhập không thành công"],401);
        }
        
        return $this->respondWithToken($token);
    }

    public function logout()
    { 
        auth('api')->logout();
        return response()->json(['message' => 'Đăng xuất thành công!']);
    }
    public function me() 
    {
        
        return response()->json([auth('api')->user()]);
    }

    protected function respondWithToken($token)
    {
       
        return response()->json([
            'access_token'=>$token,
            'token_type'=>'bearer',
            'expires_in'=>JWTAuth::factory()->getTTL()*60,
        ]);
    }
    
    
}
