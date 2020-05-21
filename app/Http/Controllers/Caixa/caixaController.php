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
            
            public function currentTransaction(Request $request){

                $product = $request->produto; // ID do produto selecionado.
                //dd($product);

                $itemName = productModel::where('id', '=', $product)->get('name')->toArray();// pega o nome do produto selecionado por id 
                $itemPrice = productModel::where('id', '=', $product)->get('price')->toArray(); // pega o preço do produto selecionado por id e converte para array , para ser usado na variavel global subtotal.
                //dd($itemPrice);

                
                
            }
              
            

           /* public function subTotal($item){
                $item = $prodPrice + $
            }*/
}
