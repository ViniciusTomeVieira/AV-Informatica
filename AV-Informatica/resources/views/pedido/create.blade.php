@extends('layouts.app')

@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Cadastrar novo pedido</div>
                    <div class="card-body">
                        <form action="/pedido" method="post" id="formulario">
                        @csrf
                            <div class="form-group">
                            <label for="costumer">Cliente</label>
                                <select class="form-control" name="costumer" id="costumer">
                                @foreach($costumers as $costumer)
                                    <option value="{{$costumer->id}}" id="{{$costumer->descontoPadrao}}" onclick="atualizarCliente(this.value,this.id)">{{$costumer->nome}}</option>
                                @endforeach
                                </select>
                            </div>
                            <input type="hidden" name="cliente" id="cliente" value="" alt="">
                            <div class="form-group">
                            <label for="product">Produtos</label>
                            <select class="form-control" name="products" id="products" >
                                <option value="0">Selecione um produto</option>
                                @foreach($products as $product)
                                    <option value="{{$product->descricao}}" id="{{$product->id}}"  onclick="adicionarProduto(this.value,this.id,{{$product->preco}})">{{$product->descricao}}</option>
                                @endforeach
                                </select>
                            </div>
                            <ul class="list-group" id="listaProdutos">
                            
                            </ul>
                            <div class="form-group" id="calculo">
                            <input id="calcular" class="btn btn-primary mt-4 mb-3" type="button" value="Calcular pedido" onclick="calcularValor()"> <br>
                            <label for="valor">Valor</label>
                                <input type="text" class="form-control{{$errors->has('valor') ? ' border-danger' : '' }}" id="valorTotal" name="valorTotal" value="" readonly>
                            </div>
                            <input id="salvarPedido" class="btn btn-primary mt-4" type="submit" value="Salvar pedido">
                        </form>
                        <a class="btn btn-primary float-right" href="/pedido"><i class="fas fa-arrow-circle-up"></i> Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>   
@endsection