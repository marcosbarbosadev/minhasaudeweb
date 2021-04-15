<?php

namespace Database\Seeders;

use App\Models\Uf;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(Uf::all()->count() == 0) {
            $ufs = [
                ['sigla' => 'AC', 'nome' => 'Acre'],
                ['sigla' => 'AL', 'nome' => 'Alagoas'],
                ['sigla' => 'AP', 'nome' => 'Amapá'],
                ['sigla' => 'AM', 'nome' => 'Amazonas'],
                ['sigla' => 'BA', 'nome' => 'Bahia'],
                ['sigla' => 'CE', 'nome' => 'Ceará'],
                ['sigla' => 'DF', 'nome' => 'Distrito Federal'],
                ['sigla' => 'ES', 'nome' => 'Espírito Santo'],
                ['sigla' => 'GO', 'nome' => 'Goiás'],
                ['sigla' => 'MA', 'nome' => 'Maranhão'],
                ['sigla' => 'MT', 'nome' => 'Mato Grosso'],
                ['sigla' => 'MS', 'nome' => 'Mato Grosso do Sul'],
                ['sigla' => 'MG', 'nome' => 'Minas Gerais'],
                ['sigla' => 'PA', 'nome' => 'Pará'],
                ['sigla' => 'PB', 'nome' => 'Paraíba '],
                ['sigla' => 'PR', 'nome' => 'Paraná'],
                ['sigla' => 'PE', 'nome' => 'Pernambuco'],
                ['sigla' => 'PI', 'nome' => 'Piauí'],
                ['sigla' => 'RJ', 'nome' => 'Rio de Janeiro'],
                ['sigla' => 'RN', 'nome' => 'Rio Grande do Norte'],
                ['sigla' => 'RS', 'nome' => 'Rio Grande do Sul '],
                ['sigla' => 'RO', 'nome' => 'Rondônia'],
                ['sigla' => 'RR', 'nome' => 'Roraima'],
                ['sigla' => 'SC', 'nome' => 'Santa Catarina '],
                ['sigla' => 'SP', 'nome' => 'São Paulo '],
                ['sigla' => 'SE', 'nome' => 'Sergipe'],
                ['sigla' => 'TO', 'nome' => 'Tocantins']
            ];

            foreach ($ufs as $uf) {
                $currentDateTime = date('Y-m-d H:i:s');
                DB::table('ufs')->insert(
                    array_merge($uf, ['created_at' => $currentDateTime, 'updated_at' => $currentDateTime])
                );
            }
        }

    }
}
