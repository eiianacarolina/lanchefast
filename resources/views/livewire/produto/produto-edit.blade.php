<div class="container mt-5">
    <div class="card shadow-lg border-0 rounded">
        <div class="row g-0">
            <div class="col-md-5 d-flex align-items-center justify-content-center bg-light">
                @if ($novaImagem)
                    <!-- Mostrar o preview da nova imagem -->
                    <img src="{{ $novaImagem->temporaryUrl() }}" class="img-fluid rounded-start p-3" style="max-height: 350px; opacity: 0.8; transition: opacity 0.3s ease-in-out;">
                @elseif ($imagem)
                    <!-- Mostrar a imagem atual -->
                    <img src="{{ Storage::url($imagem) }}" class="img-fluid rounded-start p-3" style="max-height: 350px;">
                @else
                    <div class="text-muted text-center p-5">
                        <i class="bi bi-image fs-1"></i>
                        <p class="mt-2">Sem imagem disponível</p>
                    </div>
                @endif
            </div>

            <div class="col-md-7">
                <div class="card-body p-4">
                    <h2 class="card-title mb-4 d-flex align-items-center">
                        <i class="bi bi-pencil-square text-primary me-2"></i> Editar Produto
                    </h2>

                    @if (session()->has('mensagem'))
                        <div class="alert alert-success d-flex align-items-center">
                            <i class="bi bi-check-circle-fill me-2"></i>
                            {{ session('mensagem') }}
                        </div>
                    @endif

                    <form wire:submit.prevent="atualizarProduto" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">
                                <i class="bi bi-tag"></i> Nome
                            </label>
                            <input type="text" class="form-control" wire:model="nome" placeholder="Digite o nome do produto">
                            @error('nome') <div class="text-danger small">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                <i class="bi bi-card-text"></i> Ingredientes
                            </label>
                            <textarea class="form-control" rows="3" wire:model="ingredientes" placeholder="Descreva os ingredientes"></textarea>
                            @error('ingredientes') <div class="text-danger small">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                <i class="bi bi-currency-dollar"></i> Valor
                            </label>
                            <input type="number" class="form-control" wire:model="valor" step="0.01" placeholder="Digite o valor">
                            @error('valor') <div class="text-danger small">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                <i class="bi bi-upload"></i> Nova Imagem (opcional)
                            </label>
                            <input type="file" class="form-control" wire:model="novaImagem">
                            @error('novaImagem') <div class="text-danger small">{{ $message }}</div> @enderror
                        </div>

                        @if ($novaImagem || $imagem)
                            <div class="mb-3">
                                <label class="form-label">
                                    <i class="bi bi-image-fill"></i> Pré-visualização da Imagem
                                </label>
                                <div class="text-center">
                                    <img src="{{ $novaImagem ? $novaImagem->temporaryUrl() : Storage::url($imagem) }}" class="img-thumbnail" width="150" alt="Prévia da nova imagem">
                                    <div class="mt-2">
                                        @if ($imagem)
                                            <!-- Botão para remover imagem atual -->
                                            <button type="button" class="btn btn-outline-danger btn-sm" wire:click="removerImagem">
                                                <i class="bi bi-trash me-1"></i> Remover Imagem
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="mt-4">
                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-save me-1"></i> Salvar Alterações
                            </button>
                            <a href="{{ route('produtos.show', $produtoId) }}" class="btn btn-outline-secondary ms-2">
                                <i class="bi bi-arrow-left me-1"></i> Voltar
                            </a>
                        </div>
                    </form>
                </div>
            </div>

