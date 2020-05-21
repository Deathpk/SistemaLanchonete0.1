<?php

namespace App\Http\Controllers;

use App\Http\Requests\destroyProductRequest;
use Illuminate\Http\Request;
use App\Models\productModel;
use App\Http\Requests\storeProductRequest;
use App\Http\Requests\updateProductRequest;

class productsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct(Request $request)
     {
       $this->middleware('auth')->only([

            'create','show','edit'
            
        ]);
         }


    public function index()
    {
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Create an product.
        return view('admin.createProduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeProductRequest $request)
    {
        //Guarda os dados do produto a ser adicionado no DB.
        
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // retorna para a view delete Product , com um id :)
        return view('admin.deleteProduct', compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Editar o produto
        
        return view('admin.editProduct', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateProductRequest $request, $id)
    {
        //Salva as alterações mandadas do editProduct.blade
        
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(destroyProductRequest $request, $id)
    {
        //Deleta um produto do DB.
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
