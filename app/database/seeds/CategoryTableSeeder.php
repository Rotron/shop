
<?php

class CategoryTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('categories')->truncate();
        $sql = file_get_contents(app_path() . '/database/sql/categories.sql');
        DB::unprepared($sql);
    }

}
