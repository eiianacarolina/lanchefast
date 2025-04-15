<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
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
        <h2>Editar Produto</h2>

        <form wire:submit.prevent="salvar" class="space-y-4">
            <div>
                <label for="nome">Nome</label>
                <input type="text" id="nome" wire:model.defer="nome" class="form-input">
                @error('nome') <span class="error-message">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="ingredientes">Ingredientes</label>
                <input type="text" id="ingredientes" wire:model.defer="ingredientes" class="form-input">
                @error('ingredientes') <span class="error-message">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="valor">Valor</label>
                <input type="text" id="valor" wire:model.defer="valor" class="form-input">
                @error('valor') <span class="error-message">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="imagem">Imagem</label>
                <input type="file" id="imagem" wire:model="imagem" class="form-input">
                @error('imagem') <span class="error-message">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Atualizar</button>
            
            <!-- Botão de Cancelar -->
            <a href="{{ route('produtos.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
