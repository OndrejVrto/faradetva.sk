<?php

namespace App\Services\Dashboard;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Artisan;
use Spatie\Health\Commands\RunHealthChecksCommand;

class MaintenanceModeSwitcherService
{
    public function __destruct() {
        // refresh Health checks
        Artisan::call(RunHealthChecksCommand::class);
    }

    public function handle(bool $requiredMode): ?string {
        if ($requiredMode === !app()->isDownForMaintenance()) {
            return null;
        }

        if (false === $requiredMode) {
            // generate sectet key
            $secretKey = Str::uuid();

            // call artisan down  with secret key
            Artisan::call('down', ['--secret' => $secretKey]);

            // send mail to all super-administrators and administrators
            // TODO: send email to administrator if is run maintenance mode

            // redirect to home with secret key
            return $secretKey;
        }

        Artisan::call('up');

        return null;
    }
}
