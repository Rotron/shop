<?php

class FaqController extends BaseController {

    public function faq()
    {
        return View::make('faq', ['faq' => Faq::active()->orderBy('created_at', 'asc')->get(),
            'setting' => Config::get('setting')]);
    }
}