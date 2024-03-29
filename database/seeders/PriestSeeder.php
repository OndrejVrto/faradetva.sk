<?php declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Priest;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class PriestSeeder extends Seeder {
    public function run(): void {
        Priest::create([
            'active'  => '1',
            'titles_before'  => 'ThLic.',
            'first_name'  => 'Ľuboš',
            'last_name'  => 'Sabol',
            'titles_after'  => null,
            'slug'  => Str::slug('ThLic. Ľuboš Sabol'),
            'phone'  => '0904 123 456',
            'email'  => 'dekan@fara.detva.sk',
            'twitter_url'  => null,
            'facebook_url'  => null,
            'www_page_url'  => null,
            'function'  => 'farár - dekan',
            'description'  => 'Vo Farnosti Detva pôsobil už aj ako kaplán v rokoch 1988 - 1990. Kňazskú vysviacku prijal 13. júna 1987. Pochádza z východoslovenskej obce Petrovany. V roku 1999 získal licenciát katolíckej teológie na Lublinskej univerzite v Poľsku. Od októbra 2002 je farárom a dekanom v Detve.',
        ]);

        Priest::create([
            'active'  => '1',
            'titles_before'  => 'Mgr.',
            'first_name'  => 'Marián',
            'last_name'  => 'Juhaniak',
            'titles_after'  => null,
            'slug'  => Str::slug('Mgr. Marián Juhaniak'),
            'phone'  => '(+421) (045) 54 54 123',
            'email'  => 'marian@fara.detva.sk',
            'twitter_url'  => null,
            'facebook_url'  => null,
            'www_page_url'  => null,
            'function'  => 'kaplán',
            'description'  => 'Pochádza z Farnosti Sedembolestnej Panny Márie v Žiari nad Hronom. Pôvodom je zahraničný Slovák z Rumunska. Za kňaza bol vysvätený 18. júna 2016. Po prvom kaplánskom pôsobisku v Banskej Bystrici-meste pôsobí vo Farnosti Detva od júla 2020.',
        ]);

        Priest::create([
            'active'  => '1',
            'titles_before'  => 'Mgr.',
            'first_name'  => 'Pavol ',
            'last_name'  => 'Prieboj',
            'titles_after'  => null,
            'slug'  => Str::slug('Mgr. Pavol Prieboj'),
            'phone'  => '00421907849562',
            'email'  => 'pavol@fara.detva.sk',
            'twitter_url'  => null,
            'facebook_url'  => null,
            'www_page_url'  => null,
            'function'  => 'výpomocný duchovný',
            'description'  => 'Rodák z dolnooravskej obce Chlebnice. Z rúk biskupa Baláža prijal kňazskú vysviacku 21. júna 2003. Ako kaplán pôsobil vo Vrútkach, následne bol prvým správcom farnosti Michalová. Pred príchodom do Detvy v apríli 2019 bol ešte farárom v Bzenici a v Mošovciach.',
        ]);
    }
}
