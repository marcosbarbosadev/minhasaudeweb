<?php

namespace Database\Seeders;

use App\Models\Estoque;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstoqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(Estoque::all()->count() == 0) {
            $created_at = $updated_at = date('Y-m-d H:i:s');

            $medicamento1 = [
                'medicamento_id' => 1,
                'quantidade' => 150,
                'created_at' => $created_at,
                'updated_at' => $updated_at
            ];
            $medicamento2 = [
                'medicamento_id' => 2,
                'quantidade' => 390,
                'created_at' => $created_at,
                'updated_at' => $updated_at
            ];

            DB::table('estoque')->insert($medicamento1);
            DB::table('estoque')->insert($medicamento2);
        }
    }
}
