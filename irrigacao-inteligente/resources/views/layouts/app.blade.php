<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Adicione um mínimo de altura para o corpo para garantir que o rodapé fique no final da página */
        body {
            min-height: 100vh; /* Garante que a altura mínima do corpo cubra toda a tela */
            display: flex;
            flex-direction: column;
        }
        /* Garante que a área principal ocupe o espaço restante */
        .container {
            flex: 1;
        }
    </style>
</head>
<body>
    <!-- Cabeçalho -->
    <header class="bg-dark text-white py-3">
        <div class="container">
            <h1 class="mb-0">Sistema de Irrigação Inteligente</h1>
        </div>
    </header>

    <!-- Área principal do conteúdo -->
    <div class="container mt-5">
        @yield('content')
    </div>

    <!-- Rodapé -->
    <footer class="bg-dark text-white py-3 mt-5">
        <div class="container text-center">
            &copy; {{ date('Y') }} Sistema de Irrigação Inteligente. Todos os direitos reservados.
        </div>
    </footer>
</body>
</html>
