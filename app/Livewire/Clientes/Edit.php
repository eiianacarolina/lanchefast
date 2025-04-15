<?php

namespace App\Livewire\Clientes;

use App\Models\Cliente;
use Livewire\Component;

class Edit extends Component
{
    public $cliente;
    public $nome, $endereco, $telefone, $cpf, $email, $senha;

    protected $rules = [
        'nome' => 'required|string|max:255',
        'endereco' => 'required|string',
        'telefone' => 'required|string',
        'cpf' => 'required|string',
        'email' => 'required|email|unique:clientes,email', // Ajuste a seguir
        'senha' => 'nullable|string|min:6',
    ];

    public function mount($cliente)
    {
        $this->cliente = Cliente::find($cliente);

        if ($this->cliente) {
            $this->nome = $this->cliente->nome;
            $this->endereco = $this->cliente->endereco;
            $this->telefone = $this->cliente->telefone;
            $this->cpf = $this->cliente->cpf;
            $this->email = $this->cliente->email;
        } else {
            session()->flash('message', 'Cliente não encontrado!');
            return redirect()->route('clientes.index');
        }
    }

    public function salvar()
    {
        // Modifique a validação do email para ignorar o próprio cliente
        $this->validate([
            'nome' => 'required|string|max:255',
            'endereco' => 'required|string',
            'telefone' => 'required|string',
            'cpf' => 'required|string',
            'email' => 'required|email|unique:clientes,email,' . $this->cliente->id, // Ignorar a validação de unicidade para o próprio cliente
            'senha' => 'nullable|string|min:6',
        ]);

        // Atualiza o cliente no banco
        if ($this->senha) {
            $this->cliente->update([
                'nome' => $this->nome,
                'endereco' => $this->endereco,
                'telefone' => $this->telefone,
                'cpf' => $this->cpf,
                'email' => $this->email,
                'senha' => bcrypt($this->senha),
            ]);
        } else {
            $this->cliente->update([
                'nome' => $this->nome,
                'endereco' => $this->endereco,
                'telefone' => $this->telefone,
                'cpf' => $this->cpf,
                'email' => $this->email,
            ]);
        }

        // Mensagem de sucesso
        session()->flash('message', 'Cliente atualizado com sucesso!');

        // Redireciona para a página de index
        return redirect()->route('clientes.index');
    }

    public function render()
    {
        return view('livewire.clientes.edit');
    }
}
