<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalhes do Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1>{{ $cliente->nome }}</h1>

        <table class="table">
            <tr>
                <th style="width: 200px;">CPF</th>
                <td>{{ $cliente->cpf }}</td>
            </tr>
            <tr>
                <th>Data de nascimento</th>
                <td>{{ $cliente->data_nascimento->format('d/m/Y') }}</td>
            </tr>
            <tr>
                <th>Telefone</th>
                <td>{{ $cliente->telefone }}</td>
            </tr>
            <tr>
                <th>E-mail</th>
                <td>{{ $cliente->email }}</td>
            </tr>
            <tr>
                <th>Cadastrado em</th>
                <td>{{ $cliente->created_at->format('d/m/Y \à\s H:i') }}</td>
            </tr>
        </table>

        <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-warning">Editar</a>
        <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Voltar</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>