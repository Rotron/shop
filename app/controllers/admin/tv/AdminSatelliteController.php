<?php

class AdminSatelliteController extends AdminController
{
    public function index()
    {
        return View::make("admin.tv.satellite.index", 
            ['items' => TvSatellite::all()]
        );
    }

    public function add()
    {
        return View::make("admin.tv.satellite.add");
    }

    public function postAdd()
    {
        $rules = array(
            'name' => 'required|min:5|max:45',
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to("admin/satellite/add")
                ->withErrors($validator)
                ->withInput(Input::except(''));
        }

        $table = new TvSatellite;
        $table->name = Input::get('name');
        $table->longitude = Input::get('longitude');

        if ($table->save()) {
            return Redirect::to("admin/satellite")->with('success', trans("message.add"));
        }

        return Redirect::to("admin/satellite")->with('error', trans('message.error'));

    }

    public function edit($id)
    {
        return View::make("admin.tv.satellite.edit",
            ['item' => TvSatellite::find($id)]
        );
    }

    public function postEdit($id)
    {
        $rules = array(
            'name' => 'required|min:2|max:45',
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to("admin/satellite/{$id}/edit")
                ->withErrors($validator)
                ->withInput(Input::except(''));
        }

        $table = TvSatellite::find($id);
        $table->name = Input::get('name');
        $table->longitude = Input::get('longitude');

        if ($table->save()) {
            return Redirect::to("admin/satellite")->with('success', trans("message.adit"));
        }

        return Redirect::to("admin/satellite")->with('error', trans('message.error'));
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

            $table = TvSatellite::find($id);
            if ($table->delete()) {
                return Response::json(['success' => true]);
            }
            return Response::json(['success' => false]);
        }
    }
}