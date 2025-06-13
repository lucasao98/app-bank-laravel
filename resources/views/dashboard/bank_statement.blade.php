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
                <h1>Extrato</h1>
            </div>
        </header>

        <!-- Conteúdo -->
        <div class="content">
            <div class="page-title">
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>Para</th>
                                <th>Data</th>
                                <th>Valor</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($withdrawals))

                                @foreach ($withdrawals as $withdrawal)
                                    <tr>
                                    <td>{{ $withdrawal->receiver->name }}</td>
                                    <td>{{ $withdrawal->created_at }}</td>
                                    <td>R$ {{ number_format($withdrawal->amount_transaction, 2, ",", "."); }}</td>
                                    <td><span class="<?= $withdrawal->status_transaction == 'Pending' ? 'status pending':'status completed' ?>">{{ $withdrawal->status_transaction }}</span></td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
