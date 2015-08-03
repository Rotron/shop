
<?php

class ProductCategoryTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('products_categories')->truncate();
        $sql = file_get_contents(app_path() . '/database/sql/products_categories.sql');
        DB::unprepared($sql);
    }

}