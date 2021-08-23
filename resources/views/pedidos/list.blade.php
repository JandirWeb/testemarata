@extends('layouts.main')

@section('title', 'Pedidos')

@section('content')

<div id="titulo" class="col-md-12">
    
    <h1>Pedidos</h1>

    <div class="float-right">    
        <a href="/pedidos/create" class="btn btn-primary floar-right">Realizar Pedido</a>
    </div>
        
</div>

<div id="products-list" class="col-md-12">
    <table id="tabela-pedidos" class="table tabelas">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Data</th>
                <th scope="col">Cliente</th>
                <th scope="col">Status</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>                
            
            @foreach ($pedidos as $pedido)
                
            <tr>
                <th scope="row"> {{ $pedido->id }} </th>
                <td>{{ date('d/m/Y', strtotime($pedido->created_at)) }}</td>
                <td>
                        
                    @php                    
                        $user = DB::table('clientes')->where('id', $pedido->cliente_id)->first();
                        if ($user != null){
                        echo $user->name;
                        }else{
                            echo "O cliente foi excluído";
                        }
                    @endphp

                </td>
                <td> 
                    @if ($pedido->status == "1")
                    <p>Aberto</p>                        
                    @elseif($pedido->status == "2")
                    <p>Pago</p>
                    @elseif($pedido->status == "3")
                    <p>Cancelado</p>                        
                    @else
                    <p>Não informado</p> 
                    @endif
                        
                </td>
                <td>
                    <a href="/pedidos/list/{{ $pedido->id }}" class="btn btn-primary">Ver Detalhes</a>
        
                    <form action="/pedidos/delete/{{ $pedido->id }}" method="POST">
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