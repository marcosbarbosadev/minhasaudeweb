<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UfSeeder::class,
            PacienteSeeder::class,
            LaboratorioSeeder::class,
            MedicamentoSeeder::class,
            EstoqueSeeder::class
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
