<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/** ------------------------------------------
 *  Admin Routes
 *  ------------------------------------------
 */
Route::pattern('id', '[0-9]+');

//routes administrative panel
Route::group(array('prefix' => 'admin'), function()
{
    Route::get('/', 'AdminAuthController@index');
    Route::get('login', 'AdminAuthController@login');
    Route::post('login', 'AdminAuthController@postLogin');
    Route::get('logout', 'AdminAuthController@logout');

    Route::get('article', 'AdminArticleController@index');
    Route::get('article/add', 'AdminArticleController@add');
    Route::get('article/{id}/edit', 'AdminArticleController@edit');
    Route::post('article/add', 'AdminArticleController@postAdd');
    Route::post('article/{id}/edit', 'AdminArticleController@postEdit');
    Route::post('article/delete', 'AdminArticleController@postDelete');

    Route::get('page', 'AdminPageController@index');
    Route::any('page/add', 'AdminPageController@add');
    Route::any('page/{id}/edit', 'AdminPageController@edit');
    Route::post('page/delete', 'AdminPageController@deletePost');

    Route::get('post', 'AdminPostController@index');
    Route::any('post/add', 'AdminPostController@add');
    Route::any('post/{id}/edit', 'AdminPostController@edit');
    Route::post('post/delete', 'AdminPostController@deletePost');

    Route::get('portfolio', 'AdminPortfolioController@index');
    Route::any('portfolio/add', 'AdminPortfolioController@add');
    Route::any('portfolio/{id}/edit', 'AdminPortfolioController@edit');
    Route::any('portfolio/{id}/delete', 'AdminPortfolioController@delete');
    Route::any('portfolio/uploadImage', 'AdminPortfolioController@image');
    Route::any('portfolio/deleteImage', 'AdminPortfolioController@deleteImage');
    Route::any('portfolio/image', 'AdminPortfolioController@image');

    Route::get('category', 'AdminCategoryController@index');
    Route::post('category', 'AdminCategoryController@movePost');
    Route::any('category/add', 'AdminCategoryController@add');
    Route::any('category/{id}/edit', 'AdminCategoryController@edit');
    Route::post('category/delete', 'AdminCategoryController@deletePost');

    Route::get('product', 'AdminProductController@index');
    Route::any('product/add', 'AdminProductController@add');
    Route::any('product/{id}/edit', 'AdminProductController@edit');
    /*Route::get('product/{id}/delete', 'AdminProductController@delete');*/
    Route::post('product/delete', 'AdminProductController@deletePost');
    Route::any('product/deleteImage', 'AdminProductController@deleteImage');

    Route::get('customer', 'AdminCustomerController@index');
    Route::any('customer/add', 'AdminCustomerController@add');
    Route::any('customer/{id}/edit', 'AdminCustomerController@edit');
    Route::get('customer/{id}/delete', 'AdminCustomerController@delete');

    Route::get('order', 'AdminOrderController@index');
    Route::any('order/add', 'AdminOrderController@add');
    Route::any('order/{id}/edit', 'AdminOrderController@edit');
    Route::get('order/{id}/delete', 'AdminOrderController@delete');


    Route::get('tv/category', 'AdminCategoryController@index');
    //Route::any('portfolio/image', 'AdminPortfolioController@image');
    //Route::any('portfolio/{id}/edit', 'AdminPortfolioController@edit');
    //Route::get('portfolio/{id}/delete', 'AdminPortfolioController@delete');
    Route::post('toggle', 'AdminArticleController@postToggle');

    Route::get('user', 'AdminUserController@index');
    Route::get('user/add', 'AdminUserController@add');
    Route::get('user/{id}/edit', 'AdminUserController@edit');
    Route::post('user/add', 'AdminUserController@postAdd');
    Route::post('user/{id}/edit', 'AdminUserController@postEdit');
    Route::post('user/delete', 'AdminUserController@postDelete');

    Route::get('setting', 'AdminSettingController@edit');
    Route::post('setting', 'AdminSettingController@postEdit');

    Route::post('tmpUpload', 'AdminImageController@postTmpUpload');
    Route::any('tmpDelete', 'AdminImageController@postTmpDelete');
    Route::any('upload/{dir?}', 'AdminImageController@postUpload');
    Route::any('delete/{dir?}', 'AdminImageController@postDelete');
});

Route::group(array('prefix' => 'cart'), function()
{
    Route::get('/', 'CartController@index');
    Route::post('add', 'CartController@postAdd');
    Route::post('update', 'CartController@postUpdate');
    Route::post('delete', 'CartController@postDelete');
});

Route::group(array('prefix' => 'checkout'), function()
{
    Route::get('/', 'CheckoutController@index');
    Route::get('thanks/{link}', 'CheckoutController@thanks');
    Route::post('add', 'CheckoutController@postAdd');
    Route::post('update', 'CartController@postUpdate');
    Route::post('delete', 'UserController@postExist');
});

Route::group(array('prefix' => 'user'), function()
{
    Route::post('exist', 'UserController@postExist');
});

Route::get('blog', 'BlogController@blog');
Route::get('blog/page/{page}', 'BlogController@blog');
Route::get('post/{link}', 'BlogController@post');

Route::get('faq', 'FaqController@faq');

Route::get('page/{link}', 'PageController@one');
Route::post('page/send', 'PageController@sendPost');

Route::get('product/{link}', 'ProductController@showProduct');
Route::get('products/search', 'ProductController@search');

Route::get('category/{link}', 'CategoryController@showCategory');
Route::get('category/{link}/page/{page}', 'CategoryController@showCategory');

Route::get('article/{link}', 'ArticleController@one');
Route::get('articles', 'ArticleController@all');
Route::get('articles/page/{page}', 'ArticleController@all');
Route::get('test', 'TestController@index');

Route::get('registration', 'AuthController@getRegistration');
Route::post('registration', 'AuthController@postRegistration');

Route::get('login', 'AuthController@getLogin');
Route::post('login', 'AuthController@postLogin');

Route::get('password/remind', 'RemindersController@getRemind');

Route::post('password/remind', 'RemindersController@postRemind');

Route::post('password/reset', 'RemindersController@postReset');

/*Route::post('password/remind', function ()
{
  $credentials = array(
    'email' => Input::get('email'),
    'password' => Input::get('password'),
    'password_confirmation' => Input::get('password_confirmation')
  );

    return Password::remind($credentials, function ($message, $user) {
      $message->subject('Ваше уведомление о сбросе.');
    });
});*/

Route::get('password/reset/{token}', function ($token) {
  return View::make('password.reset')->with('token', $token);
});



Route::get('logout', 'AuthController@logout');

Route::get('/', 'IndexController@index');
Route::post('upload', 'UploadController@post_upload');