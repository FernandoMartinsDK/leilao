<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AuctionItemModel;
use App\Models\BidModel;
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
    public function show_auction_item_immobile($id)
    {
        try {
            $data = AuctionItemModel::
            join('auctions','auctions.id','auction_items.auction_id')
            ->join('financial_institutions','auctions.financial_institution_id','financial_institutions.id')
            ->join('places','auctions.place_id','places.id')
            ->join('categories','auctions.categorie_id','categories.id')
            ->join('items','auction_items.item_id','items.id')
            ->join('immobiles','items.immobile_id','immobiles.id')
            ->where('item_id',$id)
            ->get([
                'auction_items.value_bid',
                'auction_items.note AS note_item',
                'auction_items.item_id',
                'auctions.note',
                'financial_institutions.name AS financial_institution',
                'places.name AS place',
                'places.district AS place_district',
                'places.city AS place_city',
                'places.cep AS place_cep',
                'places.country AS place_country',
                'places.complement AS place_complement',
                'category',
                'immobiles.city AS immobiles_city',
                'immobiles.address AS immobiles_address',
                'immobiles.district AS immobiles_district',
                'immobiles.cep AS immobiles_cep',
                'immobiles.judicial_information AS immobiles_judicial_information',
                'immobiles.description AS immobiles_description',
                'immobiles.number AS immobiles_number',
                'immobiles.complement AS immobiles_complement',
                'immobiles.state AS immobiles_state'
            ])
            ->first();

            return response()->json([
                'message' => 'success',
                'data' => $data
            ],200);     
        } catch (Exception $error) {
            return response()->json([
                'message' => get_class($error),
                'errors' => $error->getMessage(),
                'data' => null
            ],400);
        }
    }

    public function show_auction_item_vehicles($id)
    {
        try {
            $vehicle = AuctionItemModel::
            join('auctions','auctions.id','auction_items.auction_id')
            ->join('financial_institutions','financial_institutions.id','auctions.financial_institution_id')
            ->join('places','places.id','auctions.place_id')
            ->join('items','items.id','auction_items.item_id')
            ->join('categories','categories.id','items.categories_id')
            ->join('vehicles','vehicles.id','items.vehicle_id')
            ->join('brands','brands.id','vehicles.brand_id')
            ->join('car_models','car_models.id','vehicles.car_model_id')
            ->join('vehicles_models','vehicles_models.id','vehicles.vehicles_model_id')
            ->join('vehicles_types','vehicles_types.id','vehicles.vehicle_type_id')
            ->where('item_id',$id)
            ->get([
                'auction_items.value_bid',
                'auction_items.note AS note_item',
                'auction_items.item_id',
                'minimum_bid',
                'auctions.note',
                'auctions.auction_date',
                'financial_institutions.name AS financial_institution',
                'places.name AS place',
                'vehicles_types.type',
                'places.district AS place_district',
                'places.city AS place_city',
                'places.cep AS place_cep',
                'places.country AS place_country',
                'places.complement AS place_complement',
                'categories.category',
                'brands.brand',
                'car_models.model_car',
                'vehicles_models.model',
                'vehicles.license_plate',
                'vehicles.mileage',
                'vehicles.direction',
                'vehicles.shielding',
                'vehicles.color',
                'vehicles.fuel',
                'vehicles.chassi_status',
                'vehicles.air_conditioning',
                'vehicles.gas_kit',
                'vehicles.observation'
            ])
            ->first();

            return response()->json([
                'message' => 'success',
                'data' => $vehicle
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

    /**
     * Grava lance de um determinado item
    */
    public function lance(Request $request)
    {
        try {
            $request ->validate([
                'category' => 'required',
                'item_id' => 'required',
                'valor' => 'required',
                'user' => 'required'
            ]);

            //Verifica qual foi o ultimo lance e o minimo
            $bid = AuctionItemModel::
            join('auctions','auctions.id','auction_items.auction_id')
            ->where('auction_items.id',$request->item_id)
            ->get(['auction_items.value_bid','auction_items.minimum_bid'])
            ->first();

            // verifica se o lance atual não é do próprio usuario
            $historic = AuctionItemModel::
            join('bids','bids.auction_item_id','auction_items.id')
            ->where('auction_item_id',$request->item_id)
            ->orderBy('bids.created_at','desc')
            ->get(['bids.user_id'])
            ->first();

            if ($historic->user_id == $request->user) {
                return response()->json([
                    'message' => 'warning',
                    'data' => 'O maior lance ainda é o seu',
                    'vl_min'=>$bid->value_bid
                ],200);
            }
            return $historic;

            // verifica se o lance atual é maior que o anterior
            if ($request->valor <= $bid->value_bid) {
                return response()->json([
                    'message' => 'warning',
                    'data' => 'O valor do lance deve ser maior que o atual! Atualize a página para verificar o novo valor do lance',
                    'vl_min'=>$bid->value_bid
                ],200);  
            }

            // verifica o valor do incremento
            if ( ($request->valor - $bid->value_bid)%$bid->minimum_bid <> 0 ){
                return response()->json([
                    'message' => 'warning',
                    'data' => 'Valor do incremento mínimo deve ser multiplo de '.$bid->minimum_bid
                ],200);  
            }

            // atualiza o valor do lance
            AuctionItemModel::where('auction_items.id',$request->item_id)
            ->update([
                'value_bid' => $request->valor
            ]);

            // grava o lance no historico
            $user = $request->user;
            $bd = BidModel::create([
                'user_id' => $user,
                'auction_item_id' => $request->item_id,
                'value_bid' => $request->valor
            ]);
            $bd->save();

            return response()->json([
                'message' => 'success',
                'data' => 'Lance gravado com sucesso'
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
     * Realiza lance de valor fixo
     */
    public function lanceFixed(Request $request)
    {
        
    }

    /**
     * Carrega o historico de lance de um item do leilão
     */
    public function historic(int $id=0) //verificar se só um parametro já não resolve
    {
        try {
            if ($id==0) {
                return response()->json([
                    'message' => 'warning',
                    'data' => 'Necessario informar o id do item'
                ],200); 
            }

            $historic = BidModel::
            join('users','users.id','bids.user_id')
            ->join('auction_items','bids.auction_item_id','auction_items.id')
            ->where('auction_item_id',$id)
            ->get([
                'users.name',
                'bids.value_bid',
                'auction_items.opening_bid',
                'bids.created_at'
            ]);

            return response()->json([
                'message' => 'success',
                'data' => $historic
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
