<?php

declare(strict_types = 1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class RawSqlSeeder extends Seeder
{
    public function run(): void {

        $sqlFiles = [
            'demo-data'
            // 'prayers',
            // 'day-ideas',
            // 'static_pages',
            // 'site-search-config',
        ];

        foreach ($sqlFiles as $file) {
            //path to sql files
            $sql = base_path("database/raw/$file.sql");

            //collect contents and pass to DB::unprepared
            if (File::exists($sql)) {
                DB::unprepared(file_get_contents($sql));
                $this->command->info('RAW SQLs "'.$file.'" seeding successfully.');
            }
        }
    }
}
