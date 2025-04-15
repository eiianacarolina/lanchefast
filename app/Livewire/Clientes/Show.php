<?php

namespace App\Livewire\Clientes;

use App\Models\Cliente;
use Livewire\Component;

class Show extends Component
{
    public $cliente;

    public function mount($cliente)
    {
        $this->cliente = Cliente::find($cliente);

        if (!$this->cliente) {
            session()->flash('message', 'Cliente não encontrado!');
            return redirect()->route('clientes.index');
        }
    }

    public function render()
    {
        return view('livewire.clientes.show');
    }
}
