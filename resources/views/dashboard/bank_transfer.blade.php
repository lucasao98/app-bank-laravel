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
                <h1>Transferência</h1>
            </div>
        </header>

        <!-- Conteúdo -->
        <div class="content">
            <div class="page-title">
                <form method="POST" action="/operations/transfer" class="transfer-form">
                    @csrf
                    <div class="input-group">
                        <label for="agencia">Agência</label>
                        <input type="text" id="agencia" name="bank_branch" placeholder="0000-0"
                            required maxlength="6" pattern="\d{4}-\d{1}">
                    </div>

                    <div class="input-group">
                        <label for="conta">Conta</label>
                        <input type="text" id="conta" name="bank_account" placeholder="Digite o número da conta"
                            required pattern="\d{5}-\d{1}">
                    </div>

                    <div class="input-group">
                        <label for="valor">Valor (R$)</label>
                        <input type="number" id="valor" name="transfer_value" placeholder="0.00" min="0.01"
                            max="10000" step="0.01" required>
                        <span class="input-note">Máximo: R$ 10.000,00</span>
                    </div>

                    <button type="submit" class="submit-btn">Realizar Transferência</button>
                </form>
            </div>
        </div>
    </main>
</body>

</html>
