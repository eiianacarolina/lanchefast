<div class="container mt-4">
    <h2 class="mb-4">Detalhes do Cliente: {{ $cliente->nome }}</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5>Nome:</h5>
                    <p>{{ $cliente->nome }}</p>
                </div>

                <div class="col-md-6">
                    <h5>Email:</h5>
                    <p>{{ $cliente->email }}</p>
                </div>

                <div class="col-md-6">
                    <h5>Endereço:</h5>
                    <p>{{ $cliente->endereco }}</p>
                </div>

                <div class="col-md-6">
                    <h5>Telefone:</h5>
                    <p>{{ $cliente->telefone }}</p>
                </div>

                <div class="col-md-6">
                    <h5>CPF:</h5>
                    <p>{{ $cliente->cpf }}</p>
                </div>
            </div>

            <div class="mt-3">
                <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-warning mt-3">
                    <i class="bi bi-pencil-square"></i> Editar Cliente
                </a>
            </div>
        </div>
    </div>
</div>
