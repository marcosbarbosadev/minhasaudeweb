<?php

namespace Database\Seeders;

use App\Models\Medicamento;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(Medicamento::all()->count() == 0) {
            $created_at = $updated_at = date('Y-m-d H:i:s');
            $med1 = [
                'nome' => 'Desloratadina',
                'tipo' => 'gotas',
                'laboratorio_id' => 1,
                'created_at' => $created_at,
                'updated_at' => $updated_at
            ];
            $med2 = [
                'nome' => 'Pantoprazol',
                'tipo' => 'comprimido',
                'laboratorio_id' => 2,
                'mg' => 40,
                'created_at' => $created_at,
                'updated_at' => $updated_at
            ];
            DB::table('medicamentos')->insert($med1);
            DB::table('medicamentos')->insert($med2);
        }
    }
}
