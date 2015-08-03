<?php

class PageTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('pages')->truncate();
        $sql = file_get_contents(app_path() . '/database/sql/pages.sql');
        DB::unprepared($sql);
    }
}