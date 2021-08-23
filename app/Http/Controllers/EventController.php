<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Cliente;
use App\Models\Pedido;

class EventController extends Controller
{
    
    public function index(){
        return view('welcome');
    }

    public function storeProduto(Request $request){
        $produto = new Produto;

        $produto->name = $request->nome;
        $produto->description = $request->descricao;
        $produto->price = $request->preco;
        
        //upload img
        if($request->hasFile('img') && $request->file('img')->isValid()){

            $requestImg = $request->img;

            $extension = $requestImg->extension();

            $imgName = md5($requestImg->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $request->img->move(public_path('img/produtos'), $imgName);

            $produto->img = $imgName;
        }
        
        $produto->save();

        return redirect('/produtos/list')->with('msg', 'Produto cadastrado com sucesso!');
    }

    public function createProduto(){
        return view('produtos.create');
    }


    public function listProdutos(){

            $produtos = Produto::all();

        return view('produtos.list', ['produtos' => $produtos]);
    }

    public function editProduto($id){

        $produto = Produto::findOrFail($id);

        return view('produtos/edit', ['produto' => $produto]);
    }

    public function updateProduto(Request $request) {

        $data = $request->all();

        //upload img
        if($request->hasFile('img') && $request->file('img')->isValid()){

            $requestImg = $request->img;

            $extension = $requestImg->extension();

            $imgName = md5($requestImg->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $request->img->move(public_path('img/produtos'), $imgName);

            $data['img'] = $imgName;
        }

        Produto::findOrFail($request->id)->update($data);
        
        return redirect('/produtos/list')->with('msg', 'Produto editado com sucesso!');
    }

    public function destroyProduto($id){

        Produto::findOrFail($id)->delete();

        return redirect('/produtos/list')->with('msg', 'Produto excluído com sucesso!');
    }

    
    public function storeCliente(Request $request){
        $cliente = new Cliente;

        $cliente->name = $request->nome;
        $cliente->fone = $request->fone;
        $cliente->address = $request->endereco;
        
        $cliente->save();

        return redirect('/clientes/list')->with('msg', 'Cliente cadastrado com sucesso!');
    }

    public function createCliente(){
        return view('clientes.create');
    }

    public function listClientes(){

            $clientes = Cliente::all();

        return view('clientes.list',['clientes' => $clientes]);

    }

    public function showCliente($id){
        $cliente = Cliente::findOrFail($id);

        return view('clientes.show', ['cliente' => $cliente]);
    }

    public function editCliente($id){

        $cliente = Cliente::findOrFail($id);

        return view('clientes.edit', ['cliente' => $cliente]);
    }

    public function updateCliente(Request $request) {

        Cliente::findOrFail($request->id)->update($request->all());
        
        return redirect('/clientes/list')->with('msg', 'Cliente editado com sucesso!');
    }

    public function destroyCliente($id){

        Cliente::findOrFail($id)->delete();

        return redirect('/clientes/list')->with('msg', 'Cliente excluído com sucesso!');
    }

    public function createPedido(){

        $clientes = Cliente::all();

    return view('pedidos.create',['clientes' => $clientes]);

    }

    public function realisePedido($id){
        $cliente = Cliente::findOrFail($id);
        $produtos = Produto::all();

        return view('pedidos.realise', ['produtos' => $produtos, 'cliente' => $cliente]);

    }

    public function storePedido(Request $request){
        $pedido = new Pedido;

        $pedido->cliente_id = $request->cliente_id;
        $pedido->status = $request->status;
        $pedido->itens = $request->itens;
        
        $pedido->save();

        return redirect('/pedidos/create')->with('msg', 'Pedido Realizado com Sucesso!');
    }

    public function listPedidos(){
        $pedidos = Pedido::all();
        $clientes = Cliente::all();

    return view('pedidos.list',['clientes' => $clientes, 'pedidos' => $pedidos]);
    }

    public function showPedido($id){
        $pedido = Pedido::findOrFail($id);

        return view('pedidos.show', ['pedido' => $pedido]);
    }

    public function destroyPedido($id){

        Pedido::findOrFail($id)->delete();

        return redirect('/pedidos/list')->with('msg', 'Pedido excluído com sucesso!');
    }

}
