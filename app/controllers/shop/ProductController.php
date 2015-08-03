<?php

class ProductController extends BaseController 
{
    public function showProduct($link)
    {

      $rows = Cart::search(array('id' => (string) Product::where('link', '=', $link)->firstOrFail()->id));

      return View::make('shop.product', ['product' => Product::where('link', '=', $link)->firstOrFail(),
            'setting' => Config::get('setting'), 'rowId' => $rows[0]]);
    }

    public function search()
    {

        $category = Input::get('category');
        $text = Input::get('text');

        $products = Product::whereRaw(
            "MATCH(name, content) AGAINST(? IN BOOLEAN MODE)",
            array($text)
        )->get();

        return View::make('shop.products', ['products' => $products, 'text' => $text]);
    }
}