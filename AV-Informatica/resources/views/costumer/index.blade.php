@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">{{ __('Todos os clientes') }}</div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($costumers as $costumer)
                                <li class="list-group-item">
                                   <a href="/costumer/{{$costumer->id}}" title="Mostrar produto">{{$costumer->nome}}</a> 
                                   <a class="btn btn-sm btn-light ml-2" href="/costumer/{{$costumer->id}}/edit">Editar Cliente</a> 
                                   <form class="float-right" style="display: inline" action="/costumer/{{$costumer->id}}" method="post">
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
                <a class='btn btn-success btn-sm' href="/costumer/create">Adicionar Cliente</a>
            </div>
        </div>
    </div>
</div>
@endsection