<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetiradasMedicamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retiradas_medicamento', function (Blueprint $table) {
            $table->id();
            $table->string('medicamento', 100);
            $table->string('observacao');
            $table->date('data');
            $table->unsignedBigInteger('paciente_id');
            $table->unsignedBigInteger('medicamento_id');
            $table->foreign('paciente_id')->references('id')->on('pacientes');
            $table->foreign('medicamento_id')->references('id')->on('medicamentos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('retiradas_medicamento');
    }
}
