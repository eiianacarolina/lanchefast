<?php

namespace App\Livewire\Produto;

use Livewire\Component;
use App\Models\Produto;
use Livewire\WithPagination;

class ProdutoIndex extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;
    public $confirmDeleteId = null; // Adicionado para controle da exclusão

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => 10],
    ];

    public function render()
    {
        $produtos = Produto::where('nome', 'like', "%{$this->search}%")
            ->orWhere('ingredientes', 'like', "%{$this->search}%")
            ->paginate($this->perPage);

        return view('livewire.produto.produto-index', compact('produtos'));
    }

    // Quando o usuário clica no botão de deletar
    public function confirmDelete($id)
    {
        $this->confirmDeleteId = $id;
    }

    // Quando o usuário confirma a exclusão
    public function deleteConfirmed()
    {
        $produto = Produto::find($this->confirmDeleteId);

        if ($produto) {
            $produto->delete();
            session()->flash('message', 'Produto deletado com sucesso.');
        }

        $this->confirmDeleteId = null;
    }
}
