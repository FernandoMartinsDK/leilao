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

    public function teste()
    {

        //$response = Http::acceptJson()->post('http://127.0.0.1:8000/api/test');
        $term = 3;
        $request= Request::create('http://localhost:8000/api/items/search/'.$term, 'GET');
        
        $response = Route::dispatch($request);
        $body = $response->getContent();  
        $values = json_decode($body);
        dd($values,$response,$body);

        return view('welcome',compact(['values']));
    }

    public function update()
    {
        //dd('HOME INDEX',Auth::user());
        return view('home.update');
    }

    public function show()
    {
        //dd('HOME INDEX',Auth::user());
        return view('home.show');
    }

}
