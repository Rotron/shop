<?php

class AdminPackageController extends AdminController
{
    public function index()
    {
        return View::make("admin.tv.package.index", 
            ['items' => TvPackage::all()]
        );
    }

    public function add()
    {
        return View::make("admin.tv.package.add");
    }

    public function postAdd()
    {
        $rules = array(
            'name' => 'required|min:2|max:500',
            'operator_id' => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            $parameters = json_decode(Input::get('parameters'));
            return Redirect::to("admin/package/add")
                ->with('uploadfile', isset($parameters->name) ? $parameters->name : '')
                ->withErrors($validator)
                ->withInput(Input::except(''));
        }

        $table = new TvPackage;
        $table->name = Input::get('name');
        $table->operator_id = Input::get('operator_id');
        $table->tv_channels = Input::get('tv_channels');
        $table->tv_satellites = Input::get('tv_satellites');
        $table->tv_packages = Input::get('tv_packages');
        $table->active = Input::get('active', 0);

        if ($table->save()) {
            $name = trans("name.tv");
            return Redirect::to("admin/package")->with('success', trans("message.add", ['name' => $name]));
        }

        return Redirect::to("admin/package")->with('error', trans('message.error'));

    }

    public function edit($id)
    {
        return View::make("admin.tv.package.edit", 
            ['item' => TvPackage::find($id)]
        );
    }

    public function postEdit($id)
    {
        $rules = array(
            'name' => 'required|min:2|max:500',
            'operator_id' => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            $parameters = json_decode(Input::get('parameters'));
            $img = isset($parameters->name) ? $parameters->name : null;
            return Redirect::to("admin/tv-channel/{$id}/edit")
                ->with('uploadfile', $img)
                ->withErrors($validator)
                ->withInput(Input::except(''));
        }

        $table = TvPackage::find($id);
        $table->name = Input::get('name');
        $table->operator_id = Input::get('operator_id');
        $table->tv_channels = Input::get('tv_channels');
        $table->tv_satellites = Input::get('tv_satellites');
        $table->tv_packages = Input::get('tv_packages');
        $table->active = Input::get('active', 0);

        if ($table->save()) {
            if (Input::get('parameters')) {
                $parameters = json_decode(Input::get('parameters'));
                $img = Image::make($parameters->name);

                if ($img->width() > $img->height()) {
                    $img->resize(100, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                } else {
                    $img->resize(null, 100, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }

                $img->save("uploads/images/tv/logo/{$table->id}.png");
                $img->destroy();
            }
            $name = trans("name.tv");
            return Redirect::to("admin/package")->with('success', trans("message.adit", ['name' => $name]));
        }

        return Redirect::to("admin/package")->with('error', trans('message.error'));
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

            $table = TvPackage::find($id);
            if ($table->delete()) {
                return Response::json(['success' => true]);
            }
            return Response::json(['success' => false]);
        }
    }
}