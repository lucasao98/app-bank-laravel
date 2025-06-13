<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Byte Bank</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
    @include('layouts.menu');

    <!-- Conteúdo Principal -->
    <main class="main-content">
        <!-- Cabeçalho -->
        <header class="header">
            <div class="header-left">
                <h1>Home</h1>
            </div>
        </header>

        <!-- Conteúdo -->
        <div class="content">
            <div class="page-title">
                <h2>Bem-vindo, {{ $user->name }}!</h2>
            </div>

            <!-- Cards de Estatísticas -->
            <div class="stats-cards">
                <div class="stat-card">
                    <div class="stat-icon icon-1">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="stat-info">
                        <h3>{{ $user->account->bank_branch }}</h3>
                        <p>Agência</p>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon icon-2">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <div class="stat-info">
                        <h3>{{ $user->account->bank_account }}</h3>
                        <p>Conta</p>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon icon-2">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <div class="stat-info">
                        <h3>R$ {{ number_format($user->account->bank_amount, 2, ",", "."); }}</h3>
                        <p>Total Disponível</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
