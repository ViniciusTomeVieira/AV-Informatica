@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">{{ __('Detalhes do produto') }}</div>
                    <div class="card-body">
                        <b>Nome: {{$costumer->nome}}</b>
                        <p>Cpf: {{$costumer->cpf}}</p>
                        <p>Logradouro: {{$costumer->logradouro}}</p>
                        <p>Numero: {{$costumer->numero}}</p>
                        <p>Bairro: {{$costumer->bairro}}</p>
                        <p>Cidade: {{$costumer->cidade}}</p>
                        <p>Cep: {{$costumer->cep}}</p>
                        <p>Estado: {{$costumer->estado}}</p>
                        <p>Desconto Padrão: {{$costumer->descontoPadrao}}</p>
                    </div>
            </div>
            <div class="mt-2">
                <a class='btn btn-success btn-sm' href="/costumer">Voltar</a>
            </div>
        </div>
    </div>
</div>
@endsection