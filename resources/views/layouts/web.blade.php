<html>
    <head>
        <title>O Rei do Almoço - @yield('title')</title>
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
        <div>
            <p><a href="{{ url('/') }}">Voltar para a página inicial</a></p>
        </div>
    </body>
</html>
