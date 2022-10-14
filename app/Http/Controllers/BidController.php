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
            $request= Request::create(env('APP_API').'api/bids/', 'GET');
            $request->headers->set('Authorization','Bearer '.session()->get('token_api'));
            $response = Route::dispatch($request);
            $body = $response->getContent();  
            $value= json_decode($body);
        }else{
            $request= Request::create(env('APP_API').'ids/'.$id,'GET');
            $request->headers->set('Authorization','Bearer '.session()->get('token_api'));
            $response = Route::dispatch($request);
            $body = $response->getContent();  
            $value= json_decode($body);
        }
        return view('bids.historic',compact(['value']));
    }
    
    /**
     * Mostra historico de lances de um item
     */
    public function show($id)
    {
        $request= Request::create(env('APP_API').'items/show/'.$id, 'GET');
        $request->headers->set('Authorization','Bearer '.session()->get('token_api'));
        $response = Route::dispatch($request);
        $body = $response->getContent();  
        $value= json_decode($body);
        
dd($value);
        return view('bids.show',compact(['value']));
    }

}
