<?php

namespace App\Http\Controllers;

use App\Http\Requests\destroyProductRequest;
use Illuminate\Http\Request;
//use App\Models\productModel;
use App\Http\Requests\storeProductRequest;
use App\Http\Requests\updateProductRequest;
use App\Repositories\Contracts\productRepositoryInterface;

class productsController extends Controller
{
    public function __construct(Request $request)
     {
       $this->middleware('auth')->only([

            'create','show','edit'
            
        ]);
         }

    public function index()
    {
         return redirect()->route('admin');
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
    public function store(storeProductRequest $request, productRepositoryInterface $model)
    {
        $prodId = $request->Prodid;
        $prodIdDB = $model->checkProduct($prodId);
        if ($prodIdDB!=false){
            return view('admin.createProduct')->with('error', 'ID de produto já existente!');
        }

        else{
        
         $ProductData = $model->insertProduct($request);

            if($ProductData){
                return view('admin.createProduct')->with('success', 'Produto adicionado com sucesso!');
            }
                else{
                    return view('admin.createProduct')->with('error', 'Produto não adicionado , tente novamente.');
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
    public function update(updateProductRequest $request, $id, productRepositoryInterface $model)
    {
        if($request->Prodtype == 'default'){
            return view('admin.editProduct', compact('id'))->with('error', 'Tipo de produto obrigatório , tente novamente!');
        }
        
        $ProdUpdate = $model->updateProduct($request);

        if($ProdUpdate)
        {
            return view('admin.editProduct', compact('id'))->with('success', 'Produto editado com sucesso!');
        }

            else
            {
                return view('admin.editProduct', compact('id'))->with('error', 'Produto não encontrado , tente novamente!');
            }
    }

    /**
     * Deleta um produto do DB.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(destroyProductRequest $request, $id, productRepositoryInterface $model)
    {
        
        $ProdDestroy = $model->destroyProduct($request);
        if ($ProdDestroy)
        {
            return view ('admin.deleteProduct', compact('id'))->with('success', 'Produto deletado com sucesso!');
        }

            else
            {
                return view ('admin.deleteProduct', compact('id'))->with('error', 'Produto não encontrado , tente novamente!');
            }


    }
}
