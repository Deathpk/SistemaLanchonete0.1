<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class savedCartsModel extends Model
{
    //Model da table cart
    protected $table = 'savedcarts';

    public static function saveCart($total,$date){
        savedCartsModel::insert(['total'=>$total,'date'=>$date]); // Salva o valor e data da compra na tabela de carrinhos salvos.
    }

}