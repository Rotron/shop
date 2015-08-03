<?php

class DatabaseSeeder extends Seeder 
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
        $this->call('ArticleTableSeeder');
        $this->call('PostTableSeeder');
        $this->call('FaqTableSeeder');
        $this->call('PageTableSeeder');
        $this->call('UserTableSeeder');
        $this->call('PortfolioTableSeeder');
        $this->call('CategoryTableSeeder');
        $this->call('ProductCategoryTableSeeder');
        $this->call('ProductTableSeeder');
        $this->call('OrderStatusTableSeeder');
    }
}
