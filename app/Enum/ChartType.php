<?php

declare(strict_types = 1);

namespace App\Enum;

use Rexlabs\Enum\Enum;

class ChartType extends Enum
{
    const LINE = '1';
    const BAR  = '2';

    public static function map(): array {
        return [
            self::LINE => [
                'id' => '1',
                'type' => 'line',
                'typeLocalize' => 'Čiarový',
            ],
            self::BAR => [
                'id' => '2',
                'type' => 'bar',
                'typeLocalize' => 'Stĺpcový',
            ],
        ];
    }
}
