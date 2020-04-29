@extends ('Layouts.app')

@section('title', 'Novo Produto')
@section('content')

<h1>Adicionar Produtos</h1>

@if ($errors->any())
<ul>
@foreach($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
</ul>
@endif

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
@endsection
