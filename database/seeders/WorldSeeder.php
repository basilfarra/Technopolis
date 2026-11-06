<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Countries, states and cities (phpMyAdmin dump). Runs through the application's own
        // database connection (.env), one statement at a time, so no MySQL CLI or root account is needed.
        $sql = file_get_contents(database_path('data/course_ecommerce_world.sql'));

        foreach (preg_split('/;\s*\R/', $sql) as $statement) {
            if (trim($statement) !== '') {
                DB::unprepared($statement);
            }
        }
    }
}
