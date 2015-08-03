<?php

class AdminImageController extends BaseController {

    public function postTmpUpload() {

        $file = Input::file('image');
        $input = array('image' => $file);
        $rules = array(
            'image' => 'image|max:3000'
        );

        $validator = Validator::make($input, $rules);
        if ( $validator->fails() ) {
            return Response::json(['success' => false, 'errors' => $validator->getMessageBag()->toArray()]);
        } else {
            $destinationPath = 'uploads/tmp/';
            $filename = md5(time()). '.jpg';
            Input::file('image')->move($destinationPath, $filename);

            $tmp = $destinationPath.$filename;

            return Response::json(['success' => true, 'file' => asset($destinationPath.$filename), 'tmp' => $tmp]);
        }

    }

    public function postTmpDelete() {

        $path = 'uploads/tmp/';

        $filename = Input::get('filename');

        File::delete($path . $filename);

        return Response::json(['success' => true]);

    }

    public function postUpload($dir = 'portfolio') {

        $file = Input::file('image');
        $input = array('image' => $file);
        $rules = array(
            'image' => 'image|max:3000'
        );

        $validator = Validator::make($input, $rules);
        if ( $validator->fails() ) {
            return Response::json(['success' => false, 'errors' => $validator->getMessageBag()->toArray()]);
        } else {
            $id = 1;
            $destinationPath = "uploads/images/{$dir}/";
            $filename = "{$id}.jpg";
            Input::file('image')->move($destinationPath, $filename);

            $tmp = $destinationPath.$filename;

            return Response::json(['success' => true, 'file' => asset($destinationPath.$filename), 'tmp' => $tmp]);
        }

    }

    public function postDelete($path = 'portfolio') {
        //var_dump(Input::get('thumb'), Input::get('filename'));

        $path = 'uploads/tmp/';

        $filename = Input::get('filename');

        File::delete($path . $filename);

        if (Input::get('thumb')) {
            $pathThumbs = $path . 'thumbs/';
            File::delete($pathThumbs . $filename);
        }

        return Response::json(['success' => true]);

    }

}