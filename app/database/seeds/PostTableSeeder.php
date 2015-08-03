
<?php

class PostTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->truncate();
        $sql = file_get_contents(app_path() . '/database/sql/posts.sql');
        DB::unprepared($sql);
    }
}
