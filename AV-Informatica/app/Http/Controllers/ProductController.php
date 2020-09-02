<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index')->with([
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
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
            'descricao' => 'required|min:2',
            'fabricante' => 'required|min:2'
        ]);
        $product = new Product([
            'descricao' => $request->descricao,
            'fabricante' => $request->fabricante
        ]);
        $product->save();

        return $this->index()->with([
            'message_success'=> "O produto <b>".$product->descricao. "</b> foi criado."
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('product.show')->with([
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product.edit')->with([
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'descricao' => 'required|min:2',
            'fabricante' => 'required|min:2'
        ]);

        $product->update([
            'descricao' => $request->descricao,
            'fabricante' => $request->fabricante
        ]);

        return $this->index()->with([
            'message_success'=> "O produto <b>".$product->descricao. "</b> foi atualizado." 
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $oldName = $product->descricao;
        $product->delete();

        return $this->index()->with([
            'message_success'=> "O produto <b>".$oldName. "</b> foi deletado." 
        ]);
    }
}
