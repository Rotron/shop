<?php

class AdminPortfolioController extends AdminController
{

    public function index()
    {
        return View::make("admin.{$this->name}.{$this->action}", 
            ['items' => Portfolio::all(), 'name' => $this->name, 'action' => $this->action]
        );
    }

    public function add()
    {

        $path = "uploads/images/$this->name/";
        if (Request::isMethod('post')) {

            if(Request::ajax())
            {
                $file = Input::file('image');
                $input = array('image' => $file);
                $rules = array(
                    'image' => 'image|max:3000'
                );

                $validator = Validator::make($input, $rules);
                if ( $validator->fails() ) {
                    return Response::json(['success' => false, 'errors' => $validator->getMessageBag()->toArray()]);
                } else {
                    $file = Input::file('image');
                    $input = array('image' => $file);
                    $rules = array(
                        'image' => 'image|max:3000'
                    );

                    $validator = Validator::make($input, $rules);
                    if ( $validator->fails() ) {
                        return Response::json(['success' => false, 'errors' => $validator->getMessageBag()->toArray()]);
                    } else {
                        $hash = md5(time());
                        $filename = "{$hash}.jpg";
                        $filenameThumb = "{$hash}_small.jpg";
                        Input::file('image')->move($path, $filename);
                        $img = Image::make($path . $filename);
                        $img->fit(100, 100);
                        $thumb = $path . $filenameThumb;
                        $img->save($thumb);

                        return Response::json(['success' => true, 'thumb' => asset($thumb), 'tmp' => $hash]);
                    }
                }
            }

            $rules = array(
                'title' => 'required|min:4',
                'link' => "required|unique:{$this->table}",
                'description' => 'required|min:20|max:500',
                'meta_keywords' => 'required',
                'images' => 'required'
            );

            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails()) {
                $images = Input::get('images');
                return Redirect::to("admin/$this->name/add")
                    ->with('images', $images)
                    ->withErrors($validator)
                    ->withInput(Input::except(''));
            } else {
                $table = new Portfolio;
                $table->title            = Input::get('title');
                $table->link             = Input::get('link');
                $table->user_id          = Auth::user()->id;
                $table->description      = Input::get('description');
                $table->meta_title       = Input::get('meta_title') ? Input::get('meta_title') : $table->title;
                $table->meta_description = Input::get('meta_description') ? Input::get('meta_description') : $table->description;
                $table->meta_keywords    = Input::get('meta_keywords');
                $table->active           = Input::get('active', 0);
                $table->images           = Input::get('images');

                
                if ($table->save()) {
                    $id = $table->id;
                    $images = explode(',', $table->images);
                    $imagesStr = '';
                    for ($i = 1; $i <= count($images); $i++) {
                        $num = $i-1;
                        File::move($path . $images[$num] . '.jpg', "{$path}{$id}_{$i}.jpg");
                        File::move($path . $images[$num] . '_small.jpg', "{$path}{$id}_{$i}_small.jpg");
                        if ($i == count($images)) {
                            $imagesStr .= "{$id}_{$i}";
                        } else {
                            $imagesStr .= "{$id}_{$i},";
                        }
                    }
                    $table->images = $imagesStr;
                    if ($table->save()) {
                        $name = trans("name.{$this->name}");
                        return Redirect::to("admin/{$this->name}")->with('success', trans("message.{$this->action}", ['name' => $name]));                        
                    }

                    return Redirect::to("admin/{$this->name}")->with('error', trans('message.error'));
                }

                return Redirect::to("admin/{$this->name}")->with('error', trans('message.error'));
            }
        }

        return View::make("admin.{$this->name}.{$this->action}", 
            ['name' => $this->name, 'action' => $this->action]
        );
    }

    public function edit($id)
    {
        $path = "uploads/images/$this->name/";
        $tmpPath = "uploads/images/$this->name/tmp/";
        if (Request::isMethod('post')) {

            if(Request::ajax())
            {
                $file = Input::file('image');
                $input = array('image' => $file);
                $rules = array(
                    'image' => 'image|max:3000'
                );

                $validator = Validator::make($input, $rules);
                if ( $validator->fails() ) {
                    return Response::json(['success' => false, 'errors' => $validator->getMessageBag()->toArray()]);
                } else {

                    $file = Input::file('image');
                    $input = array('image' => $file);
                    $rules = array(
                        'image' => 'image|max:3000'
                    );

                    $validator = Validator::make($input, $rules);
                    if ( $validator->fails() ) {
                        return Response::json(['success' => false, 'errors' => $validator->getMessageBag()->toArray()]);
                    } else {
                        $hash = md5(time());
                        $filename = "{$hash}.jpg";
                        $filenameThumb = "{$hash}_small.jpg";
                        Input::file('image')->move($path, $filename);
                        $img = Image::make($path . $filename);
                        $img->fit(100, 100);
                        $thumb = $path . $filenameThumb;
                        $img->save($thumb);

                        return Response::json(['success' => true, 'thumb' => asset($thumb), 'tmp' => $hash]);
                    }
                }
            }

            $rules = array(
                'title' => 'required|min:4',
                'link' => "required",
                'description' => 'required|min:20|max:500',
                'meta_keywords' => 'required',
                'images' => 'required'
            );

            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails()) {
                $images = Input::get('images');
                return Redirect::to("admin/$this->name/{$id}/edit")
                    ->with('images', $images)
                    ->withErrors($validator)
                    ->withInput(Input::except(''));
            } else {
                $table = Portfolio::find($id);
                $images = explode(',', Input::get('images'));
                $imagesOld = explode(',', $table->images);

                $delImg = array_diff($imagesOld, $images);
                foreach($delImg as $img) {
                    $this->deleteImage($img);
                }

                for ($i = 1; $i <= count($images); $i++) {
                    $num = $i-1;
                    File::move($path . $images[$num] . '.jpg', "{$tmpPath}{$id}_{$i}.jpg");
                    File::move($path . $images[$num] . '_small.jpg', "{$tmpPath}{$id}_{$i}_small.jpg");
                }

                $imagesStr = '';
                for ($i = 1; $i <= count($images); $i++) {
                    File::move($tmpPath . "{$id}_{$i}.jpg", "{$path}{$id}_{$i}.jpg");
                    File::move($tmpPath . "{$id}_{$i}_small.jpg", "{$path}{$id}_{$i}_small.jpg");
                    if ($i == count($images)) {
                        $imagesStr .= "{$id}_{$i}";
                    } else {
                        $imagesStr .= "{$id}_{$i},";
                    }
                }

                $table->title            = Input::get('title');
                $table->link             = Input::get('link');
                $table->user_id          = Auth::user()->id;
                $table->description      = Input::get('description');
                $table->meta_title       = Input::get('meta_title') ? Input::get('meta_title') : $table->title;
                $table->meta_description = Input::get('meta_description') ? Input::get('meta_description') : $table->description;
                $table->meta_keywords    = Input::get('meta_keywords');
                $table->images           = $imagesStr;
                $table->active           = Input::get('active', 0);

                if ($table->save()) {
                    $name = trans("name.{$this->name}");
                    return Redirect::to("admin/{$this->name}")->with('success', trans("message.{$this->action}", ['name' => $name]));
                }

                return Redirect::to("admin/{$this->name}")->with('error', trans('message.error'));
            }
        }
        $table = Portfolio::find($id);
        return View::make("admin.{$this->name}.edit", ['item' => Portfolio::find($id), 'images' => $table->images, 'name' => $this->name]);
    }

    public function deleteImage($img = '')
    {
        $dir = Route::currentRouteName();
        $img = $img ? $img : Input::get('img');
        $path = "uploads/images/$this->name/";
        File::delete("{$path}{$img}.jpg");
        File::delete("{$path}{$img}_small.jpg");
        return Response::json(['success' => true]);
    }

    public function delete($id)
    {
        $table = Portfolio::find($id);

        if ($table->delete()) {
            $name = trans("name.{$this->name}");
            return Redirect::to("admin/{$this->name}")->with('success', trans("message.{$this->action}", ['name' => $name]));
        }

        return Redirect::to("admin/{$this->name}")->with('error', Lang::get('message.error'));
    }
}
