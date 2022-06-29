<?php

namespace App\Services;

class TreeService
{
    public function __construct(
        private int $layer
    ){}

    public function print() {
        $triangle = $this->triangle($this->layer);
        $stump = $this->stump($this->layer);

        return array_merge($triangle, $stump);
    }

    private function triangle($count, string $char = '*'): array {
        for ($i = 1;$i <= $count; $i++) {
            $onelayer = '';
            for ($j = $count - $i; $j > 0; $j--) {
                $onelayer .=" ";
            }
            for ($k = 2; $k <= 2*$i; $k++) {
                $onelayer .= $char;
            }
            $triangle[$i] = $onelayer;
        }

        return $triangle;
    }

    private function stump(int $count, int $height = 2, string $char = '|'){
        for ($i = 1;$i <= $height; $i++) {
            $stump[$i] = str_repeat(' ', $count-1) . $char;
        }

        return $stump;
    }
}
