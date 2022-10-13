<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ItemModel;
use App\Models\VehicleModel;
use App\Models\VehicleModelsModel;
use App\Models\VehicleTypeModel;
use Exception;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $vehicle = VehicleModel::all();
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'brand_id'=>'required',
            'car_model_id'=>'required',
            'vehicles_model_id'=>'required',
            'vehicle_type_id'=>'required',
            'mileage'=>'required',
            'direction'=>'required',
            'shielding'=>'required',
            'color'=>'required',
            'fuel'=>'required',
            'chassi_status'=>'required',
            'air_conditioning'=>'required',
            'gas_kit'=>'required',
            'auction_id'=>'required'
        ]);
        
        try {
            // Adiciona registro 
            $vehicle = VehicleModel::create([
                'brand_id' => $request->brand_id,
                'car_model_id' => $request->car_model_id,
                'vehicles_model_id' => $request->vehicles_model_id,
                'vehicle_type_id' => $request->vehicle_type_id,
                'license_plate' => $request->license_plate,
                'mileage' => $request->mileage,
                'direction' => $request->direction,
                'shielding' => $request->shielding,
                'color' => $request->color,
                'fuel' => $request->fuel,
                'chassi_status' => $request->chassi_status,
                'air_conditioning' => $request->air_conditioning,
                'gas_kit' => $request->gas_kit,
                'observation' => $request->observation
            ]);

            // Cria o registro desse item na tabela items para se tornar disponivel para consulta
            $item = ItemModel::create([
                'immobile_id' => null,
                'vehicle_id' => $vehicle->id,
                'categories_id' => '2'
            ]);

            return response()->json([
                'message' => 'success',
                'data' =>  $item
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $vehicle = VehicleModel::findOrfail($id);
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
        try {
            $vehicle = VehicleModel::findOrfail($id);
            $vehicle->update($request->all());
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $vehicle = VehicleModel::destroy($id);
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
     * Retorna todos os tipos de veiculos cadastrados
     */
    public function type()
    {
        try {
            $vehicle = VehicleTypeModel::all();
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

    public function models()
    {
        try {
            $immobile = VehicleModelsModel::all();
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
