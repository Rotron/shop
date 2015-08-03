<?php

class CartController extends BaseController {

    public function index()
    {
        return View::make('shop.cart', ['setting' => Config::get('setting'), 'cart' => Cart::content()]);
    }

    public function postUpdate()
    {
        if (Request::ajax()) {
            $productId = Input::get('productId');
            $quantity = Input::get('quantity');
            
            $rows = Cart::search(array('id' => $productId));
            $rowId = $rows[0];
            Cart::update($rowId, $quantity);

            $total = Cart::total();

            return Response::json(array(
              'productId' => $productId,
              'quantity' => $quantity,
              'total' => $total
            ));
        }
    }

    public function postAdd()
    {
        if (Request::ajax()) {
            $productId = Input::get('productId');
            $product = Product::findOrFail($productId);
            $name = Input::get('name');
            $price = Input::get('price');
            $link = 'product/' . $product->link;
            Cart::add(['id' => $productId, 'name' => $name, 'qty' => 1, 'price' => $price, 'options' => ['link' => $link]]);

            return Response::json(array(
              'productId' => $productId,
              'name' => $name,
              'price' => $price,
              'link' => $product->link
            ));
        }
    }

    public function postDelete()
    {
        if (Request::ajax()) {
            $productId = Input::get('productId');
            
            $rows = Cart::search(array('id' => $productId));
            $rowId = $rows[0];
            Cart::update($rowId, 0);

            $total = Cart::total();

            return Response::json(array(
              'productId' => $productId,
              'quantity' => $quantity,
              'total' => $total
            ));
        }
    }
}