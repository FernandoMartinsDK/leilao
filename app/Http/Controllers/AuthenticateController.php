<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class AuthenticateController extends Controller
{

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
            $request->session()->regenerate();
            return redirect()->route('home');
        }else{
            \App\Services\MessageService::addFlash('danger','Senha ou usuario inválido');
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {

        /**
         * CHAMAR_API
         */
      
        return view('register');
    }

    public function register(Request $request)
    {
        return view('register');
    }

    public function login()
    {
        //dd(Auth::check(),Auth::guest());
        if (Auth::check()) {
            return redirect()->route('home.');
        }
        return view('login');
    }

}
