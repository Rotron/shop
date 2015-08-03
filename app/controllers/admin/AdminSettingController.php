<?php

class AdminSettingController extends AdminController
{
  public function edit()
  {
    return View::make('admin/setting/edit');
  }

  public function postEdit()
  {
      $rules = [
          'phone' => 'required|min:4',
          'email' => 'required|email',
          'company' => 'required|min:3',
          'title' => 'required|min:20',
          'description' => 'required|min:50',
          'author' => 'required|min:5',
          'keywords' => 'required|min:20',
          'address' => 'required|min:5',
          'mode' => 'required|min:10',
          'zoom' => 'required|min:1|max:40|integer',
          'latitude' => 'required|min:1|max:90',
          'longitude' => 'required|min:1|max:90',
      ];

      $validator = Validator::make(Input::all(), $rules);

      if ($validator->fails()) {
          return Redirect::to("admin/setting")
              ->withErrors($validator)
              ->withInput(Input::except(''));
      }
//dd(Input::all());
      foreach ($rules as $key => $value) {
        Config::write('setting.' . $key, Input::get($key));
      }

      if (Input::get('parameters')) {
          $parameters = json_decode(Input::get('parameters'));
          $img = Image::make($parameters->name);
          $img->crop($parameters->w, $parameters->h, $parameters->x, $parameters->y);
          $img->resize(Config::get('setting.logo.w'), Config::get('setting.logo.h'));
          $img->save(Config::get('setting.logo.path'));
          File::delete($parameters->tmp);
          $img->destroy();
      }

      return Redirect::to("admin/setting")->with('success', trans("message.setting"));
  }

}