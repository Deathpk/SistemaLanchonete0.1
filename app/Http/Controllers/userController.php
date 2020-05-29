<?php

namespace App\Http\Controllers;

use App\Models\userModel;
use App\Models\savedCartsModel;
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
     * Deleta o usuário pelo UserId que vem do form.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request , $id)
    {
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
   
     /**
     * Funções e métodos do financeiro.
     *
     */
     public function financeiroShow(){
         return view('admin.financeiroshow');
     }

     public function selectedOption(Request $request){
//Retorna para a view da opção selecionada. 
          if($request->option == "Mes"){

            return view('admin.financeiroMensal');
          }
          if($request->option == "Dia"){
              return view('admin.financeiroDia');
          }
          else {
              return view('admin.financeiroAno');
          }
        }

        public function monthOption(Request $request){
            //Trata a requisição do fechamento por mês.
            $month=$request->monthSelect;
            $selectedMonth = savedCartsModel::whereMonth('date', '=', $month)->get('total'); // Pega o total de onde o mês for igual ao mês selecionado no form.
            $totalMonth = $selectedMonth->sum('total'); // Faz a soma de todo o valor adquirido no mês selecionado.
           return view('admin.fechamentoMensal', compact('totalMonth', 'month'));
           
        }

        public function dayOption(Request $request){
            //Trata a requisição do fechamento do dia selecionado.
            $day = $request->daySelect;
            $selectedDay = savedCartsModel::whereDay('date', '=', $day)->get('total'); // Pega o total de onde o dia for igual ao dia selecionado no form.
            $totalDay = $selectedDay->sum('total');
            return view('admin.fechamentoDia', compact('totalDay', 'day'));
        }

        public function yearOption(Request $request){
            //Trata a requisição do fechamento do ano selecionado.
            $year = $request->yearSelect;
            $selectedYear = savedCartsModel::whereYear('date', '=', $year)->get('total'); // Pega o total de fechamento do Ano , onde o Ano escolhido for igual ao ano do DB.
            $totalYear = $selectedYear->sum('total');
            return view('admin.fechamentoAno', compact('totalYear', 'year'));
        }


}
