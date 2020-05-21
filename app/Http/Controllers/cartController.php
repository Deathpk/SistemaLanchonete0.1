<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productModel;
use App\Models\cartModel;
use App\Http\Controllers\DB;

class cartController extends Controller
{
    //Adiciona o produto escolhido na tabela Cart do banco.
    public function addToCart(Request $request){

        $product = $request->produto; // ID do produto selecionado.
        $itemInfo = productModel::where('id', '=', $product)->select('name', 'price')->get();// pega o nome  e preço do produto selecionado por id   
        $insert = cartModel::insert(['id'=> $product ,'name' => $itemInfo[0]->name, 'price'=> $itemInfo[0]->price]); // Insere o produto selecionado no carrinho.
        $showCartPrev = cartModel::get('*'); // Pega todos os produtos do cart para preview.

        //queries para calculo do total.
        $tot = cartModel::select('price')->get('*');
        $total = $tot->sum('price'); // faz a soma da collection $subtot contendo o price , e armazena na variavel $subtotal.
        //dd($total);

        if($insert){
            return view('caixa.caixa', compact('showCartPrev', 'total')); //compact('showCartPrev')
        }
        else{
            echo "Deu bosta!";
        }
        
    }
    
    public function indexProd(){

    }

    public function subTotal(){
        // Calcula o subtotal do carrinho (table cart).
    }

    public function removeProd(Request $request){
        
    $product = $request->prod; // ID do produto selecionado.
     $dropItem = cartModel::where('id' , '=' , $product)->delete();
     //queries para calculo do total.
     $tot = cartModel::select('price')->get('*');
     $total = $tot->sum('price'); // faz a soma da collection $subtot contendo o price , e armazena na variavel $subtotal.

     $showCartPrev = cartModel::get('*'); // Pega todos os produtos do cart para preview.
    return view('caixa.caixa', compact('showCartPrev', 'total'));
        
    }
    
}
