
@extends ('Layouts.app')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
@section('title', 'Excluir Usuários')
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
<h1>Excluir Usuários</h1>
  </div>
  <br>

@if ($errors->any())
<ul>
@foreach($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
</ul>
@endif

<!--<form action="{{route('allusers.destroy', $id)}}" method="post">
    @csrf
    @method('delete')
    <input type="number" name="UserId" placeholder="ID do usuário:">
    
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">DeletarUsuário</button>

</form>-->

<!-- Button trigger modal -->
<button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
    Excluir Usuário
  </button>
  
  <!-- Modal -->
  <div class="modal  fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="{{route('allusers.destroy', $id)}}" method="post">
            @csrf
            @method('delete')
            
        
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Deseja mesmo excluir o Usuário?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Insira o ID do Usuário para exclusão.
          <input type="number" name="UserId" placeholder="ID do usuário:">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Fechar</button>
          <button type="submit" class="btn btn-warning">Sim , Deletar</button>
        </form>
        </div>
      </div>
    </div>
  </div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</div>
@endsection