<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WhatsAppService
{
    public function enviarMensaje($telefono, $mensaje)
    {
        Log::info("📲 Intentando enviar WhatsApp a {$telefono}");

        $url = config('services.whatsapp.url') . '/' .
            config('services.whatsapp.phone_id') . '/messages';

        $response = Http::withToken(config('services.whatsapp.token'))
            ->post($url, [
                'messaging_product' => 'whatsapp',
                'to' => $telefono,
                'type' => 'text',
                'text' => [
                    'body' => $mensaje
                ]
            ]);

        Log::info('📨 Respuesta WhatsApp', [
            'status' => $response->status(),
            'body' => $response->json(),
        ]);

        return $response;
    }
}
