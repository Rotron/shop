<?php

class UploadController extends BaseController
{
    public function post_upload(){

        $input = Input::all();
        $rules = array(
            'file' => 'image|max:3000',
        );

        $validation = Validator::make($input, $rules);

        if ($validation->fails())
        {
            return Response::make($validation->errors->first(), 400);
        }

        $file = Input::file('file');

        $directory = path('public').'uploads/'.sha1(time());

        $filename = sha1(time().time()).".jpg";

        $upload_success = Input::upload('file', $directory, $filename);

        if( $upload_success ) {
            return Response::json('success', 200);
        } else {
            return Response::json('error', 400);
        }
    }
}