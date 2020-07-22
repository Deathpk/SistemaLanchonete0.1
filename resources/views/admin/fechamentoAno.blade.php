@extends ('Layouts.app')

@section('title', 'Financeiro')
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
  <!-- endNavbar (sit on top) -->
  
<!-- Fechamento do Ano -->
<div class="container-fluid" id= "fechamentoResult">
<div class="card text-center">
  <h1>Fechamento do Ano {{$year}} </h1>
  <div class="card-body">
    <h2 style="font-family: 'Lobster', cursive">Total de Lucros: </h2>
    <br>
    <h3 style="font-family: 'Lobster', cursive">{{$totalYear}} R$</h3>
  </div>
</div>
</div>
  
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
@endsection

