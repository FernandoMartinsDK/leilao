<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Retorna todos os usuarios 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $users = User::all();
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
     * Cria um novo usuario
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'view_name' => 'required',
            'cpf' => 'required',
            'active' => 'required',
            'is_admin' => 'required',
            'password' => 'required'
        ]);

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'view_name' => $request->view_name,
                'cpf' => $request->cpf,
                'active' => $request->active,
                'is_admin' => $request->is_admin,
                'password' =>  bcrypt($request->password)
            ]);
            return response()->json([
                'message' => 'success',
                'data' =>  $user
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
     * Mostra um usuario em especifico
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $user = User::findOrfail($id);
            return response()->json([
                'message' => 'success',
                'data' => $user
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
     * Atualiza um usuario em especifico
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $user = User::findOrfail($id);
            $user->update($request->all());
            return response()->json([
                'message' => 'success',
                'data' => $user
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
     * Remove um usuario em especifico
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = User::destroy($id);
            return response()->json([
                'message' => 'success',
                'data' => $user
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
     * Procura usuario pelo nome
     * @param  string  $name  
    */
    public function search(string $name)
    {
        try {
            $user = User::where('name','like',"%".$name."%")->get();
            return response()->json([
                'message' => 'success',
                'data' => $user
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
