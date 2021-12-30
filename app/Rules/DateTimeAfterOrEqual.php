<?php

namespace App\Rules;

use DateTime;
use DateTimeZone;
use Seld\PharUtils\Timestamps;
use App\Http\Helpers\DataFormater;
use Illuminate\Contracts\Validation\Rule;

class DateTimeAfterOrEqual implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
		// get date and time NOW() with correct timezone (default TZ: Europe/Bratislava)
		$today_date = DataFormater::changeDateTimezone('now');

		$current_date = strtotime($today_date);
		$future_date = strtotime($value);

		return $current_date<=$future_date;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Dátum a čas musí byť rovnaký alebo väčší ako je teraz.';
    }
}
