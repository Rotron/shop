<?php

class AdminPostController extends AdminController
{
    public function index()
    {
        return View::make("admin.{$this->name}.{$this->action}", 
            ['items' => Post::all(), 'name' => $this->name, 'action' => $this->action]
        );
    }

    public function add()
    {

        if (Request::isMethod('post')) {
            $rules = array(
                'title' => 'required|min:4',
                'link' => "required|unique:{$this->table}",
                'content' => 'required|min:100',
                'published_at' => 'required',
                'meta_keywords' => 'required',
                'meta_description' => 'max:500',
            );
            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails()) {
                return Redirect::to("admin/{$this->name}/{$this->action}")
                    ->withErrors($validator)
                    ->withInput(Input::except(''));
            } else {
                $table = new Post;
                $table->title            = Input::get('title');
                $table->link             = Input::get('link');
                $table->user_id          = Auth::user()->id;
                $table->content          = Input::get('content');
                $table->meta_title       = Input::get('meta_title') ? Input::get('meta_title') : $table->title;
                $table->meta_description = Input::get('meta_description') ? Input::get('meta_description') : $table->description;
                $table->meta_keywords    = Input::get('meta_keywords');
                $table->published_at     = Post::toDate(Input::get('published_at'));
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
                'content' => 'required|min:100',
                'published_at' => 'required',
                'meta_description' => 'max:500',
                'meta_keywords' => 'required',
            );
            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails()) {
                return Redirect::to("admin/post/{$id}/edit")
                    ->withErrors($validator)
                    ->withInput(Input::except(''));
            } else {
                $table = Post::find($id);
                $table->title            = e(Input::get('title'));
                $table->link             = Input::get('link');
                $table->user_id          = Auth::user()->id;
                $table->content          = e(Input::get('content'));
                $table->meta_title       = Input::get('meta_title') ? Input::get('meta_title') : $table->title;
                $table->meta_description = Input::get('meta_description') ? Input::get('meta_description') : Str::limit(strip_tags(HTML::decode($table->content)), 155);
                $table->meta_keywords    = Input::get('meta_keywords');
                $table->published_at     = Post::toDate(Input::get('published_at'));
                $table->active           = Input::get('active', 0);
                if ($table->save()) {
                    $name = trans("name.{$this->name}");
                    return Redirect::to("admin/{$this->name}")->with('success', trans("message.{$this->action}", ['name' => $name]));
                }

                return Redirect::to("admin/{$this->name}")->with('error', trans('message.error'));
            }
        }

        return View::make("admin.{$this->name}.{$this->action}",
            ['item' => Post::find($id), 'name' => $this->name, 'action' => $this->action]
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
                if (Post::find($id)->delete()) {
                    return Response::json(['success' => true]);
                }
                return Response::json(['success' => false]);
            }
        }
    }

}