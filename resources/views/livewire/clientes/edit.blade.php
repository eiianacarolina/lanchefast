<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
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
            max-width: 400px;
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

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            width: 100%;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
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
    </style>
</head>
<body>

    <div class="container mt-5">
        <h2>Editar Cliente</h2>

        <form wire:submit.prevent="salvar" class="space-y-4">
            <div>
                <label for="nome">Nome</label>
                <input type="text" id="nome" wire:model="nome" class="form-input">
                @error('nome') <span class="error-message">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="endereco">Endereço</label>
                <input type="text" id="endereco" wire:model="endereco" class="form-input">
                @error('endereco') <span class="error-message">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="telefone">Telefone</label>
                <input type="text" id="telefone" wire:model="telefone" class="form-input">
                @error('telefone') <span class="error-message">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="cpf">CPF</label>
                <input type="text" id="cpf" wire:model="cpf" class="form-input">
                @error('cpf') <span class="error-message">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="email">Email</label>
                <input type="email" id="email" wire:model="email" class="form-input">
                @error('email') <span class="error-message">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="senha">Senha</label>
                <input type="password" id="senha" wire:model="senha" class="form-input">
                @error('senha') <span class="error-message">{{ $message }}</span> @enderror
            </div>

            <!-- Botão de Atualizar -->
            <button type="submit" class="btn btn-primary">Atualizar</button>

            <!-- Botão de Cancelar -->
            <a href="{{ route('clientes.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
        </form>
    </div>

</body>
</html>
