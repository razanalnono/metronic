<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;



class AccessTokenController extends Controller
{
    /**
     * @OA\Info(
     *     description=" API Documentation",
     *     version="1.0.0",
     *     title="API swagger documentation",
     *     termsOfService="http://swagger.io/terms/",
     *     @OA\License(
     *         name="Apache 2.0",
     *         url="http://www.apache.org/licenses/LICENSE-2.0.html"
     *     )
     * )
     *
     * @OA\SecurityScheme(
     *     type="http",
     *     in="header",
     *     securityScheme="api_key",
     *     scheme="bearer"
     * )
     */
public function store(Request $request){
    
    $request->validate([
        'email' =>'required|email',
        'device_name'=>'string|max:value255' 
    ]);


    $user=User::where('email' ,$request->email)->first();
    if($user && Hash::check($request->password,$user->password)){
        $device_name=$request->post('device_name',$request->userAgent());
        $token = $user->createToken($device_name);
    }
    return response()->json([
        'message'=>'success',
        'token'=>$token->plainTextToken,
    ]);
}



    public function destroy($token = null)
    {
        $user = Auth::guard('sanctum')->user();

        if (null === $token) {
            $user->currentAccessToken()->delete();
            return;
        }

        $personalAccessToken = PersonalAccessToken::findToken($token);
        if (
            $user->id == $personalAccessToken->tokenable_id
            && get_class($user) == $personalAccessToken->tokenable_type
        ) {
            $personalAccessToken->delete();
        }
        
    }

}