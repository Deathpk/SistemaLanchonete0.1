<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\productModel;
class SessionController extends Controller
{
    //
    
// Session::forget(['product_name', 'price','subtot','total']);

private $totalPrice = 0.00;

    public function session (Request $request){
        $product = $request->produto; // ID do produto selecionado.
        $itemInfo = productModel::where('id', '=', $product)->select('name', 'price')->get()->toArray();// pega o nome  e preço do produto selecionado por id   
        Session::put(['product_name'=> array_column($itemInfo, 'name'), 'price'=> array_column($itemInfo,'price')]);
       // dd(Session::all());

       //$item= array_column($itemInfo, 'price'); // Armazena o valor do produto atual.

       // $this->totalPrice+=$item[0]; // Soma os valores do produto.
        //dd($this->totalPrice);
        //session_start();
      
       // return redirect()->route('caixaShow');
       // var_dump(Session::all());
        
        /*  echo "<h1>Teste Sessão</h1>";
        
        Session::put('email',null); // Imputar uma info na session
        echo Session::get('email'); // imprimindo a info da session .

        Session::put(['cart_product'=> '1', 'cart_quantity'=>'2', 'price'=>199]); // adicionar varios dados em array na session

        Session::forget(['price','cart_quantity','cart_product']); // Apagar um valor na session

        if (Session::has('email')){ // validar se há um valor na posição da  session :)
            echo "<p>O e-mail informado é valido!</p>";
        }
            else{

                echo "<p>O e-mail informado não é valido!</p>";
            }

            if (Session::exists('email')){ // o exists verifica se a posição existe , e não se o valor existe.
                echo "<p>O e-mail informado é valido!</p>";
            }
                else{
    
                    echo "<p>O e-mail informado não é valido!</p>";
                }

             //  Session::flash('message', 'O artigo foi criado com sucesso!'); // o Flash mostra algum conteudo na proxima pagina , depois é apagado.
                echo Session::get('message');
        

        var_dump(Session::all());*/
    }

    public function getCart(){

        
    }


}
