<?php

class AdminPageController extends AdminController
{
    public function index()
    {
        return View::make("admin.{$this->name}.{$this->action}", 
            ['items' => Page::all(), 'name' => $this->name, 'action' => $this->action]
        );
    }

    public function add()
    {
        if (Request::isMethod('post')) {
            $rules = array(
                'title' => 'required|min:4',
                'link' => "required|unique:{$this->table}",
                'content' => 'required|min:50',
                'meta_description' => 'required|min:20',
                'meta_keywords' => 'required',
            );
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails()) {
                return Redirect::to("admin/{$this->name}/{$this->action}")
                    ->withErrors($validator)
                    ->withInput(Input::except(''));
            } else {
                $table = new Page;
                $table->title            = Input::get('title');
                $table->link             = Input::get('link');
                $table->user_id          = Auth::user()->id;
                $table->content          = Input::get('content');
                $table->meta_title       = Input::get('meta_title') ? Input::get('meta_title') : $table->title;
                $table->meta_description = Input::get('meta_description') ? Input::get('meta_description') : $table->description;
                $table->meta_keywords    = Input::get('meta_keywords');
                $table->published_at     = Page::toDate(Input::get('published_at'));
                $table->active           = Input::get('active', 0);

                if ($table->save()) {
                    $name = trans("name.{$this->name}");
                    return Redirect::to("admin/{$this->name}")->with('success', trans("message.{$this->action}", ['name' => $name]));
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
        if (Request::isMethod('post')) {
            $rules = array(
                'title' => 'required|min:4',
                'link' => 'required',
                'content' => 'required|min:50',
                'meta_description' => 'required|min:20',
                'meta_keywords' => 'required',
            );
            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails()) {
                return Redirect::to("admin/{$this->name}/{$id}/{$this->action}")
                    ->withErrors($validator)
                    ->withInput(Input::except(''));
            } else {
                $table = Page::find($id);
                $table->title            = Input::get('title');
                $table->link             = Input::get('link');
                $table->user_id          = Auth::user()->id;
                $table->content          = Input::get('content');
                $table->meta_title       = Input::get('meta_title') ? Input::get('meta_title') : $table->title;
                $table->meta_description = Input::get('meta_description') ? Input::get('meta_description') : $table->description;
                $table->meta_keywords    = Input::get('meta_keywords');
                $table->published_at     = Page::toDate(Input::get('published_at'));
                $table->active           = Input::get('active', 0);
                if ($table->save()) {
                    $name = trans("name.{$this->name}");
                    return Redirect::to("admin/{$this->name}")->with('success', trans("message.{$this->action}", ['name' => $name]));
                }

                return Redirect::to("admin/{$this->name}")->with('error', trans('message.error'));
            }
        }

        return View::make("admin.{$this->name}.{$this->action}", 
            ['item' => Page::find($id), 'name' => $this->name, 'action' => $this->action]
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
                if (Page::find($id)->delete()) {
                    return Response::json(['success' => true]);
                }
                return Response::json(['success' => false]);
            }
        }
    }

}