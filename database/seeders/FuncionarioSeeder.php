<?php

namespace Database\Seeders;

use App\Models\Funcionario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FuncionarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Funcionario::create([
            'nome'=>'Ana',
            'cpf'=>'12345678910',
            'email'=>'ana@cliente.com',
            'senha'=>bcrypt('anisa123')
        ]);
    }
}
