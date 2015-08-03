<?php

class CheckoutController extends BaseController {

    public function index()
    {
        if (!Cart::total()) {
            return Redirect::to(asset('cart'));
        }
        return View::make('shop.checkout', [/*'setting' => Config::get('setting'),*/ 'cart' => Cart::content()]);
    }

    public function postUpdate()
    {
        if (Request::ajax()) {
            $productId = Input::get('productId');
            $quantity = Input::get('quantity');
            
            $rows = Cart::search(['id' => $productId]);
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
        $rules = [
            'firstname' => 'required|min:2',
            'lastname' => 'required|min:2',
            'address' => 'required|min:5',
            'phone' => 'required|min:7',
        ];

        if (!Auth::check()) {
            array_push($rules, ['email' => 'required|email|unique:users']);
        }

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to("checkout")
                ->withErrors($validator)
                ->withInput(Input::except(''));
        } else {
            if (Auth::check()) {
                $user = User::find(Auth::user()->id);
            } else {
                $user = new User;
                $user->email = Input::get('email');
                $password = str_random(10);
                $user->password = Hash::make($password);
            }

            $user->firstname = Input::get('firstname');
            $user->lastname = Input::get('lastname');
            $user->address = Input::get('address');
            $user->phone = Input::get('phone');

            if ($user->save()) {
                $role = Role::where('name', '=', 'Customer')->first();
                if (!$user->hasRole("Customer")) {
                    $user->roles()->attach($role->id);
                }
                $order = new Order;
                $order->user_id = $user->id;
                $order->status_id = OrderStatus::where('title', '=', 'Новый')->first()->id;
                $order->comment = 'Телефон: <b>' . $user->phone . '</b><br>Адрес: <b>' 
                    . $user->address . '</b><br>Комментарий покупателя: ' 
                    . '<i>' . Input::get('comment') . '</i>';
 
                if ($order->save()) {
                    $cart = Cart::content();
                    foreach($cart as $product) {
                        $orderDetails = new OrderDetails;
                        $orderDetails->order_id = $order->id;
                        $orderDetails->product_id = $product->id;
                        $orderDetails->quantity = $product->qty;
                        $orderDetails->price = $product->price;
                        $orderDetails->save();
                    }
                }

                if (!Auth::check()) {
                    Mail::send('mail.registration', ['firstname' => $user->firstname, 'login' => $user->email,
                        'password' => $password, 'setting' => Config::get('setting')], function($message) {
                        $message->to(Input::get('email'))->subject("Регистрация прошла успешно");
                    });
                }

                $orderId = $order->id;

                Mail::send('mail.order', ['cart' => $cart, 'order' => $order, 'phone' => $user->phone, 
                    'user' => $user->firstname . ' ' . $user->lastname], function($message) use ($orderId) {
                    $message->to(Input::get('email'))->subject("Ваша заявка №{$orderId} принята");
                });

                Cart::destroy();
                return Redirect::to("checkout/thanks/spasibo-vash-zakaz-prinyat")->with('successcart', 'ok', ['cart' => $cart]);
            }
        }
    }

    public function thanks($link) {
        return View::make('page', ['page' => Page::where('link', '=', $link)->firstOrFail(),
        'setting' => Config::get('setting')]);
    } 

    public function postDelete()
    {
        if (Request::ajax()) {
            $productId = Input::get('productId');
            
            $rows = Cart::search(['id' => $productId]);
            $rowId = $rows[0];
            Cart::update($rowId, 0);

            $total = Cart::total();

            return Response::json([
              'productId' => $productId,
              'quantity' => $quantity,
              'total' => $total
            ]);
        }
    }
}