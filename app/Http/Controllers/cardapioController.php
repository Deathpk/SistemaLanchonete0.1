<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Repositories\Contracts\productRepositoryInterface;

class cardapioController extends Controller
{
    //Controller responsável por alimentar a página de cardápio com todos os itens do Banco.
    public function showCardapio(productRepositoryInterface $model)
    {
        $Comida = $model->getComida();
        $Bebida = $model->getBebida();
        $Sobremesa = $model->getSobremesa();
        return view('cardapio', compact('Comida', 'Bebida', 'Sobremesa'));
    }

}
