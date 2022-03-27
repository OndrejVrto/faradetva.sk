<?php

declare(strict_types = 1);

namespace App\Enums;

enum ChartType: int
{
    case LINE = 1;
    case BAR  = 2;

    public function type(): string {
        return match($this) {
            self::LINE => 'line',
            self::BAR  => 'bar',
        };
    }

    public function typeLocalize(): string {
        return match($this) {
            self::LINE => 'Čiarový',
            self::BAR  => 'Stĺpcový',
        };
    }
}
