@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">{{ __('Detalhes do pedido') }}</div>
                    <div class="card-body">
                        <b>Cliente: {{$pedido->costumer->nome}}</b><br>
                        <b>Produtos: </b><br>
                        @foreach($pedido->products as $product)
                            <b>{{$product->descricao}}</b> 
                            <p>Fabricante: {{$product->fabricante}}</p>
                            <br>
                        @endforeach
                        <p><b>Valor do pedido: </b>{{$pedido->valor}}</p>
                    </div>
            </div>
            <div class="mt-2">
                <a class='btn btn-success btn-sm' href="/pedido">Voltar</a>
            </div>
        </div>
    </div>
</div>
@endsection