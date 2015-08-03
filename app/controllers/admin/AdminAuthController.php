<?php

class AdminAuthController extends AdminController
{
    public function index()
    {
        return View::make('admin/main/index');
    }

    public function login()
    {
        return View::make('admin/main/login');
    }

    public function postLogin()
    {
        $rules = array(
            'email' => 'required|email|exists:users',
            'password' => 'required|min:4|max:32'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('admin/login')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        }

        $user = User::where('email', '=', Input::get('email'))->first();

        if ($user->hasRole("Admin")) {
            $userdata = array(
                'email' => Input::get('email'),
                'password' => Input::get('password')
            );

            if (Auth::attempt($userdata)) {
                return Redirect::to('admin');
            } else {
                return Redirect::to('admin/login');
            }
        }
        return Redirect::to('admin/login');

    }

    public function logout()
    {
        Auth::logout();
        return Redirect::to('admin/login');
    }
 
}