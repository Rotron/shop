<?php

class AdminArticleController extends AdminController
{
    public function index()
    {
        return View::make("admin.article.index", 
            ['items' => Article::all()]
        );
    }

    public function add()
    {
        return View::make("admin.article.add");
    }

    public function postAdd()
    {
        $rules = array(
            'title' => 'required|min:4',
            'link' => "required|unique:articles",
            'description' => 'required|min:20|max:500',
            'content' => 'required|min:100',
            'published_at' => 'required',
            'meta_keywords' => 'required',
            'parameters' => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            $parameters = json_decode(Input::get('parameters'));
            return Redirect::to("admin/article/add")
                ->with('uploadfile', isset($parameters->name) ? $parameters->name : '')
                ->withErrors($validator)
                ->withInput(Input::except(''));
        }

        $table = new Article;
        $table->title            = Input::get('title');
        $table->link             = Input::get('link');
        $table->user_id          = Auth::user()->id;
        $table->description      = Input::get('description');
        $table->content          = Input::get('content');
        $table->meta_title       = Input::get('meta_title') ? Input::get('meta_title') : $table->title;
        $table->meta_description = Input::get('meta_description') ? Input::get('meta_description') : $table->description;
        $table->meta_keywords    = Input::get('meta_keywords');
        $table->published_at     = Article::toDate(Input::get('published_at'));
        $table->active           = Input::get('active', 0);

        if ($table->save()) {
            if (Input::get('parameters')) {
                $parameters = json_decode(Input::get('parameters'));
                $img = Image::make($parameters->name);
                $img->crop($parameters->w, $parameters->h, $parameters->x, $parameters->y);
                $img->resize(320, 240);
                $img->save("uploads/images/articles/{$table->id}.jpg");
                File::delete($parameters->tmp);
                $img->resize(200, 150);
                $img->save("uploads/images/articles/{$table->id}_small.jpg");
            }
            $name = trans("name.article");
            return Redirect::to("admin/article")->with('success', trans("message.add", ['name' => $name]));
        }

        return Redirect::to("admin/article")->with('error', trans('message.error'));

    }

    public function edit($id)
    {
        return View::make("admin.article.edit", 
            ['item' => Article::find($id)]
        );
    }

    public function postEdit($id)
    {
        $rules = array(
            'title' => 'required|min:4',
            'link' => 'required',
            'description' => 'required|min:20|max:500',
            'content' => 'required|min:100',
            'published_at' => 'required',
            'meta_keywords' => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            $parameters = json_decode(Input::get('parameters'));
            $img = isset($parameters->name) ? $parameters->name : null;
            return Redirect::to("admin/article/{$id}/edit")
                ->with('uploadfile', $img)
                ->withErrors($validator)
                ->withInput(Input::except(''));
        }

        $table = Article::find($id);
        $table->title            = Input::get('title');
        $table->link             = Input::get('link');
        $table->user_id          = Auth::user()->id;
        $table->description      = Input::get('description');
        $table->content          = Input::get('content');
        $table->meta_title       = Input::get('meta_title') ? Input::get('meta_title') : $table->title;
        $table->meta_description = Input::get('meta_description') ? Input::get('meta_description') : $table->description;
        $table->meta_keywords    = Input::get('meta_keywords');
        $table->published_at     = Article::toDate(Input::get('published_at'));
        $table->active           = Input::get('active', 0);

        if ($table->save()) {
            if (Input::get('parameters')) {
                $parameters = json_decode(Input::get('parameters'));
                $img = Image::make($parameters->name);
                $img->crop($parameters->w, $parameters->h, $parameters->x, $parameters->y);
                $img->resize(320, 240);
                $img->save("uploads/images/articles/{$id}.jpg");
                File::delete($parameters->tmp);
                $img->resize(200, 150);
                $img->save("uploads/images/articles/{$id}_small.jpg");
                $img->destroy();
            }
            $name = trans("name.article");
            return Redirect::to("admin/article")->with('success', trans("message.adit", ['name' => $name]));
        }

        return Redirect::to("admin/article")->with('error', trans('message.error'));
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

            $table = Article::find($id);
            if ($table->delete()) {
                return Response::json(['success' => true]);
            }
            return Response::json(['success' => false]);
        }
    }
}