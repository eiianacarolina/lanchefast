<div class="container mt-5">
    <div class="card shadow-lg rounded border-0">
        <div class="row g-0">
            <div class="col-md-5 d-flex align-items-center justify-content-center bg-light">
                @if ($produto->imagem)
                    <img src="{{ Storage::url($produto->imagem) }}" alt="{{ $produto->nome }}" class="img-fluid rounded-start p-3" style="max-height: 350px;">
                @else
                    <div class="text-muted text-center p-5">
                        <i class="bi bi-image fs-1"></i>
                        <p class="mt-2">Sem imagem disponível</p>
                    </div>
                @endif
            </div>
            <div class="col-md-7">
                <div class="card-body p-4">
                    <h2 class="card-title mb-3">
                        <i class="bi bi-cup-straw me-2 text-primary"></i> {{ $produto->nome }}
                    </h2>

                    <h5 class="mb-2 text-muted">
                        <i class="bi bi-currency-dollar me-1"></i> {{ number_format($produto->valor, 2, ',', '.') }}
                    </h5>

                    <p class="card-text mt-4">
                        <i class="bi bi-card-text me-2"></i> <strong>Ingredientes:</strong><br>
                        {{ $produto->ingredientes }}
                    </p>

                    <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-outline-primary mt-3">
                        <i class="bi bi-pencil-square me-1"></i> Editar Produto
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
