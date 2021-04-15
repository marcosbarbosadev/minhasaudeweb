<?php

namespace Database\Seeders;

use App\Models\Paciente;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(Paciente::all()->count() == 0) {
            $created_at = $updated_at = date('Y-m-d H:i:s');
            $paciente1 = [
                'nome' => 'Rodrigo Silva',
                'sexo' => 'M',
                'nascimento' => '1980-05-03',
                'endereco' => 'Rua Augusto de Lima, 91, Centro',
                'cidade' => 'Belo Horizonte',
                'uf_id' => 13,
                'cep' => '12345-000',
                'created_at' => $created_at,
                'updated_at' => $updated_at
            ];
            $paciente2 = [
                'nome' => 'Carla Mota',
                'sexo' => 'F',
                'nascimento' => '1990-07-09',
                'endereco' => 'Rua dos Carijós, 77, Centro',
                'cidade' => 'Belo Horizonte',
                'uf_id' => 13,
                'cep' => '54321-000',
                'created_at' => $created_at,
                'updated_at' => $updated_at
            ];
            DB::table('pacientes')->insert($paciente1);
            DB::table('pacientes')->insert($paciente2);
        }
    }
}
