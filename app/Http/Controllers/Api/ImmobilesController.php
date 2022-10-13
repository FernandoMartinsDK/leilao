<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AuctionItemModel;
use App\Models\AuctionModel;
use App\Models\ImmobileModel;
use App\Models\ImmobileTypeModel;
use App\Models\ItemModel;
use Exception;
use Illuminate\Http\Request;

class ImmobilesController extends Controller
{
    /**
     * Carrega dados básico de todos os imoveis
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $immobiles = "";
            return response()->json([
                'message' => 'success',
                'data' => $immobiles
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
     * Adicionar novo imovel
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'immobile_type_id'=>'required',
                'city'=>'required',
                'address'=>'required',
                'district'=>'required',
                'cep'=>'required',
                'model'=>'required',
                'number'=>'required',
                'state'=>'required',
                'land_area'=>'required',
                'auction_id'=>'required',
                'description'=>'required',
                'building_area'=>'required',
                'value_item'=>'required'
            ]);

            $immobiles = ImmobileModel::create([
                'immobile_type_id' => $request->immobile_type_id,
                'city' => $request->city,
                'address' => $request->address,
                'district' => $request->district,
                'cep' => $request->cep,
                'judicial_information' => $request->judicial_information,
                'description' => $request->description,
                'model' => $request->model,
                'number' => $request->number,
                'complement' => $request->complement,
                'state' => $request->state,
                'land_area' => $request->land_area,
                'building_area' => $request->building_area
            ]);
            
            
            // Cria o registro desse item na tabela items para se tornar disponivel para consulta
            $item = ItemModel::create([
                'immobile_id' => $immobiles->id,
                'vehicle_id' => null,
                'categories_id' => '1'
            ]);

            // Adiciona na tabela de itens que vão a leilão
            $auctionItem = AuctionItemModel::create([
                'item_id' => $item->id,
                'auction_id' => $request->auction_id,
                'opening_bid' => $request->value_item,
                'minimum_bid' => $request->minimum_bid,
                'value_bid' => $request->value_item,
                'note' => $request->note
            ]);

            return response()->json([
                'message' => 'success',
                'data' => $auctionItem
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
     * Mostra um imovel em especifico
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Atualiza os dados de um imovel
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
    }

    /**
     * Carregar tipo de imoveis
     */
    public function type()
    {
        try {
            $immobile = ImmobileTypeModel::all();
            return response()->json([
                'message' => 'success',
                'data' => $immobile
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
