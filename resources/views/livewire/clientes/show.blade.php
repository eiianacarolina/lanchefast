<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: white;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .info-div {
            margin-bottom: 15px;
        }

        .info-div strong {
            color: #555;
        }

        .info-div {
            font-size: 16px;
            color: #333;
        }

        .info-div a {
            color: #007bff;
            text-decoration: none;
        }

        .info-div a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="container mt-5">
        <h2>Detalhes do Cliente</h2>

        <div class="info-div">
            <strong>Nome:</strong> {{ $cliente->nome }}
        </div>
        <div class="info-div">
            <strong>Endereço:</strong> {{ $cliente->endereco }}
        </div>
        <div class="info-div">
            <strong>Telefone:</strong> {{ $cliente->telefone }}
        </div>
        <div class="info-div">
            <strong>CPF:</strong> {{ $cliente->cpf }}
        </div>
        <div class="info-div">
            <strong>Email:</strong> {{ $cliente->email }}
        </div>
        <div>
            <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-primary">Editar</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>