<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $request= Request::create('http://localhost:8000/api/items/open', 'GET');
        $request->headers->set('Authorization','Bearer '.session()->get('token_api'));
        $response = Route::dispatch($request);
        $body = $response->getContent();  
        $response= json_decode($body);

        $immobiles = $response->data_immobiles;
        $vehicles = $response->data_vehicles;

        //$immobiles,$vehicles);
        $data = array_merge($immobiles,$vehicles);
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auction.items.create');
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
    public function show($id,$cate)
    {   
        //dd($id,$cate);
        if ($cate == '2') {
            $request= Request::create('http://localhost:8000/api/items/vehicle/auction/'.$id, 'GET');
        }else{
            $request= Request::create('http://localhost:8000/api/items/immobile/auction/'.$id, 'GET');
        }
        
        $request->headers->set('Authorization','Bearer '.session()->get('token_api'));
        $response = Route::dispatch($request);
        $body = $response->getContent();  
        $value= json_decode($body);
        return view('home.show',compact(['value']));
    }

    public function route_item()
    {
        return view('home.show');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

    /**
     * Procura por um termo 
     */
    public function search(Request $request)
    {

        $term = $request->term;
        $request= Request::create('http://localhost:8000/api/items/search/'.$term, 'GET');
        
        $response = Route::dispatch($request);
        $body = $response->getContent();  
        $values = json_decode($body);

        $immobiles = $values->data_immobiles;
        $vehicles = $values->data_vehicles;

        $data = array_merge($immobiles,$vehicles);
        return $data;
        
    }

    /**
     * valida o lance
    */
    public function lance(Request $request)
    {
        $request= Request::create('http://localhost:8000/api/items/search/'.$term, 'GET');
        
        $response = Route::dispatch($request);
        $body = $response->getContent();  
        $values = json_decode($body);

        return $request->valor.'-'.$request->item_id;
    }

}
