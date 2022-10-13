<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class AuctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('is_admin');

        // Busca todos os leilões
        $request= Request::create('http://localhost:8000/api/auctions/resume', 'GET');
        $response = Route::dispatch($request);
        $body = $response->getContent();  
        $value = json_decode($body);
        return view('auction.index',compact(['value']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('is_admin');

        // Busca as categorias no banco de dados
        $request= Request::create('http://localhost:8000/api/categories', 'GET');
        $response = Route::dispatch($request);
        $body = $response->getContent();  
        $categories = json_decode($body);

        // Busca as os locais no banco de dados 
        $request= Request::create('http://localhost:8000/api/place', 'GET');
        $response = Route::dispatch($request);
        $body = $response->getContent();  
        $places = json_decode($body);

        // Busca as os locais no banco de dados 
        $request= Request::create('http://localhost:8000/api/financial_institutions', 'GET');
        $response = Route::dispatch($request);
        $body = $response->getContent();  
        $institutions = json_decode($body);
        return view('auction.create',compact(['categories','places','institutions']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('is_admin');

        // Busca informações sobre leilão para definir as configurações
        $request= Request::create('http://localhost:8000/api/auctions/'.$id, 'GET');
        $response = Route::dispatch($request);
        $body = $response->getContent();  
        $base = json_decode($body);

        // Busca as categorias no banco de dados
        $request= Request::create('http://localhost:8000/api/categories', 'GET');
        $response = Route::dispatch($request);
        $body = $response->getContent();  
        $categories = json_decode($body);

        // Busca as os locais no banco de dados 
        $request= Request::create('http://localhost:8000/api/place', 'GET');
        $response = Route::dispatch($request);
        $body = $response->getContent();  
        $places = json_decode($body);

        // Busca as os locais no banco de dados 
        $request= Request::create('http://localhost:8000/api/financial_institutions', 'GET');
        $response = Route::dispatch($request);
        $body = $response->getContent();  
        $institutions = json_decode($body);

        return view('auction.edit',compact(['categories','places','institutions','base']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
