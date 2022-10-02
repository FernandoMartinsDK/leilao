<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PlaceModel;
use Exception;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $place = PlaceModel::all();
            return response()->json([
                'message' => 'success',
                'data' => $place
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
            'address' => 'required',
            'district' => 'required',
            'city' => 'required',
            'cep' => 'required',
            'country' => 'required',
            'name' => 'required'
        ]);

        try {
            $place = PlaceModel::create([
                'address' => $request->address,
                'district' => $request->district,
                'city' => $request->city,
                'cep' => $request->cep,
                'country' => $request->country,
                'name' => $request->name
            ]);
            return response()->json([
                'message' => 'success',
                'data' =>  $place
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
            $place = PlaceModel::findOrfail($id);
            return response()->json([
                'message' => 'success',
                'data' => $place
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
            $place = PlaceModel::findOrfail($id);
            $place->update($request->all());
            return response()->json([
                'message' => 'success',
                'data' => $place
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
            $place = PlaceModel::destroy($id);
            return response()->json([
                'message' => 'success',
                'data' => $place
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
