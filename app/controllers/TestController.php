<?php
/**
 * 
 * @package default
 */

class TestController extends BaseController
{
	public function index()
	{
    return View::make('test');
	}
}