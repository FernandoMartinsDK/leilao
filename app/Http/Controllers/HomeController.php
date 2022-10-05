<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

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
        //dd('HOME INDEX',Auth::user());
        return view('home.start');
    }

    public function teste()
    {
        //$response = Http::acceptJson()->post('http://127.0.0.1:8000/api/test');

        $response= Request::create('http://localhost:8000/api/test', 'POST');
        $response = Route::dispatch($response);

        return $response;
    }
}
