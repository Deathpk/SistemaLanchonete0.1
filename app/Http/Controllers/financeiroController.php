<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\financeiroRepositoryInterface;
use Illuminate\Http\Request;

class financeiroController extends Controller
{
    
    public function financeiroShow()
     {
         return view('admin.financeiroshow');
     }

     public function selectedOption(Request $request)
     {
        //Retorna para a view da opção selecionada.     
          if($request->option == "Mes")
          {
            return view('admin.financeiroMensal');
          }

          if($request->option == "Dia")
          {
              return view('admin.financeiroDia');
          }

          else
          {
              return view('admin.financeiroAno');
          }
     }

        public function monthOption(Request $request, financeiroRepositoryInterface $model)
        {
            //Trata a requisição do fechamento por mês.
            $month=$request->monthSelect;
            $selectedMonth = $model->selectMonth($request);
            $totalMonth = $selectedMonth->sum('total'); // Faz a soma de todo o valor adquirido no mês selecionado.
           return view('admin.fechamentoMensal', compact('totalMonth', 'month'));
        }

        public function dayOption(Request $request, financeiroRepositoryInterface $model)
        {
            //Trata a requisição do fechamento do dia selecionado.
            $day = $request->daySelect;
            $selectedDay = $model->selectedDay($request);
            $totalDay = $selectedDay->sum('total');
            return view('admin.fechamentoDia', compact('totalDay', 'day'));
        }

        public function yearOption(Request $request, financeiroRepositoryInterface $model)
        {
            //Trata a requisição do fechamento do ano selecionado.
            $year = $request->yearSelect;
            $selectedYear = $model->yearOption($request);
            $totalYear = $selectedYear->sum('total');
            return view('admin.fechamentoAno', compact('totalYear', 'year'));
        }

}
