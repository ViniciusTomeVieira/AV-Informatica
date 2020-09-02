@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Editar Produto</div>
                    <div class="card-body">
                        <form action="/product/{{$product->id}}" method="post">
                        @csrf
                        @method('PUT')
                            <div class="form-group">
                                <label for="descricao">Descricao</label>
                                <input type="text" class="form-control{{$errors->has('descricao') ? ' border-danger' : '' }}" id="descricao" name="descricao" value="{{$product->descricao ?? old('descricao')}}">
                                <small class="form-text text-danger">{!! $errors->first('descricao') !!}</small>
                            </div>
                            <div class="form-group">
                                <label for="fabricante">Fabricante</label>
                                <input type="text" class="form-control{{$errors->has('fabricante') ? ' border-danger' : '' }}" id="fabricante" name="fabricante" value="{{$product->fabricante ?? old('fabricante')}}">
                                <small class="form-text text-danger">{!! $errors->first('fabricante') !!}</small>
                            </div>
                            <input class="btn btn-primary mt-4" type="submit" value="Salvar produto">
                        </form>
                        <a class="btn btn-primary float-right" href="/product"><i class="fas fa-arrow-circle-up"></i> Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection