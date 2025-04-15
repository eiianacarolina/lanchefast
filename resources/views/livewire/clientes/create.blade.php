<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Cliente</title>
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

        .form-input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        .form-input:focus {
            border-color: #007bff;
            outline: none;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            width: 100%;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .error-message {
            font-size: 12px;
            color: #e74c3c;
        }

        .space-y-4 > * + * {
            margin-top: 1.5rem;
        }

        label {
            font-weight: bold;
            color: #333;
        }

        .error-message {
            font-size: 12px;
            color: #e74c3c;
        }
    </style>
</head>
<body>

    <div class="container mt-5">
        <h2>Criar Cliente</h2>

        <form wire:submit.prevent="salvar" class="space-y-4">
            <div>
                <label for="nome">Nome</label>
                <input type="text" id="nome" wire:model.defer="nome" class="form-input">
                @error('nome') <span class="error-message">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="endereco">Endereço</label>
                <input type="text" id="endereco" wire:model.defer="endereco" class="form-input">
                @error('endereco') <span class="error-message">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="telefone">Telefone</label>
                <input type="text" id="telefone" wire:model.defer="telefone" class="form-input">
                @error('telefone') <span class="error-message">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="cpf">CPF</label>
                <input type="text" id="cpf" wire:model.defer="cpf" class="form-input">
                @error('cpf') <span class="error-message">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="email">Email</label>
                <input type="email" id="email" wire:model.defer="email" class="form-input">
                @error('email') <span class="error-message">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="senha">Senha</label>
                <input type="password" id="senha" wire:model.defer="senha" class="form-input">
                @error('senha') <span class="error-message">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn btn-success">Salvar</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
