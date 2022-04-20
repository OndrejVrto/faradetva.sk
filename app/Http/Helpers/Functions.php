<?php

use Illuminate\Support\Arr;

// if(!function_exists('canRestore'))
// {

//     function can(array $permissions): bool
//     {
//         return
//             auth()->user()->hasAnyPermission($permissions)
//             OR
//             auth()->user()->hasRole('Super Administrátor')
//             ? true
//             : false;
//     }
// }

if(!function_exists('prepareInput'))
{
    function prepareInput($input): ?array {
        if (!$input) {
            return null;
        }

        if (is_string($input)) {
            return array_map('trim', explode(',', $input));
        }

        if (is_array($input)) {
            return array_filter(Arr::flatten($input));
        }
    }
}

if (!function_exists('getCacheName'))
{
    function getCacheName(array $listOfItems): string
    {
        return md5(implode('|', $listOfItems));
    }
}