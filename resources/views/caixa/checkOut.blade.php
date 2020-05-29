@extends ('Layouts.app')

@section('title', 'Sistema de caixa')
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
<style>
    body  {
      background-image: url("/SistemaLanchonete0.1/images/CardapioBackground.jpg");
      	
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    background-color: #cccccc;
    }
    .card{
      width: 30%
      margin: 0 auto; /* Added */
        float: none; /* Added */
        margin-bottom: 10px; /* Added */
    }
    #productListCard{
      float: left;
    }
    #CheckOut{
      font-family: 'Lobster', cursive;
      width: 900px;/*width é largura!*/
      float: center;
      padding-right: 100px;
  }
    
    
    </style>
@section('content')

<div class="container-fluid">

  <!-- Navbar (sit on top) -->
  <div class="w3-top w3-hide-small">
    <div class="w3-bar w3-xlarge w3-black w3-opacity w3-hover-opacity-off" id="myNavbar">
    <a href="/SistemaLanchonete0.1/public" class="w3-bar-item w3-button">INICIO</a>
    <a href="{{ URL::previous() }}" class="w3-bar-item w3-button">VOLTAR</a>
      </div>
  </div>
  
  <div class="card text-center" id="title">
    <h1>Sistema de Caixa</h1>
  </div>
  <br>
  <div class="container-fluid" id= "Checkout">
    <div class="card text-center" id="title">
        <h1>CheckOut</h1>
      
    
 <!-- Checkout -->
  <div class="card-body">
    <h4>Itens pedido:</h4>
    <br>
  @foreach ($itemInfo as $item)
      <h5>{{$item->name}} - {{$item->price}}R$</h5>
      <br>
  @endforeach
  <br>
  <h1>Total: {{$total}} R$</h1>
   <br>
   <p>--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</p>
   <h4>Formas de Pagamento: </h4>
    <br>
   Dinheiro 
   <form action="{{route('Cart/PosCheckout')}}" method="post">
    @csrf
    @method('PUT')
    <br>
   <input class="form-control" type="number" step="0.01" name="Dinheiro" placeholder="Valor recebido para calculo de troco">
  <div class="form-check">
    <br>
    <input class="form-check-input" type="radio" name="Cartao" id="Cartao" value={{$total}}>
    <label class="form-check-label" for="Cartao">
      Cartão 
    </label>
    <br>
    <br>
    <br>
    <button type="submit" class="btn btn-success">Confirmar</button>
    </form>
</div>
</div>
</div>
 
@if ($errors->any())
<ul>
@foreach($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
</ul>
@endif
<br>

@endsection

