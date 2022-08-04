<?php

use Spatie\Valuestore\Valuestore;

if (!function_exists('customConfig')) {
    function customConfig(string $filename = 'config', null|array|string $key = null, null|string|int $default = null): Valuestore|string|null {
        try {
            $valueStore = Valuestore::make(
                storage_path("app/value-store/$filename.json")
            );
        } catch (\Throwable $th) {
            return null;
        }

        if (is_null($key)) {
            return $valueStore;
        }

        if (is_array($key)) {
            return $valueStore->put($key);
        }

        if (!$valueStore->has($key)) {
            $value = $default ?? config($key) ?? null;
            $valueStore->put([ $key => $value ]);
        }

        // info($key.' - '. ($value ? '1' : '0'));
        return $valueStore->get($key);
    }
}

if (!function_exists('prepareInput')) {
    function prepareInput(array|string $input): ?array {
        if (!$input) {
            return null;
        }

        if (is_array($input)) {
            return array_filter(Illuminate\Support\Arr::flatten($input));
        }

        return array_map('trim', explode(',', $input));
    }
}

if (!function_exists('getCacheName')) {
    function getCacheName(array $listOfItems): string {
        return md5(implode('|', $listOfItems));
    }
}

if (!function_exists('minifyHtml')) {
    function minifyHtml(string $html): string {
        // Author:  https://github.com/dipeshsukhia/laravel-html-minify
        $replace = [
            // remove tabs before and after HTML tags
            '/\>[^\S ]+/s' => '>',
            '/[^\S ]+\</s' => '<',
            // shorten multiple whitespace sequences; keep new-line characters because they matter in JS!!!
            '/([\t ])+/s' => ' ',
            // remove leading and trailing spaces
            '/^([\t ])+/m' => '',
            '/([\t ])+$/m' => '',
            // remove JS line comments (simple only); do NOT remove lines containing URL (e.g. 'src="http://server.com/"')!!!
            '~//[a-zA-Z0-9 ]+$~m' => '',
            // remove empty lines (sequence of line-end and white-space characters)
            '/[\r\n]+([\t ]?[\r\n]+)+/s' => "\n",
            // remove empty lines (between HTML tags); cannot remove just any line-end characters because in inline JS they can matter!
            '/\>[\r\n\t ]+\</s' => '><',
            // remove "empty" lines containing only JS's block end character; join with next line (e.g. "}\n}\n</script>" --> "}}</script>"
            '/}[\r\n\t ]+/s'            => '}',
            '/}[\r\n\t ]+,[\r\n\t ]+/s' => '},',
            // remove new-line after JS's function or condition start; join with next line
            '/\)[\r\n\t ]?{[\r\n\t ]+/s' => '){',
            '/,[\r\n\t ]?{[\r\n\t ]+/s'  => ',{',
            // remove new-line after JS's line end (only most obvious and safe cases)
            '/\),[\r\n\t ]+/s' => '),',
            // remove quotes from HTML attributes that does not contain spaces; keep quotes around URLs!
            // '~([\r\n\t ])?([a-zA-Z0-9]+)=\"([a-zA-Z0-9_\\-]+)\"([\r\n\t ])?~s' => '$1$2=$3$4',
            '/(\n|^)(\x20+|\t)/' => "\n",
            '/(\n|^)\/\/(.*?)(\n|$)/' => "\n",
            '/\n/' => " ",
            // remove HTML commnets
            '/\<\!--.*?-->/' => "",
            // # Delete multispace (Without \n)
            '/(\x20+|\t)/' => " ",
            // # strip whitespaces between tags
            '/\>\s+\</' => "><",
            // # strip whitespaces between quotation ("') and end tags
            '/(\"|\')\s+\>/' => "$1>",
            // # strip whitespaces between = "'
            '/=\s+(\"|\')/' => "=$1"
        ];
        return preg_replace(array_keys($replace), array_values($replace), $html);
    }
}

if (!function_exists('formatBytes')) {
    function formatBytes(null|float|int $size, int $precision = 2): string {
        if ($size === 0 || $size === null) {
            return "0B";
        }

        $sign = $size < 0 ? '-' : '';
        $size = abs($size);

        $base = log($size) / log(1024);
        $suffixes = array('B', 'kB', 'MB', 'GB', 'TB');

        return $sign . round(pow(1024, $base - floor($base)), $precision) .' '. $suffixes[floor($base)];
    }
}
