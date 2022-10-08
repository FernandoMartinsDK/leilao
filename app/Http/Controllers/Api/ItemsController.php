<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AuctionItemModel;
use App\Models\VehicleModel;
use Exception;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $items = AuctionItemModel::
            join('stores','sales_central.store_id','=','stores.id');

            return response()->json([
                'message' => 'success',
                'data' => $items
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
     * Retorna itens de leilão disponivel para compra 
    */
    public function open()
    {
        try {
            
            $immobiles = AuctionItemModel::
            join('auctions','auctions.id','auction_items.auction_id')
            ->join('items','auction_items.item_id','items.id')
            ->join('categories','items.categories_id','categories.id')
            ->join('immobiles','items.immobile_id','immobiles.id')
            ->join('immobiles_types','immobiles.immobile_type_id','immobiles_types.id')
            ->where('items.categories_id','1')
            ->where('auctions.open','T')
            ->get([
                'item_id',
                'items.categories_id',
                'categories.category',
                'immobiles_types.type',
                'opening_bid',
                'value_bid',
                'auction_date',
                'auctions.open'
            ]);

            $vehicles = AuctionItemModel::
            join('auctions','auctions.id','auction_items.auction_id')
            ->join('items','auction_items.item_id','items.id')
            ->join('categories','items.categories_id','categories.id')
            ->join('vehicles','items.vehicle_id','vehicles.id')
            ->join('brands','vehicles.brand_id','brands.id')
            ->join('car_models','vehicles.car_model_id','car_models.id')
            ->where('items.categories_id','2')
            ->where('auctions.open','T')
            ->get([
                'item_id',
                'items.categories_id',
                'brand AS category',
                'car_models.model_car AS type',
                'opening_bid',
                'value_bid',
                'auction_date',
                'auctions.open'
            ]);

            return response()->json([
                'message' => 'success',
                'data_immobiles' => $immobiles,
                'data_vehicles' => $vehicles
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
     * Pesquisa um termo entre as colunas
     * Carro => marca | modelo | preço
     * Imovel=> Imovel| preço 
    */
    public function search(string $term)
    {
        $term = strtoupper($term);
        try {
            
            $immobiles = AuctionItemModel::
            join('auctions','auctions.id','auction_items.auction_id')
            ->join('items','auction_items.item_id','items.id')
            ->join('categories','items.categories_id','categories.id')
            ->join('immobiles','items.immobile_id','immobiles.id')
            ->join('immobiles_types','immobiles.immobile_type_id','immobiles_types.id')
            ->where('items.categories_id','1')
            ->where('auctions.open','T')
            ->Where(function($query)use($term) {
                $query->where('immobiles_types.type','LIKE',"%".$term."%")
                      ->orWhere('value_bid', $term);
            })
            ->get([
                'item_id',
                'items.categories_id',
                'categories.category',
                'immobiles_types.type',
                'opening_bid',
                'value_bid',
                'auction_date',
                'auctions.open'
            ]);

            $vehicles = AuctionItemModel::
            join('auctions','auctions.id','auction_items.auction_id')
            ->join('items','auction_items.item_id','items.id')
            ->join('categories','items.categories_id','categories.id')
            ->join('vehicles','items.vehicle_id','vehicles.id')
            ->join('brands','vehicles.brand_id','brands.id')
            ->join('car_models','vehicles.car_model_id','car_models.id')
            ->where('items.categories_id','2')
            ->where('auctions.open','T')
            ->Where(function($query)use($term) {
                $query->where('brands.brand','LIKE',"%".$term."%")
                    ->orWhere('car_models.model_car','LIKE',"%".$term."%")
                    ->orWhere('value_bid', $term);
            })
            ->get([
                'item_id',
                'items.categories_id',
                'brand AS category',
                'car_models.model_car AS type',
                'opening_bid',
                'value_bid',
                'auction_date',
                'auctions.open'
            ]);

            return response()->json([
                'message' => 'success',
                'data_immobiles' => $immobiles,
                'data_vehicles' => $vehicles
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
