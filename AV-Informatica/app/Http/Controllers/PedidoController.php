<?php

namespace App\Http\Controllers;

use App\Pedido;
use App\Costumer;
use App\Product;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::all();
        return view('pedido.index')->with([
            'pedidos' => $pedidos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $costumers = Costumer::all();
        $products = Product::all();
        return view('pedido.create')->with([
            'costumers' => $costumers,
            'products' => $products
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'valorTotal' => 'required'
        ]);
        $pedido = new Pedido([
            'valor' => $request->valorTotal,            
            'costumer_id' => $request->cliente            
        ]);
        $pedido->save();
        $products = Product::all();
        foreach($products as $product){
            $idProduto = $product->id;
            if($request->$idProduto){
                $pedido->products()->attach($product->id);
            }
        }
        

        return $this->index()->with([
            'message_success'=> "O pedido foi criado."
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        return view('pedido.show')->with([
            'pedido' => $pedido
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        $costumers = Costumer::all();
        $products = Product::all();
        return view('pedido.edit')->with([
            'pedido' => $pedido,
            'costumers' => $costumers,
            'products' => $products
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        $request->validate([
            'valorTotal' => 'required'
        ]);
        $pedido->update([
            'valor' => $request->valorTotal,            
            'costumer_id' => $request->cliente            
        ]);


        $products = Product::all();
        foreach($products as $product){
            $pedido->products()->detach($product->id);
        }
        
        foreach($products as $product){
            $idProduto = $product->id;
            if($request->$idProduto){
                $pedido->products()->attach($product->id);
            }
        }

        return $this->index()->with([
            'message_success'=> "O pedido foi atualizado." 
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        $pedido->delete();

        return $this->index()->with([
            'message_success'=> "O pedido foi deletado." 
        ]);
    }
}
