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
     *
     *   * @OA\Tag(
     *     name="Auth",
     *     description="Auth request",
     * )
     *
     * @OA\Post(
     *      path="/api/auth/login",
     *      operationId="resend verify code",
     *      tags={"Auth"},
     *      summary="login",
     *      description="login",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                  schema="login",
     *                required={"email","password"},
     *          @OA\Property(
     *                     property="email",
     *                     description="email",
     *                     type="string",
     *),
      *        @OA\Property(
     *                     property="password",
     *                     description="password",
     *                     type="string",
     *))
     *         )
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="success"
     *     )
     * )
     **/
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
            'token'=>$token,
        ]);
    }



    /**
     * @OA\Delete(
     *      path="/api/tokens/{token?}",
     *      operationId="revoke token",
     *      tags={"Auth"},
     *      summary="Revoke token",
     *      description="Revoke the current user's access token or a specific token by providing its token value.",
     *      @OA\Parameter(
     *          name="token",
     *          description="The token value to be revoked. If not provided, the current user's access token will be revoked.",
     *          in="path",
     *          required=false,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Token revoked successfully."
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Token not found.",
     *      ),
     *      security={
     *          {"sanctum": {}}
     *      }
     * )
     */
    public function destroy($token = null)
    {
        $user = Auth::guard('sanctum')->user();

        if (null === $token) {
            $user->currentAccessToken()->delete();
            return response(null, 204);
        }

        $personalAccessToken = PersonalAccessToken::findToken($token);
        if (
            $user->id == $personalAccessToken->tokenable_id
            && get_class($user) == $personalAccessToken->tokenable_type
        ) {
            $personalAccessToken->delete();
            return response(null, 204);
        }

        return response(null, 404);
    }


}