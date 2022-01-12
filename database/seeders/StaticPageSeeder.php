<?php

namespace Database\Seeders;

use App\Models\StaticPage;
use Illuminate\Database\Seeder;

class StaticPageSeeder extends Seeder
{
    public function run()
    {
        StaticPage::create([
            'url' => 'o-nas/patron-farnosti',
            'route_name' => 'about-us.patron-francisco-assisi',
            'title' => 'Svätý František',
            'description' => 'Patrón farnosti Detva - sv.František s Assisi.',
            'keywords' => 'František, Assisi, Detva, patrón, história, svete',
            'author' => 'Marián Juhaniak',
            'header' => 'Svätý František z Assisi',
            'created_by' => rand(2,5),
            'updated_by' => rand(2,5),
        ]);

        StaticPage::create([
            'url' => 'pastoracia/farska-rada',
            'route_name' => 'static.about-us.pastoration.parish-council',
            'title' => 'Farská rada',
            'description' => 'Zoznam členov farskej rady a popis fungovania',
            'keywords' => 'rada, fara, zoznam, pastoračná, organizačná, zložka, dekan, kaplán, ekonomika, štatistika',
            'author' => 'Ľuboš Sabol',
            'header' => 'Farská rada farnosti Detva',
            'created_by' => rand(2,5),
            'updated_by' => rand(2,5),
        ]);

        StaticPage::create([
            'url' => 'spolocenstva/faustinum',
            'route_name' => 'static.community.faustinum',
            'title' => 'Faustinum',
            'description' => 'Spoločenstvo Faustinum a jeho história v Detvianskom dekanáte',
            'keywords' => 'Detva, Faustínum, tretí rád, duchovný život, laici',
            'author' => 'Mgr. Pavol Prieboj',
            'header' => 'Združenie apoštolov Božieho milosrdenstva Faustinum',
            'created_by' => rand(2,5),
            'updated_by' => rand(2,5),
        ]);
    }
}
