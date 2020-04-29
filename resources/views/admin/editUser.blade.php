@extends ('Layouts.app')

@section('title', 'Editar Dados de Usuário')
@section('content')

<h1>Editar Roles</h1>

@if ($errors->any())
<ul>
@foreach($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
</ul>
@endif

<form action="{{route('allusers.update', $id)}}" method="post">
    @csrf
    @method('PUT')
    <input type="number" name="UserId" placeholder="ID do usuário?:">
<input type="number" name="UserRole" placeholder="Role de usuário:">
<button type="submit">ConfirmarEdição</button>
</form>
@endsection