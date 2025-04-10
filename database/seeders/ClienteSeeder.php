<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cliente::create([
            'nome'=>'Ana',
            'endereco'=>'Rua Sol 123',
            'telefone'=>'112222222',
            'cpf'=>'12345678910',
            'email'=>'ana@cliente.com',
            'senha'=>bcrypt('anisa123')
        ]);

        Cliente::create([
            'nome'=>'Isa',
            'endereco'=>'Rua Sol 123',
            'telefone'=>'112222222',
            'cpf'=>'12345678911',
            'email'=>'isa@cliente.com',
            'senha'=>bcrypt('anisa123')
        ]);

        Cliente::create([
            'nome'=>'Anne',
            'endereco'=>'Rua Sol 123',
            'telefone'=>'112222222',
            'cpf'=>'12345678912',
            'email'=>'anne@cliente.com',
            'senha'=>bcrypt('anisa123')
        ]);
    }
}
