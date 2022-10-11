<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BidController extends Controller
{
    /**
     * Retorna historico de lances de um determinado usuario
     */
    public function show($id)
    {
        return view('bids.historic');
    }
}
