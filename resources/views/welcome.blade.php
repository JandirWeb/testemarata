@extends('layouts.main')

@section('title', 'Cadastro de pedidos')

@section('content')


<div class="jumbotron jumbotron-fluid">
@auth
<div class="container">
  <h1 class="display-5">Seja Bem Vindo!</h1>
  <span class="topico">Sistema de registro de pedidos de compra.</span>

</div>
@endauth

  @guest
  <div class="container">
    <h1 class="display-5">Sistema Restrito!</h1>
    <span class="topico">Faça login ou registre-se para acessar o painel</span>

  </div>
  @endguest
    
</div>
@endsection
        

