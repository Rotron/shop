<?php

class AdminCustomerController extends BaseController
{
  public function index()
  {
    //var_dump( Role::where('name', '=', 'Customer')->first()->id); die;
    return View::make("admin.shop.customer.index",
        //User::with('roles')->find(1);
        ['items' => Role::find(1)->users()->get()]
        //['items' => Role::where('name', '=', 'Customer')->get()]
    );
    return View::make('admin/users/user');
  }

  public function addPost()
  {
    return View::make('admin/users/user');
  }

  public function add()
  {
    return View::make('admin/users/user');
  }

}