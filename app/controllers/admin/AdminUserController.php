<?php

class AdminUserController extends AdminController
{
    public function index()
    {
        $role = Role::find(Role::where('name', '=', 'Admin')->first()->id)->users()->get();
        return View::make("admin.user.index", 
            ['items' => $role]
        );
    }

    public function add()
    {
        return View::make("admin.user.add");
    }

    public function postAdd()
    {
        $rules = array(
            'firstname' => 'required|min:2',
            'lastname' => 'required|min:2',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:32|confirmed'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to("admin/user/add")
                ->withErrors($validator)
                ->withInput(Input::except(''));
        }

        $password = Input::get('password');
        $table = new User;
        $table->firstname = Input::get('firstname');
        $table->lastname = Input::get('lastname');
        $table->email = Input::get('email');
        $table->password = Hash::make($password);

        if ($table->save()) {
            $role = Role::where('name', '=', 'Admin')->first();
            $table->attachRole( $role );

            Mail::send('mail.userAdd', ['firstname' => $table->firstname, 'lastname' => $table->lastname, 'login' => $table->email,
                'password' => $password, 'setting' => Config::get('setting')], function($message) {
                $message->to(Input::get('email'))->subject("Учетные данные пользователя");
            });

            return Redirect::to("admin/user")->with('success', trans("message.add", ['name' => 'Пользователь']));
        }

        return Redirect::to("login")->with('error', trans('message.error'));
    }

    public function edit($id)
    {
        return View::make("admin.user.edit", 
            ['item' => User::find($id)]
        );
    }

    public function postEdit($id)
    {
        $rules = array(
            'firstname' => 'required|min:2',
            'lastname' => 'required|min:2',
            'email' => 'required|email',
            'password' => 'confirmed'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to("admin/user/edd")
                ->withErrors($validator)
                ->withInput(Input::except(''));
        }

        $password = Input::get('password');
        $table = User::find($id);
        $table->firstname = Input::get('firstname');
        $table->lastname = Input::get('lastname');
        $table->email = Input::get('email');
        $table->password = $password ? Hash::make($password) : $table->password;

        if ($table->save()) {
            return Redirect::to("admin/user")->with('success', trans("message.edit", ['name' => 'Пользователь']));
        }

        return Redirect::to("login")->with('error', trans('message.error'));
    }

    public function postDelete()
    {
        if (Request::ajax()) {
            $id = (int) Input::get('id');

            $rules = array(
                'id' => 'required'
            );

            $validator = Validator::make(Input::all(), $rules);
            if ( $validator->fails() ) {
                return Response::json(['success' => false]);
            }

            $table = User::find($id);

            if ($table->delete()) {
                return Response::json(['success' => true]);
            }
            return Response::json(['success' => false]);
        }
    }
}