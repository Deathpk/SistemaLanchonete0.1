<?php

namespace App\Http\Controllers;

use App\Http\Requests\destroyProductRequest;
use Illuminate\Http\Request;
use App\Models\productModel;
use App\Http\Requests\storeProductRequest;
use App\Http\Requests\updateProductRequest;

class productsController extends Controller
{
    
    public function __construct(Request $request)
     {
       $this->middleware('auth')->only([

            'create','show','edit'
            
        ]);
         }

    /**
     * Retorna a view para criação de produto.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createProduct');
    }

    /**
     * Guarda os dados do produto a ser adicionado no DB..
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeProductRequest $request)
    {
        $prodId = $request->Prodid;
        $prodIdDB = productModel::where('id', '=', $prodId)->exists(); // exists retorna true ou false , se o item existe.
        if ($prodIdDB!=false){
    echo "ID de produto já existente!";
    return view('admin.createProduct');
}
else{

        $ProductData = productModel::insert(['id'=>$request->Prodid, 'name'=>$request->Prodname, 'type'=>$request->Prodtype,
        'price'=>$request->Prodvalue ]);

        if($ProductData){
            echo "Produto adicionado com sucesso!";
            return view('admin.createProduct');
        }
        else{
            echo "Produto não inserido , tente novamente.";
            return view('admin.createProduct');
        }

    }
}
    /**
     * retorna para a view delete Product , com um id :).
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.deleteProduct', compact('id'));
    }

    /**
     * Retorna a view para editar produto , com um Id.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.editProduct', compact('id'));
    }

    /**
     * Salva as alterações vindas do editProduct.blade.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateProductRequest $request, $id)
    {
        $ProdUpdate = productModel::where('id' , '=', $request->Prodid)->update(['name'=>$request->Prodname, 'type'=>$request->Prodtype,'price'=>$request->Prodvalue]);

        if($ProdUpdate){
            echo "Produto editado com sucesso!";
            return view('admin.editProduct', compact('id'));
        }
        else{
            echo "Produto não Encontrado , tente novamente!";
            return view('admin.editProduct', compact('id'));
        }
    }

    /**
     * Deleta um produto do DB.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(destroyProductRequest $request, $id)
    {
        
        $ProdDestroy = productModel::where('id', '=', $request->Prodid)->delete();
        if ($ProdDestroy){
            echo "Produto Deletado com sucesso.";
            return view ('admin.deleteProduct', compact('id'));
        }
        else{
            echo "Produto não encontrado , tente novamente!";
            return view ('admin.deleteProduct', compact('id'));
        }


    }
}
