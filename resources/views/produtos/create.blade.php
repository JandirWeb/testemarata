@extends('layouts.main')

@section('title', 'Cadastrar produto')

@section('content')

<div id="titulo" class="col-md-12">
    <h1>Cadastrar Produto</h1>
</div>

<div id="produto-create-container" class="col-md-6 offset-md-3">
    <h1>Cadastre um novo produto</h1>
    <form action="/produtos" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="img">Imagem do produto:</label>
            <input type="file" id="img" name="img" class="form-control-file">
        </div>

        <div class="form-group">
            <label for="nome">Produto:</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Produto..">
        </div>

        <div class="form-group form-inline">
            <label for="descricao">Descrição do produto:</label>
            <textarea class="form-control" name="descricao" id="descricao" cols="80" rows="5" placeholder="Descrição do produto..."></textarea>
        </div>

        <div class="form-group">
            <label for="preco">Preço:</label>
            <input type="text" class="form-control" id="preco" name="preco" placeholder="R$...">
        </div>

        <input type="submit" class="btn btn-primary" value="Criar Produto">

    </form>
</div>

@endsection