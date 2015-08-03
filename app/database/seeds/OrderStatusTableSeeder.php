
<?php

class OrderStatusTableSeeder extends Seeder
{

    public function run()
    {

        DB::table('order_status')->truncate();
        DB::table('order_status')->delete();
        OrderStatus::create(array(
            'id' => 1,
            'title' => 'Новый',
        ));

        OrderStatus::create(array(
            'id' => 2,
            'title' => 'Обрабатывается',
        ));

        OrderStatus::create(array(
            'id' => 3,
            'title' => 'Отправлен',
        ));

        OrderStatus::create(array(
            'id' => 4,
            'title' => 'Выполнен',
        ));

        OrderStatus::create(array(
            'id' => 5,
            'title' => 'Отменен',
        ));
    }

}