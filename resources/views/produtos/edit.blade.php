@extends('layouts.main')

@section('title', 'Editando'. $produto->name)

@section('content')

<div id="titulo" class="col-md-12">
    <h1>Editar {{ $produto->name }}</h1>
</div>

<div id="produto-create-container" class="col-md-6 offset-md-3">
    <h1>Editando {{ $produto->name }}</h1>
    <form action="/produtos/update/{{ $produto->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="img">Imagem do produto:</label>
            <input type="file" id="img" name="img" class="form-control-file">
            <img src="/img/produtos/{{ $produto->img }}" alt="{{ $produto->name }}" class="img-preview">
        </div>

        <div class="form-group">
            <label for="nome">Produto:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nome do Produto..." value="{{ $produto->name }}">
        </div>

        <div class="form-group form-inline">
            <label for="descricao">Descrição do produto:</label>
            <textarea class="form-control" name="description" id="description" cols="80" rows="5" placeholder="Descrição do produto...">{{ $produto->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="preco">Preço:</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="R$..." value="{{ $produto->price }}">
        </div>

        <input type="submit" class="btn btn-primary" value="Editar Produto">

    </form>
</div>

@endsection