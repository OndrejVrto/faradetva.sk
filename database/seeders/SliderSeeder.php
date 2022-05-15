<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    public function run(): void {
        Slider::create([
            'active'  => '1',
            'heading_1' => 'BOH',
            'heading_2' => 'Je všade',
            'heading_3' => 'Ľúbi Vás',
        ]);

        Slider::create([
            'active'  => '1',
            'heading_1' => 'Človek sa neutopí preto,',
            'heading_2' => 'lebo sa ponorí, ale preto,',
            'heading_3' => 'že zostane pod vodou.',
        ]);

        Slider::create([
            'active'  => rand(0,1),
            'heading_1' => 'Viera v boha ťa zachrani.',
            'heading_2' => 'Nevera v boha',
            'heading_3' => 'ťa zabije.',
        ]);
    }
}
