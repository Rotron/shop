<?php

class ArticleController extends BaseController {

    public function one($link)
    {
        return View::make('article/one', ['article' => Article::where('link', '=', $link)->firstOrFail(),
            'setting' => Config::get('setting')]);
    }

    public function all($page = 1)
    {
        $limit = 5;
        $offset = ($page - 1) * $limit;

        $articles = Article::take($limit)->skip($offset)->active()->orderBy('created_at', 'desc')->get();

        Paginator::setBaseUrl(Config::get('app.url') . '/articles');
        Paginator::setCurrentPage($page);

        $totalItems = Article::with('id')->active()->count();
        $paginator = PrettyPaginator::make($articles->toArray(), $totalItems, $limit);

        return View::make('article/all', ['articles' => $articles, 'setting' => Config::get('setting'), 'paginate' => $paginator]);
    }
}
