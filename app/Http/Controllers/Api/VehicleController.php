<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\VehicleModel;
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
            'user_id'=>'required',
            'category_id'=>'required',
            'license_plate'=>'required',
            'mileage'=>'required',
            'direction'=>'required',
            'shielding'=>'required',
            'color'=>'required',
            'fuel'=>'required',
            'chassi_status'=>'required',
            'air_conditioning'=>'required',
            'gas_kit'=>'required'
        ]);

        try {
            $vehicle = VehicleModel::create($request->all());
            return response()->json([
                'message' => 'success',
                'data' =>  $vehicle
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
}
