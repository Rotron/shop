<?php

class PageController extends BaseController {

    public function one($link)
    {
      return View::make('page', ['page' => Page::where('link', '=', $link)->firstOrFail(),
        'setting' => Config::get('setting')]);
    }

    public function sendPost()
    {

        $rules = array(
            'fullname' => 'required',
            'email' => 'required|email',
            'theme' => 'required|min:5',
            'message' => 'required|min:10'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to("page/contacts")
                ->withErrors($validator)
                ->withInput(Input::except(''));
        } else {
            Mail::send('mail.send', ['item' => Input::all()], function($message) {
                $message->to(Config::get('setting.email'))->subject("Новое сообщение с сайта " . Config::get('setting.title'));
            });
        }

      return Redirect::to(asset('page/spasibo-za-soobshtenie'));
    }
}
