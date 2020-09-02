@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">{{ __('Detalhes do produto') }}</div>
                    <div class="card-body">
                        <b>Descrição: {{$product->descricao}}</b>
                        <p>Fabricante: {{$product->fabricante}}</p>
                    </div>
            </div>
            <div class="mt-2">
                <a class='btn btn-success btn-sm' href="/product">Voltar</a>
            </div>
        </div>
    </div>
</div>
@endsection