
<?php

class VideoTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('videos')->truncate();
        DB::table('videos')->delete();
        Video::create(array(
            'user_id' => '1',
            'title' => 'Первое видео',
            'link' => 'best',
            'active' => 1,
            'meta_title' => 'Первое видео мета заголовок',
            'meta_description' => 'Первое видео мета описание',
            'meta_keywords' => 'Первое видео ключевые слова',
        ));
    }

}
