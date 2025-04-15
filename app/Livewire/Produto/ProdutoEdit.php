<?php

namespace App\Livewire\Produto;

use App\Models\Produto;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class ProdutoEdit extends Component
{
    use WithFileUploads;

    public $produto;
    public $nome, $ingredientes, $valor, $imagem;

    // Regras de validação
    protected $rules = [
        'nome' => 'required|string|max:255',
        'ingredientes' => 'required|string',
        'valor' => 'required|numeric|min:0',
        'imagem' => 'nullable|image|max:1024', // 1MB
    ];

    // Método para carregar os dados do produto
    public function mount($produto)
    {
        // Carregar o produto do banco de dados
        $this->produto = Produto::find($produto);
        
        // Atribuindo os dados do produto às propriedades do componente
        if ($this->produto) {
            $this->nome = $this->produto->nome;
            $this->ingredientes = $this->produto->ingredientes;
            $this->valor = $this->produto->valor;
            $this->imagem = $this->produto->imagem;
        } else {
            // Caso não encontre o produto
            session()->flash('message', 'Produto não encontrado!');
            return redirect()->route('produtos.index');
        }
    }

    // Método para salvar as alterações
    public function salvar()
    {
        // Validação dos campos
        $this->validate();

        // Se uma nova imagem for carregada, faz o upload
        if ($this->imagem) {
            // Exclui a imagem anterior se houver
            if ($this->produto->imagem) {
                // Verifica se o arquivo existe antes de tentar deletá-lo
                $path = storage_path('app/public/' . $this->produto->imagem);
                if (file_exists($path)) {
                    unlink($path);
                }
            }
            // Salva a nova imagem
            $imagemPath = $this->imagem->store('imagens', 'public');
        } else {
            $imagemPath = $this->produto->imagem; // Se não houver nova imagem, mantém a existente
        }

        // Atualiza o produto no banco de dados
        $this->produto->update([
            'nome' => $this->nome,
            'ingredientes' => $this->ingredientes,
            'valor' => $this->valor,
            'imagem' => $imagemPath,
        ]);

        // Mensagem de sucesso
        session()->flash('message', 'Produto atualizado com sucesso!');
        
        // Redireciona para a lista de produtos
        return redirect()->route('produtos.index');
    }

    public function render()
    {
        return view('livewire.produto.produto-edit');
    }
}
