<?php

class AdminOrderController extends AdminController
{
    public function index()
    {
        $orders = DB::table('orders as o')
            ->join('users as u', 'o.user_id', '=', 'u.id')
            ->join('order_status as os', 'o.status_id', '=', 'os.id')
            ->join('orders_details as od', 'o.id', '=', 'od.order_id')
            ->select('o.id', DB::raw('CONCAT(u.firstname, " ", u.lastname) AS fullname'), 'os.title', 'o.created_at', DB::raw('SUM(od.price) AS total'))
            ->groupBy('o.id')
            ->get();

        return View::make("admin.shop.order.index",
            ['items' => $orders, 'name' => $this->name, 'action' => $this->action]
        );
    }

    public function add()
    {
        if (Request::isMethod('post')) {
            $rules = array(
                'title' => 'required|min:4',
                'link' => 'required|unique:{$this->table}',
                'content' => 'required|min:100',
                'meta_keywords' => 'required',
            );
            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails()) {
                return Redirect::to("admin/{$this->name}/{$this->action}")
                    ->withErrors($validator)
                    ->withInput(Input::except(''));
            } else {
                $table = new ShopOrder;
                $table->title            = Input::get('title');
                $table->link             = Input::get('link');
                $table->user_id          = Auth::user()->id;
                $table->content          = Input::get('content');
                $table->meta_title       = Input::get('meta_title') ? Input::get('meta_title') : $table->title;
                $table->meta_description = Input::get('meta_description') ? Input::get('meta_description') : $table->description;
                $table->meta_keywords    = Input::get('meta_keywords');
                $table->published_at     = ShopOrder::toDate(Input::get('published_at'));
                $table->active           = Input::get('active', 0);

                if ($table->save()) {
                    $name = trans("name.{$this->name}");
                    return Redirect::to("admin/{$this->name}")->with('success', trans("message.{$this->action}", ['name' => $name]));
                }

                return Redirect::to("admin/{$this->name}")->with('error', trans('message.error'));
            }
        }

        return View::make("admin.{$this->name}.{$this->action}",
            ['name' => $this->name, 'action' => $this->action]
        );
    }

    public function edit($id)
    {
        if (Request::isMethod('post')) {
            $rules = array(
                'status_id' => 'required',
            );
            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails()) {
                return Redirect::to("admin/{$this->name}/{$id}/{$this->action}")
                    ->withErrors($validator)
                    ->withInput(Input::except(''));
            } else {
                $table = Order::find($id);
                $table->status_id         = Input::get('status_id');
                if ($table->save()) {
                    $name = trans("name.{$this->name}");
                    return Redirect::to("admin/{$this->name}")->with('success', trans("message.{$this->action}", ['name' => $name]));
                }

                return Redirect::to("admin/{$this->name}")->with('error', trans('message.error'));
            }
        }

        $order = DB::table('orders as o')
            ->join('users as u', 'o.user_id', '=', 'u.id')
            ->join('order_status as os', 'o.status_id', '=', 'os.id')
            ->join('orders_details as od', 'o.id', '=', 'od.order_id')
            ->select('o.id', DB::raw('CONCAT(u.firstname, " ", u.lastname) AS fullname'), 'os.title', 'o.created_at', DB::raw('SUM(od.price) AS total'), 'o.comment', 'o.status_id')
            ->where('o.id', $id)->first();

        $products = DB::table('products as p')
            ->join('orders_details as od', 'p.id', '=', 'od.product_id')
            ->join('orders as o', 'od.order_id', '=', 'o.id')
            ->select('p.id', 'p.link', 'p.name', 'od.price', 'od.quantity', DB::raw('od.price * od.quantity AS total'))
            ->where('o.id', $id)
            ->orderBy('o.id', 'asc')->get();

        $ordersStatus = OrderStatus::all();
        foreach ($ordersStatus as $status) {
            $orderStatus[$status['id']] = $status['title'];
        }

        return View::make("admin.shop.order.edit", 
            ['item' => $order, 'name' => $this->name, 'action' => $this->action, 'status' => $orderStatus, 'products' => $products]
        );
    }

    public function delete($id)
    {

        $table = Order::find($id);

        if ($table->delete()) {
            $name = trans("name.{$this->name}");
            return Redirect::to("admin/{$this->name}")->with('success', trans("message.{$this->action}", ['name' => $name]));
        }

        return Redirect::to("admin/{$this->name}")->with('error', trans('message.error'));
    }
}