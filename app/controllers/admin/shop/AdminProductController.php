<?php

class AdminProductController extends AdminController
{

    public function index()
    {
        return View::make("admin.shop.product.index", 
            ['items' => Product::all(), 'name' => $this->name, 'action' => $this->action]
        );
    }

    public function add()
    {

        $path = "uploads/images/product/";
        if (Request::isMethod('post')) {

            if(Request::ajax())
            {
                $file = Input::file('image');
                $input = array('image' => $file);
                $rules = array(
                    'image' => 'image|max:10000'
                );

                $validator = Validator::make($input, $rules);
                if ( $validator->fails() ) {
                    return Response::json(['success' => false, 'errors' => $validator->getMessageBag()->toArray()]);
                } else {
                    $file = Input::file('image');
                    $input = array('image' => $file);
                    $rules = array(
                        'image' => 'image|max:10000'
                    );

                    $validator = Validator::make($input, $rules);
                    if ( $validator->fails() ) {
                        return Response::json(['success' => false, 'errors' => $validator->getMessageBag()->toArray()]);
                    } else {
                        $hash = md5(time());
                        $filename = "{$hash}.png";
                        Input::file('image')->move($path, $filename);
                        $img = Image::make($path . $filename);
                        if ($img->width() > $img->height()) {
                            foreach (Config::get('setting.product.image.size') as $value) {

                                $img->resize($value['w'], null, function ($constraint) {
                                    $constraint->aspectRatio();
                                });

                                $img->save($path . $hash . '_' . $value['name'] . '.png');
                            }
                        } else {
                            foreach (Config::get('setting.product.image.size') as $value) {
                                $img->resize(null, $value['h'], function ($constraint) {
                                    $constraint->aspectRatio();
                                });

                                $img->save($path . $hash . '_' . $value['name'] . '.png');
                            }
                        }

                        return Response::json(['success' => true, 'thumb' => asset($path . $hash . '_' . $value['name'] . '.png'), 'tmp' => $hash]);
                    }
                }
            }

            $rules = array(
                'category_id' => 'required',
                'name' => 'required|min:3',
                'price' => 'required|numeric',
                'stock' => 'required|integer',
                'link' => "required|unique:products",
                'description' => 'required|min:20|max:500',
                'content' => 'required|min:20',
                'meta_keywords' => 'required',
                'images' => 'required'
            );

            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails()) {
                $images = Input::get('images');
                return Redirect::to("admin/product/add")
                    ->with('images', $images)
                    ->withErrors($validator)
                    ->withInput(Input::except(''));
            } else {
                $table = new Product;
                $table->name             = Input::get('name');
                $table->stock            = Input::get('stock');
                $table->price            = Input::get('price');
                $table->currency_id      = Input::get('currency_id');
                $table->link             = Input::get('link');
                $table->description      = Input::get('description');
                $table->content          = Input::get('content');
                $table->images           = Input::get('images');
                $table->meta_title       = Input::get('meta_title') ? Input::get('meta_title') : $table->name;
                $table->meta_description = Input::get('meta_description') ? Input::get('meta_description') : $table->description;
                $table->meta_keywords    = Input::get('meta_keywords');
                $table->active           = Input::get('active', 0);

                if ($table->save()) {
                    $id = $table->id;

                    $category = Category::find(Input::get('category_id'));
                    $product = Product::find($id);
                    $product->categories()->attach($category);

                    $images = explode(',', $table->images);

                    $imagesStr = '';

                    for ($i = 1; $i <= count($images); $i++) {
                        $num = $i-1;
                        File::move($path . $images[$num] . '.png', "{$path}{$id}_{$i}.png");
                        foreach (Config::get('setting.product.image.size') as $value) {
                            File::move($path . $images[$num] . "_{$value['name']}.png", "{$path}{$id}_{$i}_{$value['name']}.png");
                        }
                        if ($i == count($images)) {
                            $imagesStr .= "{$id}_{$i}";
                        } else {
                            $imagesStr .= "{$id}_{$i},";
                        }
                    }
                    $table->images = $imagesStr;
                    if ($table->save()) {
                        $name = trans("name.product");
                        return Redirect::to("admin/product")->with('success', trans("message.{$this->action}", ['name' => $name]));                      
                    }

                    return Redirect::to("admin/product")->with('error', trans('message.error'));
                }

                return Redirect::to("admin/product")->with('error', trans('message.error'));
            }
        }
        foreach (Category::where('id', '>', 0)->orderBy('title')->get()->toArray() as $category)
        {
           $categories["{$category['id']}"] = $category['title'];
        }

        return View::make("admin.product.{$this->action}", 
            ['action' => $this->action, 'categories' => $categories]
        );
    }

    public function edit($id)
    {
        $path = "uploads/images/product/";
        $tmpPath = "uploads/images/product/tmp/";
        if (Request::isMethod('post')) {

            if(Request::ajax())
            {
                $file = Input::file('image');
                $input = array('image' => $file);
                $rules = array(
                    'image' => 'image|max:10000'
                );

                $validator = Validator::make($input, $rules);
                if ( $validator->fails() ) {
                    return Response::json(['success' => false, 'errors' => $validator->getMessageBag()->toArray()]);
                } else {

                    $file = Input::file('image');
                    $input = array('image' => $file);
                    $rules = array(
                        'image' => 'image|max:10000'
                    );

                    $validator = Validator::make($input, $rules);
                    if ( $validator->fails() ) {
                        return Response::json(['success' => false, 'errors' => $validator->getMessageBag()->toArray()]);
                    } else {
                        $hash = md5(time());
                        $filename = "{$hash}.png";
                        $filenameThumb = "{$hash}_small.png";
                        Input::file('image')->move($path, $filename);
                        $img = Image::make($path . $filename);

                        foreach (Config::get('setting.product.image.size') as $value) {
                            $img->encode('jpg', 75);
                            $img->resize(null, $value['h'], function ($constraint) {
                                $constraint->aspectRatio();
                            });

                            $img->save($path . $hash . '_' . $value['name'] . '.png');
                        }

                        return Response::json(['success' => true, 'thumb' => asset($path . $hash . '_' . $value['name'] . '.png'), 'tmp' => $hash]);
                    }
                }
            }

            $rules = array(
                'category_id' => 'required',
                'name' => 'required|min:3',
                'price' => 'required|numeric',
                'stock' => 'required|integer',
                'link' => "required",
                'description' => 'required|min:20|max:500',
                'content' => 'required|min:20',
                'meta_keywords' => 'required',
                'images' => 'required'
            );

            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails()) {
                $images = Input::get('images');
                return Redirect::to("admin/product/{$id}/edit")
                    ->with('images', $images)
                    ->withErrors($validator)
                    ->withInput(Input::except(''));
            } else {
                $table = Product::find($id);
                $images = explode(',', Input::get('images'));
                $imagesOld = explode(',', $table->images);

                $delImg = array_diff($imagesOld, $images);
                foreach($delImg as $img) {
                    $this->deleteImage($img);
                }

                for ($i = 1; $i <= count($images); $i++) {
                    $num = $i-1;
                    File::move($path . $images[$num] . '.png', "{$tmpPath}{$id}_{$i}.png");
                    foreach (Config::get('setting.product.image.size') as $value) {
                        File::move($path . $images[$num] . "_{$value['name']}.png", "{$tmpPath}{$id}_{$i}_{$value['name']}.png");
                    }
                }

                $imagesStr = '';
                for ($i = 1; $i <= count($images); $i++) {
                    File::move($tmpPath . "{$id}_{$i}.png", "{$path}{$id}_{$i}.png");
                    foreach (Config::get('setting.product.image.size') as $value) {
                        File::move($tmpPath . "{$id}_{$i}_{$value['name']}.png", "{$path}{$id}_{$i}_{$value['name']}.png");
                    }
                    if ($i == count($images)) {
                        $imagesStr .= "{$id}_{$i}";
                    } else {
                        $imagesStr .= "{$id}_{$i},";
                    }
                }

                $table->name             = Input::get('name');
                $table->stock            = Input::get('stock');
                $table->price            = Input::get('price');
                $table->currency_id      = Input::get('currency_id');
                $table->link             = Input::get('link');
                $table->description      = Input::get('description');
                $table->content          = Input::get('content');
                $table->images           = $imagesStr;
                $table->meta_title       = Input::get('meta_title') ? Input::get('name') : $table->title;
                $table->meta_description = Input::get('meta_description') ? Input::get('meta_description') : $table->description;
                $table->meta_keywords    = Input::get('meta_keywords');
                $table->active           = Input::get('active', 0);

                if ($table->save()) {
                    $category = Category::find(Input::get('category_id'));
                    $product = Product::find($id);
                    $product->categories()->detach();
                    $product->categories()->attach($category);

                    $name = trans("name.product");
                    return Redirect::to("admin/product")->with('success', trans("message.{$this->action}", ['name' => $name]));
                }

                return Redirect::to("admin/product")->with('error', trans('message.error'));
            }
        }

        $table = Product::find($id);
        foreach (Category::all()->toArray() as $category)
        {
           $categories["{$category['id']}"] = $category['title'];
        }

        return View::make("admin.shop.product.edit", 
            ['item' => Product::find($id), 'images' => $table->images, 'name' => $this->name, 'categories' => $categories]
        );
    }

    public function deleteImage($img = '')
    {

        $dir = Route::currentRouteName();
        $img = $img ? $img : Input::get('img');
        $path = "uploads/images/product/";
        File::delete("{$path}{$img}.png");
        foreach (Config::get('setting.product.image.size')  as $size) {
            File::delete("{$path}{$img}_{$size['name']}.png");
        }
        return Response::json(['success' => true]);
    }
/*
    public function delete($id)
    {
        $table = Product::find($id);

        if ($table->delete()) {
            $name = trans("name.product");
            return Redirect::to("admin/product")->with('success', trans("message.{$this->action}", ['name' => $name]));
        }

        return Redirect::to("admin/product")->with('error', trans('message.error'));
    }
*/
    public function deletePost()
    {
        if (Request::ajax()) {
            $id = (int) Input::get('id');
            $rules = array(
                'id' => 'required'
            );

            $validator = Validator::make(Input::all(), $rules);
            if ( $validator->fails() ) {
                return Response::json(['success' => false]);
            } else {
                $table = Product::find($id);
                $images = $table->images;
                if ($table->delete()) {
                    $path = "uploads/images/product/";
                    foreach (explode(',', $images) as $image) {
                        File::delete("{$path}{$image}.png");
                        foreach (Config::get('setting.product.image.size')  as $size) {
                            File::delete("{$path}{$image}_{$size['name']}.png");
                        }
                    }

                    return Response::json(['success' => true]);
                }
                return Response::json(['success' => false]);
            }
        }
    }

}
