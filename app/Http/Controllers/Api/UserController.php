<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
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
        return User::all();
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

        return User::create($request->all());
    }

    /**
     * Mostra um usuario em especifico
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return User::findOrfail($id);
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
        $user = User::findOrfail($id);
        $user->update($request->all());
        return $user;
    }

    /**
     * Remove um usuario em especifico
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return User::destroy($id);
    }

    /**
     * Procura usuario pelo nome
     * @param  string  $name  
    */
    public function search(string $name)
    {
        return User::where('name','like',"%".$name."%")->get();
    }
}
