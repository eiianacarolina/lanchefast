<div class="container mt-4">
    <div class="row mb-5">


        <!-- Mensagem de sucesso -->
        @if (session()->has('message'))
            <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-2 rounded mb-4">
                {{ session('message') }}
            </div>
        @endif

        <form wire:submit.prevent="salvar" class="bg-white shadow-md rounded-lg p-6 space-y-4">

            <!-- Nome -->
            <div class="card ">
                <div class="card-header"style="background-color: black; color: white">
                    <h3 class="text-2xl font-bold mb-6 text-gray-800 text-center" >Criar Novo Produto</h3>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="nome" class="block text-sm font-semibold text-gray-700"><b>Nome do
                                        Produto</b></label>
                                <input type="text" id="nome" wire:model.defer="nome"
                                    class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-500">
                                @error('nome')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Ingredientes -->
                            <div class="mb-4">
                                <label for="ingredientes"
                                    class="block text-sm font-semibold text-gray-700"><b>Ingredientes</b></label>
                                <input type="text" id="ingredientes" wire:model.defer="ingredientes"
                                    class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-500">
                                @error('ingredientes')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Valor -->
                            <div class="mb-4">
                                <label for="valor" class="block text-sm font-semibold text-gray-700"><b>Valor
                                        (R$)</b></label>
                                <input type="number" id="valor" wire:model.defer="valor" step="0.01"
                                    class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-500">
                                @error('valor')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Imagem -->
                            <div class="mb-4">
                                <label for="imagem" class="block text-sm font-semibold text-gray-700"><b>Imagem
                                        (opcional)</b></label>
                                <input type="file" id="imagem" wire:model="imagem"
                                    class="w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-blue-500">
                                @error('imagem')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Botão -->

                            <button type="submit" class="btn btn-dark">
                                Salvar Produto
                            </button>

                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>
