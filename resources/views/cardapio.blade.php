@extends ('Layouts.app')

@section('title', 'Cardápio')
<style>
    body  {
      background-image: url("/SistemaLanchonete/images/CardapioBackground.jpg");
      	
    background-position: 0px 0px;
    background-repeat: no-repeat;
    background-color: #cccccc;
    }
    </style>
@section('content')

<!-- Navbar (sit on top) -->
<div class="w3-top w3-hide-small">
    <div class="w3-bar w3-xlarge w3-black w3-opacity w3-hover-opacity-off" id="myNavbar">
    <a href="/SistemaLanchonete0.1/public" class="w3-bar-item w3-button">MENU</a>
      <a href="#about" class="w3-bar-item w3-button">ABOUT</a>
      <a href="#myMap" class="w3-bar-item w3-button">CONTACT</a>
    </div>
  </div>
<h1>Cardápio</h1>

@if ($errors->any())
<ul>
@foreach($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
</ul>
@endif
<br>
<br>

<!--  Comida  -->
<h3>Comidas: </h3>
@foreach($Comida as $item)
<li>ID {{$item->id}} | {{$item->name}} | R$ {{$item->price}}</li>
@endforeach

<!--  Comida  -->
<h3>Bebidas: </h3>
@foreach($Bebida as $item)
<li>ID {{$item->id}} | {{$item->name}} | R$ {{$item->price}}</li>
@endforeach

<!--  Sobremesa  -->
<h3>Sobremesas: </h3>
@foreach($Sobremesa as $item)
<li>ID {{$item->id}} | {{$item->name}} | R$ {{$item->price}}</li>
@endforeach

@endsection
