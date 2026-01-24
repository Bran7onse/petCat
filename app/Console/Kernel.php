<?php

namespace App\Console;

use App\Jobs\EnviarRecordatoriosJob;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;


class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule): void
    {
        $schedule->job(EnviarRecordatoriosJob::class);
    }

    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');
    }
}
