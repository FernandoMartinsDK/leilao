<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class BidController extends Controller
{

    /**
     * Retorna historico de lances de um determinado usuario
     *  session()->all()
     */
    public function index($id)
    {
        if (session()->get('profile_id') == '2') {
            $request= Request::create(env('APP_API').'bids/', 'GET');
            $request->headers->set('Authorization','Bearer '.session()->get('token_api'));
            $response = Route::dispatch($request);
            $body = $response->getContent();  
            $value= json_decode($body);
        }else{
            if ( $id == Session::get('id')) {
                $request= Request::create(env('APP_API').'bids/'.$id,'GET');
                $request->headers->set('Authorization','Bearer '.session()->get('token_api'));
                $response = Route::dispatch($request);
                $body = $response->getContent();  
                $value= json_decode($body);
            }else{
                abort( response('Unauthorized', 401) );
            }
        }
        return view('bids.historic',compact(['value']));
    }
    
    /**
     * Mostra historico de lances de um item
     */
    public function show($id)
    {
        // descobre o tipo do item
        $request= Request::create(env('APP_API').'categories/item/'.$id, 'GET');
        $response = Route::dispatch($request);
        $body = $response->getContent();  
        $value= json_decode($body);
        $idCat=$value->data->categories_id;
        if ($value->data->categories_id == '2') {
            $category = 'VEÍCULOS';
            $request= Request::create(env('APP_API').'items/vehicle/auction/'.$id, 'GET');
            $response = Route::dispatch($request);
            $body = $response->getContent();  
            $info = json_decode($body);
        }else{
            $category = 'IMÓVEIS';
            $request= Request::create(env('APP_API').'items/immobile/auction/'.$id, 'GET');
            $response = Route::dispatch($request);
            $body = $response->getContent();  
            $info = json_decode($body);
        }

        $request= Request::create(env('APP_API').'items/historic/'.$id, 'GET');
        $response = Route::dispatch($request);
        $body = $response->getContent();  
        $historic= json_decode($body);

        //dd($historic->data[0],$category,$info);
        return view('bids.show',compact(['historic','category','info','idCat']));
    }

}
