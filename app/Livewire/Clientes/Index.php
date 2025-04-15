<?php

namespace App\Livewire\Clientes;

use App\Models\Cliente;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;
    public $confirmDeleteId = null;  // Variável para armazenar o ID do cliente a ser excluído

    protected $querystring = [
        'search'=>['except'=>''],
        'perpage'=>['except'=>10]
    ];

    public function render(){
        $clientes = Cliente::where('nome', 'like', "%{$this->search}%")
            ->orWhere('email', 'like', "%{$this->search}%" )
            ->orWhere('cpf', 'like', "%{$this->search}%" )
            ->paginate($this->perPage);

        return view('livewire.clientes.index', compact('clientes'));
    }

    // Método para armazenar o ID do cliente que será excluído
    public function confirmDelete($id)
    {
        $this->confirmDeleteId = $id;
    }

    // Método para excluir o cliente quando confirmado
    public function deleteConfirmed()
    {
        $cliente = Cliente::find($this->confirmDeleteId);

        if ($cliente) {
            $cliente->delete();
            session()->flash('message', 'Cliente excluído com sucesso!');
        }

        $this->confirmDeleteId = null;  // Limpar a variável de ID após a exclusão
    }
}
