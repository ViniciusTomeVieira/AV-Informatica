<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AV Informatica') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script>
        $( document ).ready(function() {
            $('#cpf').mask('000.000.000-00');
            $('#cep').mask('00000-000');
            $('#salvarPedido').prop("disabled", true);
        });

        let idProdutos = 0;
        let listaProdutos = []
        function adicionarNaLista(id){
            listaProdutos.push(id)
        }
        function adicionarProduto(descricao,id){
            idProdutos+=1
            let produtos = document.getElementById("listaProdutos")
            produtos.innerHTML += "<p>"+descricao+"</p><li class='list-group-item'><form class='float-right' style='display: inline' action='' method='post'><label for='preco'>Preço</label><input type='text' class='form-control' id='preco"+id+"' name='valor' value='' onclick='adicionarNaLista("+id+")'><label for='quantidade'>Quantidade</label><input type='text' class='form-control' id='quantidade"+id+"' name='valor' value=''><label for='desconto'>Desconto</label><input type='text' class='form-control' id='desconto"+id+"' name='valor' value=''></form></li><input type='hidden' name='"+id+"' id='cliente' value='"+id+"'>" 
            
            //$("<div class='form-group'><p>"+descricao+"</p><li class='list-group-item'><form class='float-right' style='display: inline' action='' method='post'><label for='preco'>Preço</label><input type='text' class='form-control' id='preco"+idProdutos+"' name='valor' value=''><label for='quantidade'>Quantidade</label><input type='text' class='form-control' id='quantidade"+idProdutos+"' name='valor' value=''><label for='desconto'>Desconto</label><input type='text' class='form-control' id='desconto"+idProdutos+"' name='valor' value=''></form></li></div>" ).insertBefore("#valor");
            
        }

        function calcularValor(){
            let valorCompra = 0
                for (i = 0; i < listaProdutos.length; i++) {
                    let preco = document.getElementById("preco"+listaProdutos[i]).value
                    let quantidade = document.getElementById("quantidade"+listaProdutos[i]).value
                    let desconto = document.getElementById("desconto"+listaProdutos[i]).value 
                    if((preco/1 == preco) && (quantidade/1 == quantidade) && (desconto/1 == desconto)){   
                        let total = preco * quantidade
                        let valorDescontado = total * (desconto/100)
                        total = total - valorDescontado
                        valorCompra+= total 
                    }else{
                        alert('Existe algum valor inválido, favor verificar')
                    } 
                }
                alert("valor "+ valorCompra)
                document.getElementById('valorTotal').value = valorCompra
                document.getElementById('salvarPedido').disabled = false;     
                document.getElementById('products').disabled = true;     
                document.getElementById('costumer').disabled = true;     
        }
        function atualizarCliente(idCliente){
            document.getElementById('cliente').value = idCliente
        }
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    <li><a class="nav-link{{Request::is('product*') ? ' active ' : ''}}" href="/product">Produtos</a></li>
                    <li><a class="nav-link{{Request::is('costumer*') ? ' active ' : ''}}" href="/costumer">Clientes</a></li>
                    <li><a class="nav-link{{Request::is('pedido*') ? ' active ' : ''}}" href="/pedido">Pedidos</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
        @isset($message_success)
        <div class="container">
            <div class="alert alert-success" role="alert">
                {!! $message_success !!}
            </div>
        </div>
        @endisset

        @isset($message_warning)
        <div class="container">
            <div class="alert alert-warning" role="alert">
                {!! $message_warning !!}
            </div>
        </div>
        @endisset

        @if($errors->any())
        <div class="container">      
            <div class="alert alert-danger" role="alert">
                <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>                
                        {!! $error !!} 
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif
            @yield('content')
        </main>
    </div>
</body>
</html>
