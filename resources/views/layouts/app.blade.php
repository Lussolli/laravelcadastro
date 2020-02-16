<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/bootstrap.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <main role="main">
            @hasSection("body")
                @yield("body")
            @endif
        </main>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>