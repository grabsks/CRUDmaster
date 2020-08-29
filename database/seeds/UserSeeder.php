<?php

use App\Usuario;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Usuario $usuario)
    {
        $usuario->create([
            'name'=>'Gabriel Drumond',
            'cpf'=>'200.154.154-32',
            'data_nasc'=>'12/12/2012',
            'email'=>'oloco@email.com',
            'telefone'=>'(31)89898-1231',
            'estado'=>'Minas Gerais',
            'cidade'=>'Belo Horizonte',
            'endereco'=>'alguma localização',
        ]);

        $usuario->create([
            'name'=>'Prates Pontes',
            'cpf'=>'666.555.444-22',
            'data_nasc'=>'23/10/1999',
            'email'=>'alex.alou@alguma.outraprovedora',
            'telefone'=>'(31)1111-1111',
            'estado'=>'Minas Gerais',
            'cidade'=>'Matozinhos',
            'endereco'=>'mais uma localização',
        ]);
    }
}
