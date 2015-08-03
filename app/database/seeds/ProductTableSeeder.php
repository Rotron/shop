
<?php

class ProductTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->truncate();
        //DB::table('shop_products')->delete();
        $sql = file_get_contents(app_path() . '/database/sql/products.sql');
        DB::unprepared($sql);
    }

}
