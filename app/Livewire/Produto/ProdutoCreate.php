<?php

namespace App\Livewire\Produto;

use App\Models\Produto;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class ProdutoCreate extends Component
{
    use WithFileUploads;

    public $nome, $ingredientes, $valor, $imagem;

    protected $rules = [
        'nome' => 'required|string|max:255',
        'ingredientes' => 'required|string',
        'valor' => 'required|numeric|min:0',
        'imagem' => 'nullable|image|max:1024',  // Max 1MB para a imagem
    ];

    public function salvar()
    {
        $this->validate();

        $imagemPath = null;
        if ($this->imagem) {
            $imagemPath = $this->imagem->store('imagens', 'public');  // Salvar no diretório public/imagens
        }

        Produto::create([
            'nome' => $this->nome,
            'ingredientes' => $this->ingredientes,
            'valor' => $this->valor,
            'imagem' => $imagemPath,
        ]);

        session()->flash('message', 'Produto criado com sucesso!');
        return redirect()->route('produtos.index');
    }

    public function render()
    {
        return view('livewire.Produto.Produto-create');
    }
}
