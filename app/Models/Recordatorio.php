<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recordatorio extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'telefono',
        'mensaje',
        'fecha_envio',
        'enviado',
    ];

    public function cita()
    {
        return $this->belongsTo(\App\Models\Cita::class);
    }
}
