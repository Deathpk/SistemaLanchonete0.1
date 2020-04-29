<?php

namespace App\Http\Controllers;

use App\Models\userModel;
use Illuminate\Http\Request;
use App\User;

class userController extends Controller
{
    /**
     * Mostra Todos usuários cadastrados no DB.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $isDbEmpty = userModel::where('name' , '!=' , 'null')->exists();
        
            if ($isDbEmpty != false){
            $allUsers = userModel::get('*');
            return view('admin.showUsers', compact('allUsers'));
           }

           else{
               echo "Não existem usuários cadastrados no sistema!.";
           }
           
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
     * manda pro formulário de User Delete.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return view('admin.deleteUser', compact('id'));
    }

    /**
     * Retorna o formulário de edição , que então manda para o update.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.editUser', compact($id));
    }

    /**
     * Dá update no banco de dados com o novo role Id do usuário..
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // 
        $userUpdate = userModel::where('user_id', '=', $request->UserId)->update(['role_id'=> $request->UserRole]);
        
        
        if($userUpdate){
                echo "Role editado com sucesso!";
                return view('admin.dashboard');
            }
            else{
                echo "Role não editado , tente novamente!";
                return view('admin.dashboard');
            }
           
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request , $id)
    {
        //Deleta o usuário pelo UserId do form. 
        
        $userDestroy = userModel::where('user_id', '=', $request->UserId)->delete();

        if ($userDestroy){
            echo "Usuário excluido com sucesso!";
            return view('admin.dashboard');
        }
        else{
            echo "Usuário não excluido , tente novamente!";
            return view('admin.dashboard');
        }

    }
}
