@extends('layouts.main')

@section('title', $cliente->name)

@section('content')

<div id="titulo" class="col-md-12">
    <h1>Exibindo Cliente {{ $cliente->name}}</h1>
</div>

<div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-5">{{$cliente->name}}</h1>
      <p class="lead"><span class="topico"><ion-icon name="call"></ion-icon>Telefone: </span>{{$cliente->name}}</p>
      <p class="lead"><span class="topico"><ion-icon name="pin"></ion-icon>Endereço: </span>{{$cliente->address}}</p>

      <hr class="my-4">
      <p>Deseja alterar as informações deste cliente?</p>
      <a href="/clientes/edit/{{ $cliente->id }}" class="btn btn-info edit-btn"><ion-icon name="create"></ion-icon> Editar</a>
    </div>
</div>


@endsection