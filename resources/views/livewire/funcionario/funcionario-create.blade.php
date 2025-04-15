<div class="container mt-4">
    <h2 class="mb-4">Cadastrar Novo funcionario</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <form wire:submit.prevent="submit">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" id="nome" class="form-control" wire:model="nome" placeholder="Nome completo">
                    @error('nome') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" id="cpf" class="form-control" wire:model="cpf" placeholder="CPF">
                    @error('cpf') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" class="form-control" wire:model="email" placeholder="Email">
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" id="senha" class="form-control" wire:model="senha" placeholder="Senha">
                    @error('senha') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <button type="submit" class="btn btn-success btn-lg w-100">
                    <i class="bi bi-person-plus"></i> Criar Funcionário
                </button>
            </form>
        </div>
    </div>
</div>
