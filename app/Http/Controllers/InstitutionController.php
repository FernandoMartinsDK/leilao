<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class InstitutionController extends Controller
{
    /**
     *  Retorna as instituições financeiras cadastradas
     */
    public function index()
    {
        $request= Request::create(env('APP_API').'financial_institutions/', 'GET');
        //$request->headers->set('Authorization','Bearer '.session()->get('token_api'));
        $response = Route::dispatch($request);
        $body = $response->getContent();  
        $value= json_decode($body);
        return view('auction.institutions',compact('value'));
    }
}
