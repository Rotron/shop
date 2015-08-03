<?php

class UserController extends BaseController
{
	public function index()
	{
		return 'UserController';
	}

  public function postExist()
  {
    if (Request::ajax()) {
      $user = User::where('email', '=', Input::get('email'))->count();
      return Response::json(array(
        'userExist' => $user
      ));
    }
  }
}