@extends ('Layouts.app')

@section('title', 'Sistema de caixa')
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
    <h1>Produtos</h1>
    <div class="card-body">
 <!-- ItemSelected é o tipo de produto escolhido -->
   @foreach($itemSelected as $item) 
    <form action="{{route('Cart/Add')}}" method="post">
    @csrf
    @method('PUT')
     <select multiple class="form-control" id="produto" name="produto">
     <option value="{{$item->id}}" > ID: {{$item->id}}| {{$item->name}}| R$: {{$item->price}}</option>
     </select>
   <br>
   @endforeach
   <br>
 </div>
 <button type="submit" class="btn btn-primary">Adicionar</button>
</form>


@if ($errors->any())
<ul>
@foreach($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
</ul>
@endif
<br>

@endsection

