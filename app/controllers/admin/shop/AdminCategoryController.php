<?php

class AdminCategoryController extends AdminController
{

    public function index()
    {
        //var_dump($this->name);
        return View::make("admin.shop.category.index", 
            ['items' => Category::all(), 'name' => 'category']
        );
    }

    public function movePost()
    {
        if(Request::ajax())
        {
            $otherNodeId = (int) Input::get('otherNodeId');
            $moveNodeId = (int) Input::get('moveNodeId'); 

            $otherNode = Category::find($otherNodeId);
            $moveCategory = Category::find($moveNodeId);

            $moveCategory->moveToRightOf($otherNode);

            return Response::json(['moveNodeId' => $otherNodeId, 'otherNodeId' => $moveNodeId]);
            return Response::json(['success' => false, 'errors' => 'ddd']);
        }
    }

    public function add()
    {
        if (Request::isMethod('post')) {
            $rules = array(
                'title' => 'required|min:4',
                'link' => "required|unique:categories",
                'meta_keywords' => 'required',
            );
            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails()) {
                return Redirect::to("admin/category/add")
                    ->withErrors($validator)
                    ->withInput(Input::except(''));
            } else {
                $table = new Category;
                $table->title            = Input::get('title');
                $table->link             = Input::get('link');
                $table->content          = Input::get('content');
                $table->parent_id        = Input::get('parent_id') ? Input::get('parent_id') : null;
                $table->meta_title       = Input::get('meta_title') ? Input::get('meta_title') : $table->title;
                $table->meta_description = Input::get('meta_description') ? Input::get('meta_description') : $table->title;
                $table->meta_keywords    = Input::get('meta_keywords');
                $table->active           = Input::get('active', 0);

                if ($table->save()) {
                    $name = trans("name.category");
                    return Redirect::to("admin/category")->with('success', trans("message.add", ['name' => $name]));
                }

                return Redirect::to("admin/category")->with('error', trans('message.error'));
            }
        }

        $categories = array(0 => 'Нет родительской категории') + Category::orderBy('title')->lists('title', 'id');

        return View::make("admin.shop.category.add",
            ['categories' => $categories , 'action' => $this->action]
        );
    }

    public function edit($id)
    {
        if (Request::isMethod('post')) {
            $rules = array(
                'title' => 'required|min:4',
                'link' => 'required',
                'meta_keywords' => 'required',
            );
            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails()) {
                return Redirect::to("admin/category/{$id}/edit")
                    ->withErrors($validator)
                    ->withInput(Input::except(''));
            } else {
                $table = Category::find($id);
                $table->title            = Input::get('title');
                $table->link             = Input::get('link');
                $table->content          = Input::get('content');
                $table->parent_id        = Input::get('parent_id') ? Input::get('parent_id') : null;
                $table->meta_title       = Input::get('meta_title') ? Input::get('meta_title') : $table->title;
                $table->meta_description = Input::get('meta_description') ? Input::get('meta_description') : $table->description;
                $table->meta_keywords    = Input::get('meta_keywords');
                $table->active           = Input::get('active', 0);
                if ($table->save()) {
                    $name = trans("name.category");
                    return Redirect::to("admin/category")->with('success', trans("message.edit", ['name' => $name]));
                }

                return Redirect::to("admin/category")->with('error', trans('message.error'));
            }
        }

        $self = Category::where('id', '=', $id)->first();

        foreach (Category::lists('title', 'id') as $key => $value) {
            $child = Category::where('id', '=', $key)->first();
            if (!$child->isSelfOrDescendantOf($self)) {
                $categories[$key] = $value;
            }
        }

        $categories = array(0 => 'Нет родительской категории') + $categories;

        return View::make("admin.shop.category.edit",
            ['item' => Category::find($id), 'categories' => $categories]
        );
    }

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
                if (Category::find($id)->delete()) {
                    return Response::json(['success' => true]);
                }
                return Response::json(['success' => false]);
            }
        }
    }
}