<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AddressModel;
use Exception;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            $address = AddressModel::findOrfail($id);
            return response()->json([
                'message' => 'success',
                'data' => $address
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
                'user_id' => 'required',
                'address' => 'required',
                'cep' => 'required',
                'number' => 'required',
                'district' => 'required',
                'city' => 'required',
                'state' => 'required'
            ]);

            //Remove pontuação
            $remove = ["*","-","/",".","(",")"];
            $request->cep = str_replace($remove,"", $request->cep);
            $request->number = str_replace($remove,"", $request->number);

            AddressModel::where('id',$id)
            ->update([
                'user_id' => $request->user_id,
                'address' => $request->address,
                'cep' => $request->cep,
                'number' => $request->number,
                'district' => $request->district,
                'city' => $request->city,
                'state' => $request->state
            ]);

            return response()->json([
                'message' => 'success',
                'data' => 'Endereço atualizado com sucesso!'
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
        //
    }
}
