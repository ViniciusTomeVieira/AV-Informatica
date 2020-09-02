@extends('layouts.app')

@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Cadastrar novo produto</div>
                    <div class="card-body">
                        <form action="/product" method="post" id="formulario">
                        @csrf
                            <div class="form-group">
                                <label for="descricao">Descrição</label>
                                <input type="text" class="form-control{{$errors->has('descricao') ? ' border-danger' : '' }}" id="descricao" name="descricao" value="{{old('descricao')}}">
                                <small class="form-text text-danger">{!! $errors->first('descricao') !!}</small>
                            </div>
                            <div class="form-group">
                                <label for="fabricante">Fabricante</label>
                                <input type="text" class="form-control{{$errors->has('fabricante') ? ' border-danger' : '' }}" id="fabricante" name="fabricante" value="{{old('fabricante')}}">                                <small class="form-text text-danger">{!! $errors->first('fabricante') !!}</small>
                            </div>
                            <input id="send" class="btn btn-primary mt-4" type="submit" value="Salvar produto">
                        </form>
                        <a class="btn btn-primary float-right" href="/product"><i class="fas fa-arrow-circle-up"></i> Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>   
@endsection