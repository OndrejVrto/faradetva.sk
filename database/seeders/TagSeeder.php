<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder {
    public function run(): void {

        // TODO: description
        $tags = [
            'adorácia'     => '',
            'birmovka'     => '',
            'bohoslužba'   => '',
            'cintorín'     => '',
            'Cirkev'       => '',
            'deti'         => '',
            'dekanát'      => 'Oznamy z dekanátu Detva',
            'charita'      => '',
            'história'     => 'Naša minulosť',
            'kalvária'     => '',
            'kaplnka'      => '',
            'Karmel'       => '',
            'kláštor'      => '',
            'kostol'       => 'O kostole',
            'krst'         => 'Články súvisiace s krstom',
            'miništranti'  => '',
            'mládež'       => '',
            'modlitba'     => 'Modlitba a rozjímanie',
            'oznam'        => 'Farské oznamy',
            'pohreb'       => '',
            'pomoc'        => '',
            'povolanie'    => '',
            'práca'        => '',
            'prijímanie'   => '',
            'púť'          => '',
            'relax'        => '',
            'rodičia'      => '',
            'seniori'      => '',
            'služba'       => '',
            'sobáš'        => '',
            'spevokol'     => '',
            'spoločenstvo' => '',
            'spoveď'       => '',
            'svätosť'      => '',
            'sviatok'      => '',
            'škola'        => '',
            'šport'        => '',
            'turistika'    => '',
        ];

        foreach ($tags as $key => $value) {
            Tag::create([
                'title' => $key,
                'description' => $value,
                'slug' => Str::slug($key),
            ]);
        }
    }
}
