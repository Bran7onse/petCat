<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    /** @use HasFactory<\Database\Factories\MascotaFactory> */
    use HasFactory;

    protected $fillable = [
        'nombre',
        'especie',
        'raza',
        'peso',
        'foto',
        'propietario_id',
    ];

    // Relación con User (propietario)
    public function propietario()
    {
        return $this->belongsTo(User::class, 'propietario_id');
    }
}
