<?php

declare(strict_types = 1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class DayIdeaSeeder extends Seeder
{
    public function run(): void {
        //path to sql file
        $sql = base_path('database/raw/day-ideas.sql');

        //collect contents and pass to DB::unprepared
        if(File::exists($sql)){
            DB::unprepared(file_get_contents($sql));
            $this->command->info('File seeding successfully.');
        }
    }
}
