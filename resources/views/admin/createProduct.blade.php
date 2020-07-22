@extends ('Layouts.app')

@section('title', 'Novo Produto')
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
        <h1>Adicionar Produtos</h1>
    </div>
    <br>
    @if ($errors->any())
    @foreach($errors->all() as $msg)
    <div class="alert alert-danger">
    {{$msg}}
    </div>
    @endforeach
    @endif


    @if(isset($error))
    <div class="alert alert-danger">
        {{$error}}
    </div>
    @endif
    
    @if(isset($success))
    <div class="alert alert-success">
        {{$success}}
    </div>
    @endif   
        
    <br>
<div class="card" id="item">
    <div class="card-body">
<form action="{{route('products.store')}}" method="post">
    @csrf
<input type="number" name="Prodid" placeholder="ID do produto:" value="{{old('Prodid')}}">
<input type="text" name = "Prodname" placeholder="Nome do Produto: " value = "{{old('Prodname')}}">
<select id = "Prodtype" name="Prodtype" >
    <option value = "default">Selecione o Tipo do Produto</option>
    <option value = "Comida">Comida</option>
    <option value = "Bebida">Bebida</option>
    <option value = "Sobremesa">Sobremesa</option>
</select>
<input type="number" step="0.01" name="Prodvalue" placeholder="Valor do produto:" value= "{{old('Prodvalue')}}">
<button type="submit">Cadastrar</button>
</form>
</div>
</div>
    </div>
@endsection
