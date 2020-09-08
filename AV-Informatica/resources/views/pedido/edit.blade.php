@extends('layouts.app')

@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Cadastrar novo pedido</div>
                    <div class="card-body">
                        <form action="/pedido/{{$pedido->id}}" method="post" id="formulario">
                        @csrf
                        @method('PUT')
                            <div class="form-group">
                            <label for="costumer">Cliente</label>
                                <select class="form-control" name="costumer" id="costumer">
                                @foreach($costumers as $costumer)
                                    <option value="{{$costumer->id}}" onclick="atualizarCliente({{$costumer->id}})">{{$costumer->nome}}</option>
                                @endforeach
                                </select>
                            </div>
                            <input type="hidden" name="cliente" id="cliente" value="{{$pedido->costumer->id ?? old('$pedido->costumer->id')}}" alt="{{$pedido->costumer->descontoPadrao}}">
                            <div class="form-group">
                            <label for="product">Produtos</label>
                            <select class="form-control" name="products" id="products" >
                                <option value="0">Selecione um produto</option>
                                @foreach($products as $product)
                                    <option value="{{$product->descricao}}" id="{{$product->id}}" onclick="adicionarProduto(this.value,this.id,{{$product->preco}})">{{$product->descricao}}</option>
                                @endforeach
                                </select>
                            </div>
                            <ul class="list-group" id="listaProdutos">
                                @foreach($pedido->products as $product)
                                <p>{{$product->descricao}} (insira as quantidades novamente)</p>
                                <li class='list-group-item'>                    
                                    <label for='preco'>Preço</label>
                                    <input type='text' class='form-control' id='preco{{$product->id}}' name='valor' value='{{$product->preco}}'  readonly="true">
                                    <label for='quantidade'>Quantidade</label>
                                    <input type='text' class='form-control' id='quantidade{{$product->id}}' name='valor' value='' onclick="adicionarNaLista({{$product->id}})">
                                    <label for='desconto'>Desconto</label>
                                    <input type='text' class='form-control' id='desconto{{$product->id}}' name='valor' value='{{$pedido->costumer->descontoPadrao}}' readonly>                 
                                </li>
                                <input type='hidden' name="{{$product->id}}" id='cliente' value="{{$product->id}}">
                                @endforeach
                            </ul>
                            <div class="form-group" id="calculo">
                            <input id="calcular" class="btn btn-primary mt-4 mb-3" type="button" value="Calcular pedido" onclick="calcularValor()"> <br>
                            <label for="valor">Valor</label>
                                <input type="text" class="form-control{{$errors->has('valor') ? ' border-danger' : '' }}" id="valorTotal" name="valorTotal" value="{{$pedido->valor ?? old('valor')}}" readonly>
                            </div>
                            <input id="atualizarPedido" class="btn btn-primary mt-4" type="submit" value="Atualizar pedido">
                        </form>
                        <a class="btn btn-primary float-right" href="/pedido"><i class="fas fa-arrow-circle-up"></i> Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>   
@endsection