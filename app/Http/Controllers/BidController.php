<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class BidController extends Controller
{

    /**
     * Retorna historico de lances de um determinado usuario
     *  session()->all()
     */
    public function index($id)
    {
        if (session()->get('profile_id') == '2') {
            $request= Request::create('http://localhost:8000/api/bids/', 'GET');
            $request->headers->set('Authorization','Bearer '.session()->get('token_api'));
            $response = Route::dispatch($request);
            $body = $response->getContent();  
            $value= json_decode($body);
        }else{
            $request= Request::create('http://localhost:8000/api/bids/'.$id,'GET');
            $request->headers->set('Authorization','Bearer '.session()->get('token_api'));
            $response = Route::dispatch($request);
            $body = $response->getContent();  
            $value= json_decode($body);
        }
        return view('bids.historic',compact(['value']));
    }

}
