@extends('layouts.main')

@section('title', 'Listar Clientes')

@section('content')

<div id="titulo" class="col-md-12">
  
    <h1>Lista de clientes</h1>
    <div class="float-right">
        <a href="/clientes/create" class="btn btn-primary">Cadastrar Clientes</a>
    </div>

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
                <td>
                    <a href="/clientes/cliente{{ $cliente->id }}" class="btn btn-primary">Ver Detalhes</a>
                
                    <a href="/clientes/edit/{{ $cliente->id }}" class="btn btn-info edit-btn"><ion-icon name="create"></ion-icon> Editar</a>
                    <form action="/clientes/{{ $cliente->id }}" method="POST">
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