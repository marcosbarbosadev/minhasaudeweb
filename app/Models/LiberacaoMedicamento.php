<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiberacaoMedicamento extends Model
{
    use HasFactory;
    protected $table = 'liberacao_medicamento';

    public function medicamento() {
        return $this->belongsTo('App\Models\Medicamento');
    }

    public function paciente() {
        return $this->belongsTo('App\Models\Paciente');
    }

}
