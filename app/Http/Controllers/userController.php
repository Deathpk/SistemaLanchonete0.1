<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\productRepositoryInterface;
use App\Repositories\Contracts\userRepositoryInterface;
use Illuminate\Http\Request;
use App\User;

class userController extends Controller
{
    /**
     * Mostra Todos usuários cadastrados no DB.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( userRepositoryInterface $model)
    {
            $isDbEmpty = $model->showUsers();
        
            if ($isDbEmpty != false){
                $allUsers = $model->returnAllUsers();
                return view('admin.showUsers', compact('allUsers'));
            }

           else{
               redirect()->route('admin')->with('error', 'Não existe usuários cadastrados até o momento.');
            }
    }
    
    /**
     * manda pro formulário de User Delete.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
    public function update(Request $request, $id , userRepositoryInterface $model)
    {
        $userUpdate = $model->updateUser($request);

        if($userUpdate){
            return view('admin.dashboard')->with('success', 'Role editado com sucesso!');
        }

        else{
                return view('admin.dashboard')->with('error', 'Role não editado , tente novamente!');
        }
           
    }

    /**
     * Deleta o usuário pelo UserId que vem do form.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request , $id, userRepositoryInterface $model)
    {
       $userDestroy = $model->deleteUser($request);

        if ($userDestroy){
            return view('admin.dashboard')->with('success', 'Usuário deletado com sucesso!');
        }

            else{
                return view('admin.dashboard')->with('error', 'Usuário não deletado , tente novamente!');
            }

    }
   
}
