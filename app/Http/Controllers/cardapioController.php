<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productModel;

class cardapioController extends Controller
{
    //Controller do cardápio.
    
    public function showCardapio(){
        $Comida = productModel::where('type','=','Comida')->get('*');
        $Bebida = productModel::where('type','=','Bebida')->get('*');
        $Sobremesa = productModel::where('type','=','Sobremesa')->get('*');

        return view('cardapio', compact('Comida', 'Bebida', 'Sobremesa'));
    }
}
