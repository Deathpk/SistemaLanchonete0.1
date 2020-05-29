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
  #resumoCompra{
    font-family: 'Lobster', cursive;
    font-weight: bold;
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
        <h1>Resumo da compra</h1>
      
    
 <!-- Final do checkout -->
  <div class="card-body" id="resumoCompra">

    @if (isset($troco))
    <h5>Método de pagamento: Dinheiro</h5>
    <br>
    <h4>Itens Pedido</h4>
    <br>
    @foreach ($itemInfo as $item)
      <h5>{{$item->name}} - {{$item->price}}R$</h5>
      <br>
  @endforeach
  <br>
  <p>--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</p>
  <h4>Total da compra: {{$totalDinheiro}} R$</h4>
  <h3>Valor Recebido: {{$vlrRecebido}} R$</h3>
    <h1>Troco: {{$troco}} R$</h1>
        @endif

    @if(isset($total))
    <h5>Método de pagamento: Cartão</h5>
    <br>
    @foreach ($itemInfo as $item)
      <h5>{{$item->name}} - {{$item->price}}R$</h5>
      <br>
  @endforeach
  <br>
  <p>--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</p>
    <h1>Total da compra: {{$total}} R$</h1>
    
    @endif
  
</div>
<form action="{{route('Cart/Renew')}}" method="get">
  @csrf
<button type="submit" class="btn btn-success">Finalizar</button>
</form>

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

