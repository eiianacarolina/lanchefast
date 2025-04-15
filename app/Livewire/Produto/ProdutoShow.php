<?php

namespace App\Livewire\Produto;

use App\Models\Produto;
use Livewire\Component;

class ProdutoShow extends Component
{
    public $produto;

    // Método mount para carregar o produto
    public function mount($produto)
    {
        // Tenta encontrar o produto pelo ID
        $this->produto = Produto::find($produto);

        // Caso o produto não seja encontrado
        if (!$this->produto) {
            session()->flash('message', 'Produto não encontrado!');
            return redirect()->route('produtos.index');
        }
    }

    public function render()
    {
        return view('livewire.produto.produto-show');
    }
}
