@extends('layouts.main')

@section('title', 'Produtos')

@section('content')

<div id="titulo" class="col-md-12">
    
    <h1>Página de Produtos</h1>

    <div class="float-right">
        <a href="/produtos/create" class="btn btn-primary">Cadastrar Produto</a>
    </div>
        
</div>

<div id="products-list" class="col-md-12">
    
    <table class="table tabelas">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Produto</th>
                <th scope="col">Descrição</th>
                <th scope="col">Preço</th>
                <th scope="col">Imagem</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produtos as $produto)
            <tr>
                <th scope="row"> {{ $produto->id }} </th>
                <td>{{ $produto->name }}</td>
                <td>{{ $produto->description }}</td>
                <td>R$ {{ $produto->price }}</td>
                <td><img src="/img/produtos/{{ $produto->img }}" class="img-fluid" alt="{{$produto->name}}"> </td>
                <td>
                    <a href="/produtos/edit/{{ $produto->id }}" class="btn btn-info edit-btn"><ion-icon name="create"></ion-icon> Editar</a>
                    <form action="/produtos/{{ $produto->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash"></ion-icon>Excluir</button>
                    </form>
                </td>
            </tr>
             @endforeach

        </tbody>
       
    </table>
</div>
@endsection