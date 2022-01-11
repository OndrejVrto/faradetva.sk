<?php

declare(strict_types = 1);

namespace Database\Seeders;

use App\Models\FileType;
use Illuminate\Database\Seeder;

class FileTypeSeeder extends Seeder
{
    public function run(): void {
        FileType::create([
            'name'  => 'Banner',
            'slug' => 'banner',
            'description' => 'Úzke obrázky na vrchnú stranu stránky.',
        ]);

        FileType::create([
            'name'  => 'Attachment',
            'slug' => 'attachment',
            'description' => 'Príloha (dokument) na stránke.',
        ]);

        FileType::create([
            'name'  => 'Picture',
            'slug' => 'picture',
            'description' => 'Obrázok v plnej pôvodnej veľkosti',
        ]);

        FileType::create([
            'name'  => 'Comprim picture',
            'slug' => 'comprim-picture',
            'description' => 'Obrázok zmenšený a optimalizovaný',
        ]);

        FileType::create([
            'name'  => 'Picture responsive',
            'slug' => 'picture-responsive',
            'description' => 'Responzívny obrázok generuje viacej veľkostí podľa rozlíšenia mmonitora.',
        ]);

        FileType::create([
            'name'  => 'Galery 1',
            'slug' => 'galery-1',
            'description' => 'Galéria obrázkov číslo 1',
        ]);

        FileType::create([
            'name'  => 'Galery 2',
            'slug' => 'galery-2',
            'description' => 'Galéria obrázkov číslo 2',
        ]);

        FileType::create([
            'name'  => 'Galery 3',
            'slug' => 'galery-3',
            'description' => 'Galéria obrázkov číslo 3',
        ]);

        FileType::create([
            'name'  => 'Galery 4',
            'slug' => 'galery-4',
            'description' => 'Galéria obrázkov číslo 4',
        ]);
    }
}
