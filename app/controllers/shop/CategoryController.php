<?php

class CategoryController extends BaseController 
{
    public function showCategory($link, $page = 1)
    {
        $limit = 9;
        $offset = ($page - 1) * $limit;

        $category = Category::where('link', '=', $link)->first();
        $products = Product::categorized($category)->take($limit)->skip($offset)->active()->orderBy('created_at', 'desc')->get();

        Paginator::setBaseUrl(asset("/category/{$link}"));
        Paginator::setCurrentPage($page);

        $totalItems = Product::categorized($category)->active()->count();
        $paginator = PrettyPaginator::make($products->toArray(), $totalItems, $limit);

        return View::make('shop.category', ['category' => $category, 'products' => $products,
            'setting' => Config::get('setting'), 'paginate' => $paginator]);
    }
}