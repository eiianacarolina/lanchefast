<div class="container mt-5">
    <div class="card shadow rounded">
        <div class="card-header bg-primary text-white d-flex align-items-center">
            <i class="bi bi-pencil-square me-2"></i> Editar Produto
        </div>
        <div class="card-body">
            @if (session()->has('mensagem'))
                <div class="alert alert-success">
                    <i class="bi bi-check-circle me-1"></i> {{ session('mensagem') }}
                </div>
            @endif

            <form wire:submit.prevent="atualizarProduto" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-tag"></i> Nome</label>
                    <input type="text" class="form-control" wire:model="nome" placeholder="Digite o nome do produto">
                    @error('nome') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-card-text"></i> Ingredientes</label>
                    <textarea class="form-control" rows="3" wire:model="ingredientes" placeholder="Descreva os ingredientes"></textarea>
                    @error('ingredientes') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-currency-dollar"></i> Valor</label>
                    <input type="number" class="form-control" wire:model="valor" step="0.01" placeholder="Digite o valor">
                    @error('valor') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-image"></i> Nova Imagem (opcional)</label>
                    <input type="file" class="form-control" wire:model="novaImagem">
                    @error('novaImagem') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                @if ($imagem)
                    <div class="mb-3">
                        <label class="form-label d-block"><i class="bi bi-image-fill"></i> Imagem atual:</label>
                        <img src="{{ Storage::url($imagem) }}" alt="Imagem atual" class="img-thumbnail" width="150">
                    </div>
                @endif

                <button type="submit" class="btn btn-success">
                    <i class="bi bi-save me-1"></i> Salvar Alterações
                </button>
            </form>
        </div>
    </div>
</div>
