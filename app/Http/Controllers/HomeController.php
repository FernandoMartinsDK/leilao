<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        
        if (!Auth::check()) {
            \App\Services\MessageService::addFlash('warning','Sessão expirada!');
            return redirect()->route('login');
        }
        
       
        return view('home.start');
    }

    public function update()
    {

        return view('home.update');
    }

    public function show()
    {

        return view('home.show');
    }

}
