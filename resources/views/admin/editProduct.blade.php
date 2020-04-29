@extends ('Layouts.app')

@section('title', 'Editar Produto')
@section('content')

<h1>Editar Produtos</h1>

@if ($errors->any())
<ul>
@foreach($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
</ul>
@endif

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
<input type="number" name="Prodvalue" placeholder="Valor do produto:" value= "{{old('Prodvalue')}}">
<button type="submit">ConfirmarEdição</button>
</form>
@endsection
