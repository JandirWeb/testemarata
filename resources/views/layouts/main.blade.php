<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonte do Google-->
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

        <!-- Data Tables -->
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

        <!-- CSS Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <!-- CSS da aplicação -->
        <link rel="stylesheet" href="/css/styles.css">
        <script src="/js/scripts.js"></script>

    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="collapse navbar-collapse" id="navbar">
                    <a href="/" class="navbar-brand">
                        <img src="/img/logo-marata.png" alt="logo">
                    </a>
                    <ul class="navbar-nav">
                        
                        @auth
                        <li class="nav-item">
                            <a href="/pedidos/list" class="nav-link">Pedidos</a>
                        </li>
                        <li class="nav-item">
                            <a href="/clientes/list" class="nav-link">Clientes</a>
                        </li>
                        <li class="nav-item">
                            <a href="/produtos/list" class="nav-link">Produtos</a>
                        </li>
                        <li class="nav-item">
                            <a href="/user/profile" class="nav-link">Perfil</a>
                        </li>
                        <li class="nav-item">
                            <form action="/logout" method="post">
                                @csrf
                                <a href="/logout" 
                                    class="nav-link"
                                    onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                    Sair
                                </a>
                            </form>
                        </li>
                        @endauth

                        @guest
                        <li class="nav-item">
                            <a href="/login" class="nav-link">Entrar</a>
                        </li>
                        <li class="nav-item">
                            <a href="/register" class="nav-link">Registrar</a>
                        </li>
                        @endguest

                    </ul>
                </div>
            </nav>

        </header>

        <main>
            <div class="container-fluid">
                <div class="row">
                    @if (session('msg'))
                        <p class="msg">{{ session('msg') }}</p>
                    @endif
                    @yield('content')
                </div>
            </div>
        </main>

        <footer>
            <p>Cadastro de pedidos - Teste Maratá</p>
        </footer>

        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        
        <!--Data Tables-->
        <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function(){
                $('.tabelas').DataTable({
                      "language": {
                          "lengthMenu": "Ver _MENU_ registros por página",
                          "zeroRecords": "Não encontramos sua busca",
                          "info": "Mostrando página _PAGE_ de _PAGES_",
                          "infoEmpty": "Nenhum registro disponível",
                          "infoFiltered": "(filtrado de _MAX_ registros no total)"
                      }
                  });
            });
            </script>
    </body>
</html>
