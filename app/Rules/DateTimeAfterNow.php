<?php

namespace App\Rules;

use DateTimeZone;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Contracts\Validation\Rule;

class DateTimeAfterNow implements Rule
{
    private $user_timezone;

    public function __construct($timezone) {
        $this->user_timezone = $timezone;
    }

    public function passes($attribute, $value) {
        $app_timezone = Config::get('app.timezone');

        $nowInApp = Carbon::now(new DateTimeZone($app_timezone));
        $valueFromTZ = Carbon::createFromFormat('Y-m-d H:i:s', $value, $this->user_timezone)
                        ->setTimezone($app_timezone);

        return $valueFromTZ->greaterThanOrEqualTo($nowInApp);
    }

    public function message() {
        return 'Zvolený čas musí byť v "budúcnosti".';
    }
}
