<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AuctionModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $auction = AuctionModel::all();
            return response()->json([
                'message' => 'success',
                'data' => $auction
            ],200);     
        } catch (Exception $error) {
            return response()->json([
                'message' => get_class($error),
                'errors' => $error->getMessage(),
                'data' => null
            ],400);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'auction_date' => 'required',
            'financial_institution_id' => 'required',
            'place_id' => 'required'
        ]);

        $dtEvent = $request->auction_date.' '.$request->hour.':00';

        try {
            $auction = AuctionModel::create([
                'auction_date' => $dtEvent,
                'financial_institution_id' => $request->financial_institution_id,
                'place_id' => $request->place_id,
                'categorie_id' => $request->categorie_id,
                'open' => 'T',
                'note' => $request->note
            ]);
            return response()->json([
                'message' => 'success',
                'data' => $auction
            ],200);     
        } catch (Exception $error) {
            return response()->json([
                'message' => get_class($error),
                'errors' => $error->getMessage(),
                'data' => null
            ],400);
        }

        //se a data for a de hoje o leilão é aberto

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $auction = AuctionModel::findOrfail($id);
            return response()->json([
                'message' => 'success',
                'data' => $auction
            ],200);     
        } catch (Exception $error) {
            return response()->json([
                'message' => get_class($error),
                'errors' => $error->getMessage(),
                'data' => null
            ],400);
        }
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
        try {
            $request->validate([
                'auction_date' => 'required',
                'financial_institution_id' => 'required',
                'place_id' => 'required'
            ]);
    
            $auction = AuctionModel::findOrfail($id);
            $auction->update($request->all());
            return response()->json([
                'message' => 'success',
                'data' => $auction
            ],200);     
        } catch (Exception $error) {
            return response()->json([
                'message' => get_class($error),
                'errors' => $error->getMessage(),
                'data' => null
            ],400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $auction = AuctionModel::destroy($id);
            return response()->json([
                'message' => 'success',
                'data' => $auction
            ],200);
        } catch (Exception $error) {
            return response()->json([
                'message' => get_class($error),
                'errors' => $error->getMessage(),
                'data' => null
            ],400);
        }
    }

    /**
     * Retorna um resumo de todos os leilões
     */
    public function resume()
    {
        try {
            $result = DB::select("SELECT 
            auctions.id AS lote,
            auctions.auction_date,
            auctions.open,
            categories.category,
            places.name AS place,
            (SELECT count(auction_items.id) FROM auction_items where auction_items.auction_id = auctions.id ) AS qt
            FROM auctions
            INNER JOIN categories ON categories.id = auctions.categorie_id 
            INNER JOIN places ON places.id = auctions.place_id
            ORDER BY auctions.id");
      
            return response()->json([
                'message' => 'success',
                'data' => $result
            ],200);
        } catch (Exception $error) {
            return response()->json([
                'message' => get_class($error),
                'errors' => $error->getMessage(),
                'data' => null
            ],400);
        }
    }
}
