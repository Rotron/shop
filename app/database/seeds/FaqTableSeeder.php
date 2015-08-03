
<?php

class FaqTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('faqs')->truncate();
        DB::table('faqs')->delete();
        for ($i=0; $i < 20; $i++) {
            Faq::create(array(
                'user_id' => '1',
                'title' => 'Тестовый вопрос - ' . $i,
                'content' => 'Тестовый ответ - ' . $i,
                'active' => 1,
                'meta_title' => 'Тестовый ответ мета заголовок - ' . $i,
                'meta_description' => 'Тестовый вопрос мета описание - ' . $i,
                'meta_keywords' => 'Тестовый вопрос ключевые слова - ' . $i,
                'published_at' => '2015-01-28 16:50:01',
            ));
        }

    }

}
