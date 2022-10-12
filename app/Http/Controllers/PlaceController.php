<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class PlaceController extends Controller
{
    /**
     * Exibe todos os lugares registrados
     */
    public function index()
    {
        $request= Request::create('http://localhost:8000/api/place/', 'GET');
        //$request->headers->set('Authorization','Bearer '.session()->get('token_api'));
        $response = Route::dispatch($request);
        $body = $response->getContent();  
        $value= json_decode($body);
        return view('bids.place',compact(['value']));
    }

    /**
     * Atualiza registro especifico
     */
    public function update($id)
    {
        if (Session::get('profile_id')=='2') {
            $request= Request::create('http://localhost:8000/api/place/'.$id, 'GET');
            $response = Route::dispatch($request);
            $body = $response->getContent();  
            $value= json_decode($body);
            $new = false;
            return view('bids.placeForm',compact(['new','value']));
        }else{
            abort( response('Unauthorized', 401) );
        }
    }

    public function create()
    {
        if (Session::get('profile_id')=='2') {
            $new = true;
            $value = false;
            return view('bids.placeForm',compact(['new','value']));
        }else{
            abort( response('Unauthorized', 401) );
        }
    }

}
