<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController;
use App\Http\Resources\PrivateUserResource;
use App\Models\User;

class UserController extends BaseController
{
    public function getUser(Request $request)
    {
        return $this->sendResponse(new PrivateUserResource($request->user()), 'Success info');
    }

    public function logout(){
        dd('adasd');
        dd(Auth::check());
        if (Auth::check()) {
            Auth::user()->token()->revoke();
            return response()->json(['success' =>'Successfully logged out of application'],200);
        }else{
            return response()->json(['error' =>'api.something_went_wrong'], 500);
        }
    }

    // public function logout() {
    //     $user = request()->user();
    //     if($user){
    //         foreach ($user->tokens as $token) {
    //             $token->revoke();
    //         }
    //         return $this->sendResponse(['message' => 'Successfully logged out'], 'Successfully logged out');
    //     }else{
    //         return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
    //     }
    // }
}
