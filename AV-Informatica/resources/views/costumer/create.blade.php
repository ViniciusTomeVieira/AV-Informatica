@extends('layouts.app')

@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Cadastrar novo cliente</div>
                    <div class="card-body">
                        <form action="/costumer" method="post" id="formulario">
                        @csrf
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input type="text" class="form-control{{$errors->has('nome') ? ' border-danger' : '' }}" id="nome" name="nome" value="{{old('nome')}}">
                                <small class="form-text text-danger">{!! $errors->first('nome') !!}</small>
                            </div>
                            <div class="form-group">
                                <label for="cpf">Cpf</label>
                                <input type="text" class="form-control{{$errors->has('cpf') ? ' border-danger' : '' }}" id="cpf" name="cpf" value="{{old('cpf')}}">                                <small class="form-text text-danger">{!! $errors->first('fabricante') !!}</small>
                            </div>
                            <div class="form-group">
                                <label for="numero">Numero</label>
                                <input type="text" class="form-control{{$errors->has('numero') ? ' border-danger' : '' }}" id="numero" name="numero" value="{{old('numero')}}">                                <small class="form-text text-danger">{!! $errors->first('fabricante') !!}</small>
                            </div>
                            <div class="form-group">
                                <label for="logradouro">Logradouro</label>
                                <input type="text" class="form-control{{$errors->has('logradouro') ? ' border-danger' : '' }}" id="logradouro" name="logradouro" value="{{old('logradouro')}}">                                <small class="form-text text-danger">{!! $errors->first('fabricante') !!}</small>
                            </div>
                            <div class="form-group">
                                <label for="bairro">Bairro</label>
                                <input type="text" class="form-control{{$errors->has('bairro') ? ' border-danger' : '' }}" id="bairro" name="bairro" value="{{old('bairro')}}">                                <small class="form-text text-danger">{!! $errors->first('fabricante') !!}</small>
                            </div>
                            <div class="form-group">
                                <label for="cidade">Cidade</label>
                                <input type="text" class="form-control{{$errors->has('cidade') ? ' border-danger' : '' }}" id="cidade" name="cidade" value="{{old('cidade')}}">                                <small class="form-text text-danger">{!! $errors->first('fabricante') !!}</small>
                            </div>
                            <div class="form-group">
                                <label for="estado">Estado</label>
                                <input type="text" class="form-control{{$errors->has('estado') ? ' border-danger' : '' }}" id="estado" name="estado" value="{{old('estado')}}">                                <small class="form-text text-danger">{!! $errors->first('fabricante') !!}</small>
                            </div>
                            <div class="form-group">
                                <label for="cep">Cep</label>
                                <input type="text" class="form-control{{$errors->has('cep') ? ' border-danger' : '' }}" id="cep" name="cep" value="{{old('cep')}}">                                <small class="form-text text-danger">{!! $errors->first('fabricante') !!}</small>
                            </div>
                            <input id="send" class="btn btn-primary mt-4" type="submit" value="Salvar cliente">
                        </form>
                        <a class="btn btn-primary float-right" href="/costumer"><i class="fas fa-arrow-circle-up"></i> Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>   
@endsection