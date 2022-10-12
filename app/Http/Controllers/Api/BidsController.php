<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BidModel;
use Exception;
use Illuminate\Http\Request;

class BidsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $bids = BidModel::
            join('users','users.id','bids.user_id')
            ->join('auction_items','auction_items.id','bids.auction_item_id')
            ->join('auctions','auctions.id','auction_items.auction_id')
            ->join('items','items.id','auction_items.item_id')
            ->join('categories','categories.id','items.categories_id')
            ->join('financial_institutions','financial_institutions.id','auctions.financial_institution_id')
            ->get([
                'bids.id AS id_bid',
                'users.id AS id_user',
                'items.id AS id_item',
                'auctions.open',
                'auctions.id AS id_auction',
                'categories.category',
                'users.name',
                'bids.value_bid',
                'financial_institutions.name AS financial'
            ]);
            return response()->json([
                'message' => 'success',
                'data' => $bids
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
        try {
            $bids = BidModel::
            join('users','users.id','bids.user_id')
            ->join('auction_items','auction_items.id','bids.auction_item_id')
            ->join('auctions','auctions.id','auction_items.auction_id')
            ->join('items','items.id','auction_items.item_id')
            ->join('categories','categories.id','items.categories_id')
            ->join('financial_institutions','financial_institutions.id','auctions.financial_institution_id')
            ->where('users.id',$id)
            ->get([
                'bids.id AS id_bid',
                'users.id AS id_user',
                'items.id AS id_item',
                'auctions.open',
                'auctions.id AS id_auction',
                'categories.category',
                'users.name',
                'bids.value_bid',
                'financial_institutions.name AS financial'
            ]);
            return response()->json([
                'message' => 'success',
                'data' => $bids
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
}
