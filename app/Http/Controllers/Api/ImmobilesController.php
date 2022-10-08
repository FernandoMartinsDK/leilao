<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AuctionModel;
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
        /**
         * Caso o imovel tem algum informação judicial ela é gravada
        */
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
}
