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
  
<!-- Fechamento do Dia -->
<div class="container-fluid" id= "Menu">
<div class="card text-center">
  <h1>Fechamento do Dia </h1>
  <div class="card-body">

    <form action="{{route('admin.day')}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="daySelect">Selecione o Dia para exibição do Fechamento</label>
            <select class="form-control" name ="daySelect"id="daySelect">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
              <option>6</option>
              <option>7</option>
              <option>8</option>
              <option>9</option>
              <option>10</option>
              <option>11</option>
              <option>12</option>
              <option>13</option>
              <option>14</option>
              <option>15</option>
              <option>16</option>
              <option>17</option>
              <option>18</option>
              <option>19</option>
              <option>20</option>
              <option>21</option>
              <option>22</option>
              <option>23</option>
              <option>24</option>
              <option>25</option>
              <option>26</option>
              <option>27</option>
              <option>28</option>
              <option>29</option>
              <option>30</option>
              <option>31</option>
            </select>
          </div>
      <button type="submit">Selecionar</button>
        </form>

    <br>
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