@extends ('Layouts.app')

@section('title', 'Editar Dados de Usuário')
<style>
    body  {
      background-image: url("/SistemaLanchonete0.1/images/AdminBackground.jpg");
      	
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
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
<h1>Editar Roles</h1>
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
<form action="{{route('allusers.update', $id)}}" method="post">
    @csrf
    @method('PUT')
    <input type="number" name="UserId" placeholder="ID do usuário?:">
<input type="number" name="UserRole" placeholder="Role de usuário:">
<button type="submit">ConfirmarEdição</button>
</form>
</div>
</div>
</div>
@endsection