@extends ('Layouts.app')

@section('title', 'Editar Produto')
<style>
    body  {
      background-image: url("/SistemaLanchonete0.1/images/CardapioBackground.jpg");
      	
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    background-color: #cccccc;
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
    <div class="card text-center">
<h1>Editar Produtos</h1>
</div>
<br>
@if ($errors->any())
<ul>
@foreach($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
</ul>
@endif

<div class="card" id="item">
    <div class="card-body">
<form action="{{route('products.update', $id)}}" method="post">
    @csrf
    @method('PUT')
<input type="number" name="Prodid" placeholder="ID do produto a ser editado:">
<input type="text" name = "Prodname" placeholder="Nome do Produto: " value = "{{old('Prodname')}}">
<select id = "Prodtype" name="Prodtype" >
    <option value = "default">Selecione o Tipo do Produto</option>
    <option value = "Comida">Comida</option>
    <option value = "Bebida">Bebida</option>
    <option value = "Sobremesa">Sobremesa</option>
</select>
<input type="number" step="0.01" name="Prodvalue" placeholder="Valor do produto:" value= "{{old('Prodvalue')}}">
<button type="submit">ConfirmarEdição</button>
</form>
</div>
</div>
</div>
@endsection
