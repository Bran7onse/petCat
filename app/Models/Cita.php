<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $fillable = [
        'user_id',
        'mascota',
        'fecha',
        'hora',
    ];

    public function recordatorio()
    {
        return $this->hasOne(Recordatorio::class);
    }

    public function recordatorios()
    {
        return $this->hasMany(\App\Models\Recordatorio::class);
    }
}
