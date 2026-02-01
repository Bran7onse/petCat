<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MascotaFoto extends Model
{
    protected $fillable = ['mascota_id', 'url'];

    public function mascota()
    {
        return $this->belongsTo(Mascota::class);
    }
}
