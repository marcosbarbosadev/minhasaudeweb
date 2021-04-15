<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uf extends Model
{
    use HasFactory;

    public function laboratorios() {
        return $this->hasMany('App\Models\Laboratorio');
    }

}
