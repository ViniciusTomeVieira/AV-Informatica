@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">{{ __('Todos os produtos') }}</div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($products as $product)
                                <li class="list-group-item">
                                   <a href="/product/{{$product->id}}" title="Mostrar produto">{{$product->descricao}}</a> 
                                   <a class="btn btn-sm btn-light ml-2" href="/product/{{$product->id}}/edit">Editar Produto</a> 
                                   <form class="float-right" style="display: inline" action="/product/{{$product->id}}" method="post">
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
                <a class='btn btn-success btn-sm' href="/product/create">Adicionar Produto</a>
            </div>
        </div>
    </div>
</div>
@endsection