<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TomaSignos extends Model
{
    use HasFactory;

    protected $fillable = [
        'paciente_id',
        'medico_id',
        'temperatura',
        'tension_arterial',
        'saturacion_oxigeno',
        'frecuencia_cardiaca',
        'peso',
        'talla',
        'observaciones'
    ];

    public function imc()
    {
        if ($this->talla && $this->peso) {
            $alturaEnMetros = $this->talla / 100; // Convierte la altura de cm a metros
            return $this->peso / ($alturaEnMetros * $alturaEnMetros);
        }

        return null; // Retorna null si la talla o el peso no están definidos
    }

    public function paciente()
    {
        return $this->belongsTo(User::class);
    }
}
