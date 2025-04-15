<?php

namespace App\Livewire\Clientes;

use App\Models\Cliente;
use Livewire\Component;

class Create extends Component
{
    public $nome, $endereco, $telefone, $cpf, $email, $senha;

    protected $rules = [
        'nome' => 'required|string|max:255',
        'endereco' => 'required|string',
        'telefone' => 'required|string',
        'cpf' => 'required|string', // Você pode usar o pacote "cpf-cnpj" para validação do CPF
        'email' => 'required|email|unique:clientes,email',
        'senha' => 'required|string|min:6',
    ];

    public function salvar()
    {
        $this->validate();

        Cliente::create([
            'nome' => $this->nome,
            'endereco' => $this->endereco,
            'telefone' => $this->telefone,
            'cpf' => $this->cpf,
            'email' => $this->email,
            'senha' => bcrypt($this->senha),
        ]);

        session()->flash('message', 'Cliente criado com sucesso!');
        return redirect()->route('clientes.index');
    }

    public function render()
    {
        return view('livewire.clientes.create');
    }
}
