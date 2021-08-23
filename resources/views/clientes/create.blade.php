@extends('layouts.main')

@section('title', 'Criar Cliente')

@section('content')

<div id="titulo" class="col-md-12">
    <h1>Cadastrar Cliente</h1>
</div>

<div id="produto-create-container" class="col-md-6 offset-md-3">
    <h1>Cadastre um novo cliente</h1>
    <form action="/clientes" method="POST">
        @csrf

        <div class="form-group">
            <label for="nome">Nome Completo:</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome completo do cliente...">
        </div>

        <div class="form-group">
            <label for="fone">Telefone:</label>
            <input type="text" class="form-control" id="fone" name="fone" placeholder="(xx)x xxxx-xxxx">
        </div>

        <div class="form-group">
            <label for="endereco">Endereço:</label>
            <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço...">
        </div>

        <input type="submit" class="btn btn-primary" value="Cadastrar Cliente">

    </form>
</div>

@endsection