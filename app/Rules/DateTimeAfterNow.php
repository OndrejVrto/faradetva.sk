<?php declare(strict_types=1);

namespace App\Rules;

use DateTimeZone;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Contracts\Validation\Rule;

class DateTimeAfterNow implements Rule {
    public function __construct(private readonly string $user_timezone) {
    }

    public function passes(mixed $attribute, mixed $value): bool {
        $app_timezone = Config::get('app.timezone');

        $nowInApp = Carbon::now(new DateTimeZone($app_timezone));
        $valueFromTZ = Carbon::createFromFormat('Y-m-d H:i:s', $value, $this->user_timezone)
                        ->setTimezone($app_timezone);

        return $valueFromTZ->greaterThanOrEqualTo($nowInApp);
    }

    public function message(): string|array {
        return 'Zvolený čas musí byť v "budúcnosti".';
    }
}
