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
    #Carrinho{
      font-family: 'Lobster', cursive;
      width: 600px;/*width é largura!*/
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
<div class="card text" id="productListCard">
    <h1>Selecione a categoria</h1>
    <div class="card-body">
    <form action="{{route('caixaShowItens')}}" method="post">
      @csrf
      <select id = "Prodtype" name="Prodtype" >
        <option value = "default">Selecione o Tipo do Produto</option>
        <option value = "Comida">Comida</option>
        <option value = "Bebida">Bebida</option>
        <option value = "Sobremesa">Sobremesa</option>
    </select>
    
        <button type="submit">Selecionar</button>
      </form>
        
    </div>
  </div>
  
<!-- Carrinho -->
<div class="container-fluid" id= "Carrinho">
<div class="card text-center">
  <h1>Carrinho</h1>
  <div class="card-body">
    Itens Pedido:
    <br>
    <!-- itens do pedido -->
    @if (isset($showCartPrev))
     @foreach ($showCartPrev as $item)
     <form action="{{route('Cart/Remove')}}" method="post">
      @csrf
      @method('PUT')
     <ul>
        {{$item->name}} - {{$item->price}} R$ <button type="submit" class="btn btn-warning" id="prod" name="prod" value={{$item->id}} >Remover</button></li>
        </ul>
      </form>
    @endforeach
    @endif

    @if(!isset($showCartPrev))
      Vazio...
      <br>
    @endif

    <!-- Subtotal -->
    Subtotal: @if (isset($total))
        {{$total}}
        @endif R$
    <br>
    <!-- Finalizar Pedido-->
    <form action="{{route('Cart/Checkout')}}" method="post">
      @csrf
      @method('PUT')
    <button type="submit" class="btn btn-success">Finalizar Pedido</button>
    </form>

    <form action="{{route('Cart/Renew')}}" method="get">
      @csrf
      <button type="submit" class="btn btn-danger">Esvaziar Carrinho</button>
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

