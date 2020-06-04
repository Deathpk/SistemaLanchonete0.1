<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class cartModel extends Model
{
    //Model da table cart
    protected $table = 'cart';
    public $timestamps = false;

    
    public static function insertTest($item, $id){
        // Insere o produto selecionado no carrinho.
       cartModel::insert(['id'=> $id ,'name' => $item[0]->name, 'price'=> $item[0]->price]); 
        }

    public static function dropItem($item){
    cartModel::where('id' , '=' , $item)->delete();
    }

    public static function clearCart(){
        cartModel::select('id', 'name', 'price')->delete();
    }

}