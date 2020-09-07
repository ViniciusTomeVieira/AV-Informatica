@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">{{ __('Todos os pedidos') }}</div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($pedidos as $pedido)
                                <li class="list-group-item">
                                   <a href="/pedido/{{$pedido->id}}" title="Mostrar pedido">{{$pedido->costumer->nome}}</a> 
                                   <a class="btn btn-sm btn-light ml-2" href="/pedido/{{$pedido->id}}/edit">Editar Pedido</a> 
                                   <form class="float-right" style="display: inline" action="/pedido/{{$pedido->id}}" method="post">
                                        @csrf 
                                        @method('DELETE')
                                        <input class="btn btn-sm btn-outline-danger" type="submit" value="Deletar">
                                   </form>
                                </li>
                            @endforeach
                        </ul>
                    </div>
            </div>           
        <div class="mt-2">
                <a class='btn btn-success btn-sm' href="/pedido/create">Adicionar Pedido</a>
            </div>
        </div>
    </div>
</div>
@endsection