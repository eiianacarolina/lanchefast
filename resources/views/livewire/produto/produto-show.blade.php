<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Produto</title>
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
        <h2>Detalhes do Produto</h2>

        <div class="info-div">
            <strong>Nome:</strong> {{ $produto->nome }}
        </div>
        <div class="info-div">
            <strong>Ingredientes:</strong> {{ $produto->ingredientes }}
        </div>
        <div class="info-div">
            <strong>Valor:</strong> {{ $produto->valor }}
        </div>
        <div class="info-div">
            <strong>Imagem:</strong> {{ $produto->imagem }}
        </div>
        <div>
            <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-primary">Editar</a>
        </div>
    </div>
</body>
</html>
