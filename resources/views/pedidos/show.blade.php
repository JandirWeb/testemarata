@extends('layouts.main')

@section('title',  'Pedido nº '. $pedido->id)

@section('content')

<div id="titulo" class="col-md-12">
    <h1>Exibindo Pedido nº {{ $pedido->id}}</h1>
</div>

<div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-5">
        @php
        $user = DB::table('clientes')->where('id', $pedido->cliente_id)->first();
        if ($user != null){
          echo $user->name;
        }else{
          echo "O cliente foi excluído";
        }
        @endphp
        </h1>
      <p class="lead"><span class="topico"><ion-icon name="call"></ion-icon>Telefone: &nbsp;</span>
        @php
        $user = DB::table('clientes')->where('id', $pedido->cliente_id)->first();
        if ($user != null){
          echo $user->fone;
        }else{
          echo "O cliente foi excluído";
        }
        @endphp
      </p>
      <p class="lead"><span class="topico"><ion-icon name="pin"></ion-icon>Endereço: &nbsp; </span>
        @php
        $user = DB::table('clientes')->where('id', $pedido->cliente_id)->first();
        if ($user != null){
          echo $user->address;
        }else{
          echo "O cliente foi excluído";
        }        
        @endphp
      </p>
      <p class="lead"><span class="topico"><ion-icon name="calendar"></ion-icon>Data do pedido: &nbsp; </span> {{date('d/m/Y', strtotime($pedido->created_at))}}</p>

      <div id="products-list" class="col-md-12">
    
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Produto</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Imagem</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pedido->itens as $item)

                  @php
                    $product = DB::table('produtos')->where('id', $item)->first();
                  @endphp

                  @php
                    if ($product != null){
                      echo "
                      
                      <tr>
                        <td>$product->name</td>
                        <td>$product->description</td>
                        <td>R$ $product->price</td>
                        <td><img src=\"/img/produtos/$product->img\" class=\"img-fluid\" alt=\"$product->name\"></td>
                      </tr>
                      
                      ";
                    }
                  @endphp

                @endforeach          
            </tbody>
           
        </table>
    </div>

      <hr class="my-4">

        <p>Deseja Excluir este pedido?</p>
        <form action="/pedidos/delete/{{ $pedido->id }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash"></ion-icon>Excluir</button>
        </form>


    </div>
</div>


@endsection