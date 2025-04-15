<?php

namespace App\Livewire\Produto;

use App\Models\Produto;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

    class ProdutoEdit extends Component
{
    use WithFileUploads;

    public $produtoId;
    public $nome;
    public $ingredientes;
    public $valor;
    public $imagem;
    public $novaImagem;

    public function mount(Produto $produto)
    {
        $this->produtoId = $produto->id;
        $this->nome = $produto->nome;
        $this->ingredientes = $produto->ingredientes;
        $this->valor = $produto->valor;
        $this->imagem = $produto->imagem;
    }

    public function atualizarProduto()
    {
        $this->validate([
            'nome' => 'required|string|max:255',
            'ingredientes' => 'required|string',
            'valor' => 'required|numeric',
            'novaImagem' => 'nullable|image|max:2048',
        ]);

        $produto = Produto::findOrFail($this->produtoId);
        $produto->nome = $this->nome;
        $produto->ingredientes = $this->ingredientes;
        $produto->valor = $this->valor;

        if ($this->novaImagem) {
            $caminhoImagem = $this->novaImagem->store('produtos', 'public');
            $produto->imagem = $caminhoImagem;
        }

        $produto->save();

        session()->flash('mensagem', 'Produto atualizado com sucesso!');
    }
    public function render()
    {
        return view('livewire.produto.produto-edit');
    }
}