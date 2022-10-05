<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class AuthenticateController extends Controller
{

    public function authenticate(Request $request)
    {   
        $response= Request::create('http://localhost:8000/api/login', 'POST',$request->all());
        $vl = Route::dispatch($response);
        dd($vl);
        return 'a';
    }

}
