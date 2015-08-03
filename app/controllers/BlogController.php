<?php

class BlogController extends BaseController {

    public function blog($page = 1)
    {
        $limit = 5;
        $offset = ($page - 1) * $limit;

        $posts = Post::take($limit)->skip($offset)->active()->orderBy('created_at', 'desc')->get();

        Paginator::setBaseUrl(Config::get('app.url') . '/blog');
        Paginator::setCurrentPage($page);

        $totalItems = Post::with('id')->active()->count();
        $paginator = PrettyPaginator::make($posts->toArray(), $totalItems, $limit);

        return View::make('blog.blog', ['posts' => $posts, 'paginate' => $paginator]);
    }

    public function post($link)
    {
        $table = Post::where('link', '=', $link)->firstOrFail();
        $table->content = e($table->content);
        $table->save();

        return View::make('blog.post', ['post' => Post::where('link', '=', $link)->firstOrFail()]);
    }
}