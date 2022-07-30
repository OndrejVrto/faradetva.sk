<?php

declare(strict_types=1);

namespace App\View\Components\Partials;

use Illuminate\View\Component;
use Spatie\Health\Enums\Status;
use Illuminate\Contracts\View\View;
use Spatie\Health\ResultStores\StoredCheckResults\StoredCheckResult;

class HealthStatusIcon extends Component {
    public function __construct(public StoredCheckResult $result) {
    }

    public function render(): View {
        return view('components.partials.health-status-icon.index', [
            'iconColor' => fn (string $status) => $this->getIconColor($status),
            'icon' => fn (string $status) => $this->getIcon($status),
        ]);
    }

    protected function getIconColor(string $status): string {
        return match ($status) {
            Status::ok()->value      => 'text-success',
            Status::warning()->value => 'text-warning',
            Status::skipped()->value => 'text-primary',
            Status::failed()->value  => 'text-danger',
            Status::crashed()->value => 'text-pink',
            default                  => 'text-secondary',
        };
    }

    protected function getIcon(string $status): string {
        return match ($status) {
            Status::ok()->value      => 'check-circle',
            Status::warning()->value => 'exclamation-circle',
            Status::skipped()->value => 'arrow-circle-right',
            Status::failed()->value  => 'x-circle',
            Status::crashed()->value => 'crashed-bomb',
            default                  => '',
        };
    }
}
