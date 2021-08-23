@extends('layouts.main')

@section('title', 'Realizar Pedido')

@section('content')

<div id="titulo" class="col-md-12">
    <h1>Realizando pedido para {{$cliente->name}}</h1>
</div>

<div id="products-list" class="col-md-12">
    <form class="col-md-12" action="/pedidos/create" method="POST">
        @csrf
        <input hidden id="cliente_id" name="cliente_id" value="{{$cliente->id}}">
        <table class="table tabelas">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Produto</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Imagem</th>
                    <th scope="col">Add</th>
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
                        <td><input type="checkbox" name="itens[]" value="{{$produto->id}}"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <input type="submit" class="btn btn-primary" value="Finalizar Pedido">
    </form>
</div>

@endsection