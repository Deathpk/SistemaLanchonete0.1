<?php

namespace App\Repositories\Eloquent;

abstract class abstractRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = $this->resolveModel();
    }

/*
 *
 * ############ REGRAS DE NEGÓCIO ##############
 * 
 */  

    /* MÉTODOS PRODUCT REPOSITORY*/
    public function checkProduct($id)
    {
        return $this->model->where('id', '=', $id)->exists();// exists retorna true ou false , se o item existe.
    }

    public function insertProduct($request)
    {
        return $this->model->insert(['id'=>$request->Prodid, 'name'=>$request->Prodname, 'type'=>$request->Prodtype,
        'price'=>$request->Prodvalue ]);
    }


    public function updateProduct($request)
    {
        return $this->model->where('id', '=', $request->Prodid)->update(['name'=>$request->Prodname, 'type'=>$request->Prodtype,
        'price'=>$request->Prodvalue]);

    }

    public function destroyProduct($request)
    {
        return $this->model->where('id', '=', $request->Prodid)->delete();
    }

    public function getProduct($request)
    {
        return $this->model->where('id', '=', $request)->select('name', 'price')->get();
    }
    
    public function getComida()
    {
        return $this->model->where('type','=','Comida')->get('*');
    }

    public function getBebida()
    {
        return $this->model->where('type','=','Bebida')->get('*');
    }

    public function getSobremesa()
    {
        return $this->model->where('type','=','Sobremesa')->get('*');
    }

    /* MÉTODOS USER REPOSITORY*/

    public function showUsers()
    {
        return $this->model->where('name' , '!=' , 'null')->exists();
    }

    public function returnAllUsers()
    {
        return $this->model->get('*');
    }
    
    public function updateUser($request)
    {
        return $this->model->where('user_id', '=', $request->UserId)->update(['role_id'=> $request->UserRole]);
    }

    public function deleteUser($request)
    {
        return $this->model->where('user_id', '=', $request->UserId)->delete();
    }

    /* MÉTODOS FINANCEIRO REPOSITORY*/

    public function selectMonth($request)
    {
        return $this->model->whereMonth('date', '=', $request->monthSelect)->get('total'); // Pega o total de onde o mês for igual ao mês selecionado no form.
    }

    public function selectedDay($request)
    {
        return $this->model->whereDay('date', '=', $request->daySelect)->get('total'); // Pega o total de onde o dia for igual ao dia selecionado no form.
    }

    public function yearOption($request)
    {
        return $this->model->whereYear('date', '=', $request->yearSelect)->get('total'); // Pega o total de fechamento do Ano , onde o Ano escolhido for igual ao ano do DB.
    }

    /* MÉTODOS CART REPOSITORY*/

    public function insertIntoCart($item , $id)
    {
        return $this->model->insert(['id'=> $id ,'name' => $item[0]->name, 'price'=> $item[0]->price]);
    }

    public function getAll()
    {
        return $this->model->all();
    }
    
    public function getTotal()
    {
        return $this->model->select('price')->get('*')->sum('price');
    }
    public function dropItem($product)
    {
        return $this->model->where('id' , '=' , $product)->delete();
    }
    public function clearCart(){
        return $this->model->select('id', 'name', 'price')->delete();
    }

    /* MÉTODOS SAVED CARTS REPOSITORY*/

    public function saveCart($total,$date)
    {
       return $this->model->insert(['total'=>$total,'date'=>$date]); // Salva o valor e data da compra na tabela de carrinhos salvos.
    }

    /*
 *
 * ############# FIM REGRAS DE NEGÓCIO ################
 * 
 */

    protected function resolveModel()
    {
        return app($this->model);
    }


}

?>