<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Route,Auth,Session};

class AuthenticateController extends Controller
{

    /**
     * Realiza autenticação do usuario
     */
    public function authenticate(Request $request)
    {   
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Verifica se o usuario não esta desativado
        $usr = User::where('email',$credentials['email'])
            ->get([
                'active',
                'id',
                'name',
                'view_name',
                'type_person_id'
            ])
        ->toArray();

        if(!empty($usr)) {
            if ($usr[0]['active'] == 'F') {
                \App\Services\MessageService::addFlash('danger','Usuário desativado');
                return redirect()->back();
            }
        }

        // Verifica as credenciais do usuário
        if (Auth::attempt($credentials,true)) {
            Session::put([
                'id'=>$usr[0]['id'],
                'view_name'=>$usr[0]['view_name'],
                'name'=>$usr[0]['name'],
                'access'=>$usr[0]['type_person_id']
            ]);

            // Autentica na api
            $request= Request::create('http://localhost:8000/api/login', 'POST',[
                'email'=>$request->email,
                'password'=>$request->password,
            ]);
            $response = Route::dispatch($request);
            $body = $response->getContent();  
            $values = json_decode($body);

            //salva o token
            Session::put([
                'token_api'=>$values->token
            ]);
            //$request->session()->regenerate();
            return redirect()->route('home.');
        }else{
            \App\Services\MessageService::addFlash('danger','Senha ou usuario inválido');
            return redirect()->back();
        }
    }

    public function login()
    {
        //dd(Auth::check(),Auth::guest());
        if (Auth::check()) {
            return redirect()->route('home.');
        }
        return view('login');
    }

     /**
     * Faz o logout do usuario 
    */
    public function logout()
    {
        auth()->user()->tokens()->delete();
        Auth::logout();
        Session::flush();

        \App\Services\MessageService::addFlash('success','Sessão Finalizada');

        return redirect()->route('login');
    }

    /**
     * Carrega tela de cadastro de usuario 
     */
    public function create()
    {
        return view('register');
    }

}
