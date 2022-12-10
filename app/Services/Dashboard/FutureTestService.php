<?php declare(strict_types=1);

namespace App\Services\Dashboard;

use Carbon\Carbon;
use App\Models\News;
use App\Models\StaticPage;
use App\Jobs\GenerateSitemapJob;
use Cohensive\OEmbed\Facades\OEmbed;
use Illuminate\Support\Facades\Auth;

class FutureTestService {
    private function gate(): bool {
        $user = Auth::user();
        return $user->hasRole('Super Administrátor');
    }

    // any test code or service here
    public function run() {
        if (!$this->gate()) {
            return;
        }


        $news = News::find(11);
        $homepage = StaticPage::find(73); // home page

        // visits(News::class)->reset('lists');

        dd(
            visits(News::class)->count(),
            visits(News::class)->topIds(10, ['active' => true]),
            visits(News::class)->top(10, ['active' => true]),

            visits($news)->count(),
            visits($news)->countries(),
            // visits($news)->refs(),
            visits($news)->operatingSystems(),
            visits($news)->languages(),

            visits(StaticPage::class)->count(),
            visits(StaticPage::class)->top(10, ['active' => true]),
            visits($homepage)->count(),
            visits($homepage)->countries(),
            // visits($homepage)->refs(),
            visits($homepage)->operatingSystems(),
            visits($homepage)->languages(),
        );




        dd(
            Carbon::now()->toISOString(),
            Carbon::now()->getTimestamp(),
            Carbon::parse(customConfig('crawler', 'CRAWLER.url_check', null))
            ->format('d.m.Y H:m')
        );

        // customConfig('crawler')->put('CRAWLER.sitemap', Carbon::now()->toISOString());


        // $url = 'https://www.facebook.com/Farnos%C5%A5-Detva-103739418174148';

        (new GenerateSitemapJob())->handle();
        exit;

        $drive = '.';
        $freespace          = disk_free_space($drive);
        $total_space        = disk_total_space($drive);
        $usedDiskSpace      = $freespace ? $total_space - $freespace : 0;
        $percentage_free    = $freespace ? 100 - round($freespace / $total_space, 2) * 100 : 0;


        /* Show in HTML */
        echo("<b>".$drive."</b> has [".$percentage_free."] % free diskspace<br>");
        echo("<b>".$drive."</b> has [".round($total_space/1024/1024)."]MB totalspace<br>");
        echo("<b>".$drive."</b> has [".round($freespace/1024/1024)."] MB free diskspace<br>");
        echo("<b>".$drive."</b> has [".round($usedDiskSpace /1024/1024)."] MB used diskspace<br>");
        exit;

        $input = 'pdf';
        $output = [
            'pdf' => 'book',
            'txt' => 'text',
        ][$input];

        dd($output);

        // $this->dispatch(new GenerateSitemapJob);


        $foldersWithSubfolders = [
            '01 duchovny-zivot',
            '02 duchovny-zivot-svate-omse',
            '03 duchovny-zivot-sveteniny',
            '04 duchovny-zivot-sveteniny-ministeria',
            '05 duchovny-zivot-sveteniny-poboznosti',
            '06 duchovny-zivot-sveteniny-pohreb',
            '07 duchovny-zivot-sveteniny-pozehnania',
            '08 duchovny-zivot-sveteniny-putovanie',
            '09 duchovny-zivot-sviatosti',
            '10 duchovny-zivot-sviatosti-birmovanie',
            '11 duchovny-zivot-sviatosti-eucharistia',
            '12 duchovny-zivot-sviatosti-krst',
            '13 duchovny-zivot-sviatosti-manzelstvo',
            '14 duchovny-zivot-sviatosti-pomazanie-chorych',
            '15 duchovny-zivot-sviatosti-posvatny-stav',
            '16 duchovny-zivot-sviatosti-spoved',
            '17 duchovny-zivot-zivot-viery',
            '18 duchovny-zivot-zivot-viery-bozie-prikazania',
            '19 duchovny-zivot-zivot-viery-cirkevne-prikazania',
            '20 duchovny-zivot-zivot-viery-etiketa-v-kostole',
            '21 duchovny-zivot-zivot-viery-modlitba',
            '22 duchovny-zivot-zivot-viery-svate-pismo',
            '23 duchovny-zivot-zivot-viery-viera-v-boha',
            '24 kontakty',
            '25 o-nas',
            '26 o-nas-historia',
            '27 o-nas-historia-dejiny-farnosti-detva',
            '28 o-nas-historia-duchovne-povolania',
            '29 o-nas-historia-farari-v-detve',
            '30 o-nas-historia-chudobienec',
            '31 o-nas-historia-kaplani-v-detve',
            '32 o-nas-historia-knazi-pochovany-v-detve',
            '33 o-nas-historia-statistiky',
            '34 o-nas-historia-vianoce-v-detve',
            '35 o-nas-historia-vyznamne-osobnosti',
            '36 o-nas-historia-vyznamne-osobnosti-anton-prokop',
            '37 o-nas-historia-vyznamne-osobnosti-imrich-durica',
            '38 o-nas-historia-vyznamne-osobnosti-jozef-zavodsky',
            '39 o-nas-historia-vyznamne-osobnosti-karol-anton-medvecky',
            '40 o-nas-historia-vyznamne-osobnosti-mons-jan-strban',
            '41 o-nas-historia-vyznamne-osobnosti-prof-thdr-jozef-buda',
            '42 o-nas-pastoracia',
            '43 o-nas-pastoracia-akolyti',
            '44 o-nas-pastoracia-farska-rada',
            '45 o-nas-pastoracia-kostolnici',
            '46 o-nas-pastoracia-lektori',
            '47 o-nas-pastoracia-ministranti',
            '48 o-nas-pastoracia-organisti-spevaci',
            '49 o-nas-pastoracia-spevokoly-a-dychovka',
            '50 o-nas-pastoracia-vyucovanie-nabozenstva',
            '51 o-nas-patron-farnosti',
            '52 o-nas-sakralne-objekty',
            '53 o-nas-sakralne-objekty-detvianske-krize',
            '54 o-nas-sakralne-objekty-farsky-kostol-sv-frantiska-z-assisi-v-detve',
            '55 o-nas-sakralne-objekty-kalvaria-kaplnky',
            '56 o-nas-sakralne-objekty-klastorny-kostol-karmel',
            '57 o-nas-sakralne-objekty-pricestne-sochy',
            '58 oznamy-farske-oznamy',
            '59 oznamy-rozpis-akolytov',
            '60 oznamy-rozpis-lektorov',
            '61 oznamy-vsetky',
            '62 spolocenstva',
            '63 spolocenstva-barka',
            '64 spolocenstva-frantiskansky-svetstky-rad',
            '65 spolocenstva-hnutie-krestanskych-rodin',
            '66 spolocenstva-katolicka-charizmaticka-obnova',
            '67 spolocenstva-marianske-veceradlo',
            '68 spolocenstva-modlitby-matiek',
            '69 spolocenstva-rad-bosych-karmelitanok',
            '70 spolocenstva-ruzencove-bratstvo',
            '71 spolocenstva-saleziansky-spolupracovnici',
            '72 spolocenstva-sluzobnici-jezisovho-velknazskeho-srdca',
            '73 spolocenstva-svetsky-rad-bosych-karmelitanov',
            '74 spolocenstva-zdruzenie-faustinum',
            '_x3 Všetky stránky',
            '_x4 Otázky a odpovede',
        ];

        $folders = [
            '__Spoločné',
            '_Sekcia - Kňazi [230x270]',
            '_Sekcia - Modlitby [1920x800]',
            '_Sekcia - Slider [1920x800]',
            '_Sekcia - Spoločné Banery [1920x480]',
            '_Sekcia - Svedectvá [120x120]',
            'xxx1 Hlavná stránka',
            'xxx2 Články',
            'xxx5 Hľadať',
        ];

        $subFolders = [
            '_Banner [1920x480]',
            '_Obrázky',
            '_Repre. [960x480]',
            'Galéria',
            'FaQ',
            'Prílohy',
        ];

        $path = 'e:/zmaz/obrazky';

        // foreach($folders as $folder) {
        //     if (!file_exists($path.'/'.$folder)) {
        //         mkdir($path.'/'.$folder, 0777, true);
        //     }
        // }

        // foreach($foldersWithSubfolders as $folder) {
        //     foreach ($subFolders as $subFolder) {
        //         if (!file_exists($path.'/'.$folder.'/'.$subFolder)) {
        //             mkdir($path.'/'.$folder.'/'.$subFolder, 0777, true);
        //         }
        //     }
        // }


        // Either use Facade:
        $embed = OEmbed::get('https://www.youtube.com/watch?v=W4UE2y4APAE');

        if ($embed) {
            // Print default embed html code.
            // echo $embed->html();
            dump($embed->html());

            // Print embed html code with custom width. Works for IFRAME and VIDEO html embed code.
            // echo $embed->html(['width' => 600]);
            dump($embed->html(['width' => 600]));

            // Checks if embed data contains details on thumbnail.
            // $embed->hasThumbnail();
            dump($embed->hasThumbnail());

            // Returns an array containing thumbnail details: url, width and height.
            // $embed->thumbnail();
            dump($embed->thumbnail());

            // Return thumbnail url if it exists or null.
            // $embed->thumbnailUrl();
            dump($embed->thumbnailUrl());

            // Returns an array containing all available embed data including default HTML code.
            // $embed->data();
            dd($embed->data());
        }
    }
}
