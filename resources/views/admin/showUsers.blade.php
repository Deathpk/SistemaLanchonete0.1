@extends ('Layouts.app')

@section('title', 'Lista de Usuários')

@section('content')


<h1>Lista de  Usuários</h1>

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
<h3>Usuários Cadastrados: </h3>
@foreach($allUsers as $users)
<li>Nome do usuário: {{$users->name}} | Email: {{$users->email}} </li>
@endforeach

@endsection
