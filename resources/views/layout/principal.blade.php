@extends('layout.head');
    <body class="center-form">
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/produtos">
                     Estoque Laravel
                    </a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{action('ProdutoController@lista')}}" class="navbar-brand" >Listagem</a></li>
                    <li><a href="{{action('ProdutoController@novo')}}" class="navbar-brand" >Novo</a></li>
                </ul>
            </div>
        </nav>
    
    
    <div class="container">
         @yield('conteudo')
         <footer class="footer">
            <p>© Sistema de Produtos e venda.</p>
        </footer>
    </div>
    </body>
</html>