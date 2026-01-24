<?php

namespace App\Jobs;

use App\Models\Recordatorio;
use App\Services\WhatsAppService;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class EnviarRecordatoriosJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle(WhatsAppService $whatsapp)
    {
        Log::info('🚀 EnviarRecordatoriosJob INICIADO');

        $recordatorios = Recordatorio::where('enviado', false)
            ->where('fecha_envio', '<=', Carbon::now())
            ->get();

        Log::info('📋 Recordatorios encontrados: ' . $recordatorios->count());

        foreach ($recordatorios as $recordatorio) {
            Log::info('📤 Enviando a: ' . $recordatorio->telefono);

            $whatsapp->enviarMensaje(
                $recordatorio->telefono,
                $recordatorio->mensaje
            );


            $recordatorio->update(['enviado' => true]);

            Log::info('✅ Recordatorio marcado como enviado ID: ' . $recordatorio->id);
        }

        Log::info('🏁 EnviarRecordatoriosJob FINALIZADO');
    }
}
