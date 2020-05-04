@extends ('Layouts.app')

@section('title', 'Lista de Usuários')
<style>
     body  {
      background-image: url("/SistemaLanchonete0.1/images/AdminBackground.jpg");
      	
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    }
    #users{
        font-weight: bold;
        font-size: 120%;
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
<h1>Lista de  Usuários</h1>
    </div>

@if ($errors->any())
<ul>
@foreach($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
</ul>
@endif
<br>
<br>

<!--  Usuários  -->
<div class="card" id="item">
    <div class="card-body">
<h3>Usuários Cadastrados: </h3>
@foreach($allUsers as $users)
<li id="users">Nome do usuário: {{$users->name}} | Email: {{$users->email}} </li>
@endforeach
</div>
</div>
</div>
@endsection
