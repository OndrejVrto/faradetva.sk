<?php declare(strict_types=1);

namespace App\Enums;

enum ChartType: int {
    case LINE     = 1;
    case BAR      = 2;
    case DOUGHNUT = 3;

    public function type(): string {
        return match ($this) {
            self::LINE     => 'line',
            self::BAR      => 'bar',
            self::DOUGHNUT => 'doughnut',
        };
    }

    public function typeLocalize(): string {
        return match ($this) {
            self::LINE     => 'Čiarový',
            self::BAR      => 'Stĺpcový',
            self::DOUGHNUT => 'Výsečový',
        };
    }
}
