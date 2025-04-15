<?php

namespace App\Livewire\Produto;

use App\Models\Produto;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class ProdutoCreate extends Component
{
    use WithFileUploads;

    public $nome, $ingredientes, $valor, $novaImagem;

    public function criarProduto()
    {
        $this->validate([
            'nome' => 'required|max:255',
            'ingredientes' => 'required|max:500',
            'valor' => 'required|numeric',
            'novaImagem' => 'nullable|image|max:10240', // 10MB max
        ]);

        // Salvar a imagem, se houver
        $imagem = null;
        if ($this->novaImagem) {
            $imagem = $this->novaImagem->store('produtos', 'public');
        }

        // Criar o produto no banco
        Produto::create([
            'nome' => $this->nome,
            'ingredientes' => $this->ingredientes,
            'valor' => $this->valor,
            'imagem' => $imagem,
        ]);

        session()->flash('mensagem', 'Produto criado com sucesso!');
        
        // Limpar os campos
        $this->reset(['nome', 'ingredientes', 'valor', 'novaImagem']);
    }

    public function render()
    {
        return view('livewire.Produto.Produto-create');
    }
}
