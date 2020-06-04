<?php

namespace App\Http\Controllers\Caixa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\productModel;
use Illuminate\Support\Facades\Session;

class caixaController extends Controller
{
    private $subTotal = [];
    private $Total= [];
    private $Items = [];
    
    //mostra a view do caixa.
    public function show(){
        return view('caixa.caixa');
        }

        public function showItens(Request $request){
            
            $itemSelected = productModel::where('type', '=', $request->Prodtype)->get('*'); // Seleciona todos os itens com o msm tipo do requisitado do formulário.
            return view('caixa.itensView', compact('itemSelected'));
            }
}
