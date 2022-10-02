<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ImmobileModel;
use App\Models\JudicialInformationsModel;
use Exception;
use Illuminate\Http\Request;

class ImmobilesController extends Controller
{
    /**
     * Carrega todos os imoveis
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $users = ImmobileModel::all();
            return response()->json([
                'message' => 'success',
                'data' => $users
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
        /**
         * Caso o imovel tem algum informação judicial ela é gravada
        */
        try {
            $value = JudicialInformationsModel::create([
                'process'=>$request->process,
                'judicial_circuit'=>$request->judicial_circuit,
                'judge'=>$request->judge,
                'exequent'=>$request->exequent,
                'executed'=>$request->executed
            ]);   
        } catch (Exception $error) {
            return response()->json([
                'message' => get_class($error),
                'errors' => $error->getMessage(),
                'data' => null
            ],400);
        }

        $request->validate([
            'user_id'=>'required',
            'category_id'=>'required',
            'city'=>'required',
            'address'=>'required',
            'district'=>'required',
            'cep'=> 'required',
            'immobile_type_id'=>'required',
            'judicial_information'=>'required'
        ]);

        try {
            $immobile = ImmobileModel::create([
                'user_id'=>$request->user_id,
                'category_id'=>$request->category_id,
                'city'=>$request->city,
                'address'=>$request->address,
                'district'=>$request->district,
                'cep'=> $request->cep,
                'immobile_type_id'=>$request->immobile_type_id,
                'judicial_information_id'=>$value->id
            ]);
            return response()->json([
                'message' => 'success',
                'data' =>  $immobile
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
        try {
            $immobile = ImmobileModel::findOrfail($id);
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

    /**
     * Atualiza os dados de um imovel
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $immobile = ImmobileModel::findOrfail($id);
            $immobile->update($request->all());
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $immobile = ImmobileModel::destroy($id);
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
