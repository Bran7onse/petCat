<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistorialClinico extends Model
{
    protected $table = 'historial_clinico';

    protected $fillable = [
        'mascota_id',
        'fecha',
        'tipo',
        'descripcion'
    ];

    public function mascota()
    {
        return $this->belongsTo(Mascota::class);
    }
}
