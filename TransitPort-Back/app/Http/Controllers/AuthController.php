<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Laravel\Passport\Passport;

class AuthController extends Controller {
    public $successStatus = 200;
    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
{
    try {
        // Intentar autenticar al usuario
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->accessToken;
            return response()->json(['success' => $success, 'user'=> $user], 200); // Código de éxito 200
        } else {
            return response()->json(['error' => 'Unauthorized'], 401); // Error de credenciales
        }
    } catch (\Exception $e) {
        // Capturar cualquier error no anticipado
        return response()->json(['error' => 'Server Error', 'message' => $e->getMessage()], 500);
    }
}
    public function logout(Request $request)
    {

        $isUser = $request->user()->token()->revoke();
        if($isUser){
            $success['message'] = "Successfully logged out.";
            return response()->json(['success' => $isUser], $this->successStatus);
        }
        else{
            return response()->json(['error' => 'Unauthorised'], 401);
        }

        return view('login');

    }

    public function volver(){

        return redirect()->route('operador/logout');

    }
}
