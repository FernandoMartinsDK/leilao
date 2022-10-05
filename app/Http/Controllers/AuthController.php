<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     *  Registra um novo usuário e retorna um token de acesso válido
     *  @param  request  $request  
    */
    public function register(Request $request)
    {
        $request ->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'view_name' => 'required|string',
            'cpf' => 'required',
            'active' => 'required',
            'is_admin' => 'required',
            'date_birth' => 'required',
            'telephone' => 'required',
            'password' => 'required|string'
        ]);

        $user = User::create([
            'name' => $request->name,
            'type_person_id' => $request->type_person_id,
            'email' => $request->email,
            'view_name' => $request->view_name,
            'cpf' => $request->cpf,
            'active' => $request->active,
            'is_admin' => $request->is_admin,
            'cpf' =>$request->cpf,
            'cnpj' =>$request->cnpj,
            'date_birth' => $request->date_birth,
            'telephone' => $request->telephone,
            'password' => bcrypt($request->password)
        ]);

        $token = $user->createToken('primeiroToken')->plainTextToken;

        $response = [
            'user'=>$user,
            'token'=>$token
        ];
        return response($response,201);
    }

    /**
     * Realiza o login do usuario
     * @param  request  $request  
    */
    public function login(Request $request){
        $request ->validate([
            'email' => 'required|string',
            'password' => 'required|string|confirmed'
        ]);

        // Verifica email do usuário
        $user = User::where('email',$request->email)->first();

        // Valida usuario e senha
        if (!$user || !Hash::check($request->password,$user->password)) {
            return response([
                'message' => 'Credenciais invalidas'
            ],401);
        }

        $token = $user->createToken('primeiroToken')->plainTextToken;
        $response = [
            'user'=>$user,
            'token'=>$token
        ];
        return response($response,201);
    }

    /**
     * Realiza o logout do usuario
     * @param  request  $request  
    */
    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message'=>'Logout efetuado com sucesso'
        ];
    }

}
