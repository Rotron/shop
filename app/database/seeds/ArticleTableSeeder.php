
<?php

class ArticleTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('articles')->truncate();
        $sql = file_get_contents(app_path() . '/database/sql/articles.sql');
        DB::unprepared($sql);
    }
}