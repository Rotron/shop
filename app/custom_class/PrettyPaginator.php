<?php
/**
 * author: skyverd
 * createTime: 14-8-24
 * description:  pretty paginator
 */

use Illuminate\Support\Facades\App;
use Illuminate\Pagination\Paginator;

class PrettyPaginator extends Paginator {

    /**
     * Get a new pretty paginator instance.
     *
     * @param  array  $items
     * @param  int    $total
     * @param  int|null  $perPage
     * @return \PrettyPaginator
     */
    public static function make(array $items, $total, $perPage = null)
    {
    	//var_dump($items, $total, $perPage);die;
        // This is just a static method that will return a paginator class
        // similar to the default Laravel `Paginator::make()`. Throwing this
        // in it's own static method is easier for now explaining service
        // providers and such.

        $paginator = new PrettyPaginator(App::make('paginator'), $items, $total, $perPage);

        return $paginator->setupPaginationContext();
    }

    /**
     * Get a URL for a given page number.
     *
     * @param  int  $page
     * @return string
     */
    public function getUrl($page)
    {
        // Holds the paginator page name.
        $pageName = $this->factory->getPageName();

        // An array to hold our paramters.
        $parameters = [];

        // If we have any extra query string key / value pairs that need to be added
        // onto the URL, we will put them in query string form and then attach it
        // to the URL. This allows for extra information like sortings storage.
        if (count($this->query) > 0)
        {
            $parameters = array_merge($this->query, $parameters);
        }

        $currentUrl = $this->factory->getCurrentUrl();

        $pageUrl = $currentUrl.'/'.$pageName.'/'.$page;

        if (count($parameters) > 0)
        {
            $pageUrl .= '?'.http_build_query($parameters, null, '&');
        }

        $pageUrl .= $this->buildFragment();

        return $pageUrl;
    }

}