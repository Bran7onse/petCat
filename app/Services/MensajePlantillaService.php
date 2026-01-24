<?php

namespace App\Services;

class MensajePlantillaService
{
    public static function recordatorioBasico($mascota, $fecha)
    {
        return "🐾 Hola, te recordamos que {$mascota} tiene una cita el {$fecha}. ¡Te esperamos!";
    }
}
