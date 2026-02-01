<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mascota extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'especie',
        'raza',
        'peso',
        'fecha_nacimiento',
        'sexo',
        'propietario_id', // <--- VOLVIMOS AL ID
    ];

    // Restauramos la relación con el Usuario
    public function propietario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'propietario_id');
    }

    public function fotos(): HasMany
    {
        return $this->hasMany(MascotaFoto::class);
    }

    public function historial(): HasMany
    {
        return $this->hasMany(HistorialClinico::class);
    }
}
