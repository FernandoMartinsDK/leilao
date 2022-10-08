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
        
        /**
         * -Busca dados via api
         *  pega os imoveis e imoveis que estão abertos para leilao
        */
        $request= Request::create('http://localhost:8000/api/items/open', 'GET');
        $request->headers->set('Authorization','Bearer '.session()->get('token_api'));
        $response = Route::dispatch($request);
        $body = $response->getContent();  
        $response= json_decode($body);
        /*if ($response->getStatusCode()=='400') {
            abort(400, 'Não é possível processar a solicitação porque ela está malformada ou incorreta.');
        }*/
        dd($response);
        $immobiles = $response->data_immobiles;
        $vehicles = $response->data_vehicles;
        
        return view('home.start',compact(['immobiles','vehicles']));
    }

    public function teste()
    {
        //$response = Http::acceptJson()->post('http://127.0.0.1:8000/api/test');

        $response= Request::create('http://localhost:8000/api/test', 'POST');
        $response = Route::dispatch($response);

        return $response;
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
