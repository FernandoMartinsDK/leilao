<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AuctionItemModel;
use App\Models\CategoryModel;
use Exception;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $category = CategoryModel::all();
            return response()->json([
                'message' => 'success',
                'data' => $category
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
            $category = AuctionItemModel::
                join('items','auction_items.item_id','items.id')
                ->where('item_id',$id)
                ->get([
                    'categories_id'
                ])
                ->first();
            return response()->json([
                'message' => 'success',
                'data' => $category
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
