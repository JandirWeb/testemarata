@extends('layouts.main')

@section('title', 'Realizar Pedido')

@section('content')

<div id="titulo" class="col-md-12">
  
    <h1>Realizar Pedido</h1>

</div>

<div id="products-list" class="col-md-12">

    <table class="table tabelas">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Telefone</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
            <tr>
                <th scope="row"> {{ $cliente->id }} </th>
                <td>{{ $cliente->name }}</td>
                <td>{{ $cliente->fone }}</td>
                <td><a href="/pedidos/{{ $cliente->id }}" class="btn btn-primary">Realizar Pedido</a></td>
            </tr>
             @endforeach

        </tbody>
    </table>
</div>

@endsection