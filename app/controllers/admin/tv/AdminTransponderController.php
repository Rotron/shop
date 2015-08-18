<?php

class AdminTransponderController extends AdminController
{
    public function index()
    {
        $satellites = Satellite::orderBy('name')->lists('name', 'id');
        return View::make("admin.tv.transponder.index", 
            ['items' => Transponder::all(), 'satellites' => $satellites]
        );
    }

    public function add()
    {
        $satellites = Satellite::orderBy('name')->lists('name', 'id');
        return View::make("admin.tv.transponder.add", ['satellites' => $satellites]);
    }

    public function postAdd()
    {
        $rules = array(
            'satellite_id' => 'required',
            'frequency_beam' => 'required|min:6|max:7',
            'sr_fec' => 'required|min:8|max:9',
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            $parameters = json_decode(Input::get('parameters'));
            return Redirect::to("admin/transponder/add")
                ->withErrors($validator)
                ->withInput(Input::except(''));
        }

        $table = new Transponder;
        $table->satellite_id = Input::get('satellite_id');
        $table->frequency_beam = Input::get('frequency_beam');
        $table->sr_fec = Input::get('sr_fec');

        if ($table->save()) {
            return Redirect::to("admin/transponder")->with('success', trans("message.add"));
        }

        return Redirect::to("admin/transponder")->with('error', trans('message.error'));

    }

    public function edit($id)
    {
        return View::make("admin.tv.transponder.edit", 
            ['item' => Transponder::find($id)]
        );
    }

    public function postEdit($id)
    {
        $rules = array(
            'satellite_id' => 'required',
            'frequency_beam' => 'required|min:6|max:7',
            'sr_fec' => 'required|min:8|max:9',            
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            $parameters = json_decode(Input::get('parameters'));
            $img = isset($parameters->name) ? $parameters->name : null;
            return Redirect::to("admin/transponder/{$id}/edit")
                ->with('uploadfile', $img)
                ->withErrors($validator)
                ->withInput(Input::except(''));
        }

        $table = Transponder::find($id);
        $table->satellite_id = Input::get('satellite_id');
        $table->frequency_beam = Input::get('frequency_beam');
        $table->sr_fec = Input::get('sr_fec');

        if ($table->save()) {
            return Redirect::to("admin/transponder")->with('success', trans("message.adit"));
        }

        return Redirect::to("admin/transponder")->with('error', trans('message.error'));
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

            $table = Transponder::find($id);
            if ($table->delete()) {
                return Response::json(['success' => true]);
            }
            return Response::json(['success' => false]);
        }
    }
}