
<?php

class PortfolioTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('portfolios')->truncate();
        DB::table('portfolios')->delete();
        Portfolio::create(array(
            'user_id' => '1',
            'title' => 'Наша работа заголовок',
            'link' => 'best',
            'description' => 'Наша работа описание',
            'images' => 0,
            'active' => 1,
            'meta_title' => 'Наша работа мета заголовок',
            'meta_description' => 'Наша работа мета описание',
            'meta_keywords' => 'Наша работа ключевые слова',
        ));
    }

}
