<?php

class AuthController extends BaseController {

    public function getRegistration()
    {
        return View::make('auth/registration', ['article' => Article::active()->orderBy('created_at', 'asc')->get(),
            'setting' => Config::get('setting')]);
    }

    public function postRegistration()
    {
        $rules = array(
            'firstname' => 'required|min:2',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:32'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to("login")
                ->withErrors($validator)
                ->withInput(Input::except(''));
        }

        $password = Input::get('password');
        $table = new User;
        $table->firstname = Input::get('firstname');
        $table->email = Input::get('email');
        $table->password = Hash::make($password);

        if ($table->save()) {
            $role = Role::where('name', '=', 'Customer')->first();
            $table->attachRole( $role );

            Mail::send('mail.registration', ['firstname' => $table->firstname, 'login' => $table->email,
                'password' => $password, 'setting' => Config::get('setting')], function($message) {
                $message->to(Input::get('email'))->subject("Регистрация прошла успешно");
            });
            return Redirect::to(asset('page/spasibo-za-registratsiyu'))->with('success', trans("message.success"));
        }

        return Redirect::to("login")->with('error', trans('message.error'));
    }

    public function getLogin()
    {
        return View::make('auth/login', ['article' => Article::active()->orderBy('created_at', 'asc')->get(),
            'setting' => Config::get('setting')]);
    }

    public function postLogin()
    {
        $rules = array(
            'email' => 'required|email',
            'password' => 'required|min:6|max:32'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('login')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $data = array(
                'email'     => Input::get('email'),
                'password'  => Input::get('password')
            );


            if (Auth::attempt($data, true)) {
                return Redirect::to(URL::previous() == asset('login') ? '/' : URL::previous());
            } else {
                return Redirect::to('login');
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::to('/');
    }
}