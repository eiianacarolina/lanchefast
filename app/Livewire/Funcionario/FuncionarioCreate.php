<?php

namespace App\Livewire\Funcionario;

use App\Models\Funcionario;
use Livewire\Component;

class FuncionarioCreate extends Component
{
    public $nome,$cpf, $email, $senha;

    protected $rules = [
        'nome' => 'required|string|max:255',
        'cpf' => 'required|string', // Você pode usar o pacote "cpf-cnpj" para validação do CPF
        'email' => 'required|email|unique:clientes,email',
        'senha' => 'required|string|min:6',
    ];

    public function salvar()
    {
        $this->validate();

        Funcionario::create([
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'email' => $this->email,
            'senha' => bcrypt($this->senha),
        ]);

        session()->flash('message', 'Cliente criado com sucesso!');
        return redirect()->route('funcionarios.index');
    }

    public function render()
    {
        return view('livewire.funcionario.funcionario-create');
    }
}
