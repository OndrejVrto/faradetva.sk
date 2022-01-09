<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //path to sql file
        $sql = base_path('database/raw/news.sql');

        //collect contents and pass to DB::unprepared
        if(File::exists($sql)){
            DB::unprepared(file_get_contents($sql));
            $this->command->info('News seeding successfully.');
        }
    }
}
