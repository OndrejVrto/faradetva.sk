<?php

namespace App\Services;

class TreeService
{
    public function __construct(
        private int $layers,
        private bool $lightVersion = false,
        private string $charTriagle = '*',
        private string $charStump = '|',
    ){}

    public function print(): array {

        $triangle = $this->triangle(
            count       : $this->layers,
            lightVersion: $this->lightVersion,
            char        : $this->charTriagle,
        );

        $stump = $this->stump(
            count : $this->layers,
            height: 2,
            char  : $this->charStump,
        );

        return array_merge($triangle, $stump);
    }

    private function triangle($count, bool $lightVersion = false, string $char = '*'): array {
        for ($i = 1;$i <= $count; $i++) {
            $onelayer = '';

            // spaces
            for ($j = $count - $i; $j > 0; $j--) {
                $onelayer .=" ";
            }

            // chars
            if ($lightVersion) {
                for ($k = 1; $k <= $i; $k++) {
                    $onelayer .= $char.' ';
                }
            } else {
                for ($k = 2; $k <= 2*$i; $k++) {
                    $onelayer .= $char;
                }
            }

            $triangle[$i] = $onelayer;
        }

        return $triangle;
    }

    private function stump(int $count, int $height = 2, string $char = '|'): array {
        for ($i = 1;$i <= $height; $i++) {
            $stump[$i] = str_repeat(' ', $count-1) . $char;
        }

        return $stump;
    }
}
