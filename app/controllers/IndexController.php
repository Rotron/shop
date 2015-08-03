<?php

class IndexController extends BaseController
{
  public function index()
  {
    //var_dump(Config::get('setting.test')); die;
    return View::make('main/index', ['setting' => Config::get('setting')]);
  }
}