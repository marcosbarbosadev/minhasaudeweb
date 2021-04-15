<?php

namespace Database\Seeders;

use App\Models\Laboratorio;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LaboratorioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(Laboratorio::all()->count() == 0) {
            $created_at = $updated_at = date('Y-m-d H:i:s');
            $lab1 = [
                'nome' => 'Medley',
                'endereco' => 'Rua Tal, 123, Centro',
                'cidade' => 'São Paulo',
                'cep' => '12345-000',
                'uf_id' => 25,
                'created_at' => $created_at,
                'updated_at' => $updated_at
            ];
            $lab2 = [
                'nome' => 'Eurofarma',
                'endereco' => 'Rua Cinco, 789, Centro',
                'cidade' => 'São Paulo',
                'cep' => '35351-000',
                'uf_id' => 25,
                'created_at' => $created_at,
                'updated_at' => $updated_at
            ];
            DB::table('laboratorios')->insert($lab1);
            DB::table('laboratorios')->insert($lab2);
        }
    }
}
