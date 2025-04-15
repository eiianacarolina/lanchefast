<?php

namespace App\Livewire\Clientes;

use Livewire\Component;
use App\Models\Cliente;

class Edit extends Component
{
    public $cliente;
    public $nome, $endereco, $telefone, $cpf, $email, $senha;

    public function mount($cliente)
    {
        $this->cliente = Cliente::findOrFail($cliente);
        $this->nome = $this->cliente->nome;
        $this->endereco = $this->cliente->endereco;
        $this->telefone = $this->cliente->telefone;
        $this->cpf = $this->cliente->cpf;
        $this->email = $this->cliente->email;
        $this->senha = ''; // Não exibe a senha ao editar
    }

    protected $rules = [
        'nome' => 'required|string|max:255',
        'endereco' => 'required|string',
        'telefone' => 'required|string',
        'cpf' => 'required|string', // Você pode adicionar validação de CPF aqui, usando um pacote externo
        'email' => 'required|email|unique:clientes,email',
        'senha' => 'required|string|min:6',
    ];

    public function submit()
    {
        $this->validate();

        $this->cliente->update([
            'nome' => $this->nome,
            'endereco' => $this->endereco,
            'telefone' => $this->telefone,
            'cpf' => $this->cpf,
            'email' => $this->email,
            'senha' => $this->senha ? bcrypt($this->senha) : $this->cliente->senha, // Atualiza a senha somente se fornecida
        ]);

        session()->flash('message', 'Cliente atualizado com sucesso.');
        return redirect()->route('clientes.index');
    }

    public function render()
    {
        return view('livewire.clientes.edit');
    }
}

