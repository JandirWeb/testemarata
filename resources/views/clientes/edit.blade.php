@extends('layouts.main')

@section('title', 'Editar Cliente')

@section('content')

<div id="titulo" class="col-md-12">
    <h1>Editando Cliente {{ $cliente->name }}</h1>
</div>

<div id="produto-create-container" class="col-md-6 offset-md-3">
    <h1>Editar {{ $cliente->name }}</h1>
    <form action="/clientes/update/{{ $cliente->id }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nome">Nome Completo:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nome completo do cliente..." value="{{ $cliente->name }}">
        </div>

        <div class="form-group">
            <label for="fone">Telefone:</label>
            <input type="text" class="form-control" id="fone" name="fone" placeholder="(xx)x xxxx-xxxx" value="{{ $cliente->fone }}">
        </div>

        <div class="form-group">
            <label for="endereco">Endereço:</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Endereço..." value="{{ $cliente->address }}">
        </div>

        <input type="submit" class="btn btn-primary" value="Editar Cliente">

    </form>
</div>

@endsection