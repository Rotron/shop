@extends('admin.layout')
@section('content')
<link href="/backend/css/cropper/crop.css" rel="stylesheet" type="text/css" />
<link href="//rawgit.com/Eonasdan/bootstrap-datetimepicker/master/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
<script src="{{asset('backend/js/plugins/jqfileupload/jquery.ui.widget.js')}}"></script>
<script src="{{asset('backend/js/plugins/jqfileupload/handlers.js')}}"></script>
<script src="{{asset('backend/js/plugins/jqfileupload/jquery.fileupload.js')}}"></script>

<script src="/backend/js/plugins/cropper/crop.js"></script>
<script src="//cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
<script src="//rawgit.com/Eonasdan/bootstrap-datetimepicker/master/src/js/bootstrap-datetimepicker.js"></script>
<script src="/backend/js/scripts/friendurl.min.js"></script>

<div class="row">
    <!-- left column -->
    <div class="col-md-7">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">{{ trans("name.edit") }} {{ trans("name.article" . '-') }}</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            {{ Form::open() }}
                <div class="box-body">
                    @if($errors->has())
                       @foreach ($errors->all() as $error)
                          <div class="form-group has-error"><label><i class="fa fa-times-circle-o"></i> {{ $error }}</label></div>
                      @endforeach
                    @endif

                    <div class="form-group {{ $errors->first('name') ? 'has-error' : '' }}">
                        {{ Form::label('name', 'Название') }}
                        {{ Form::text('name', $item->name, ['class' => 'form-control', 'placeholder' => 'Название']) }}
                    </div>

                    <div class="form-group {{ $errors->first('key') ? 'has-error' : '' }}">
                        {{ Form::label('key', 'Ключ') }}
                        {{ Form::text('key', $item->key, ['class' => 'form-control', 'placeholder' => 'Ключ']) }}
                    </div>

                    <div class="form-group {{ $errors->first('language_id') ? 'has-error' : '' }}">
                        {{ Form::label('language_id', 'Язык')}}
                        {{ Form::select('language_id', TvLanguage::lists('name', 'id'), $item->language_id, ['class' => 'form-control']); }}
                    </div>

                    <div class="form-group {{ $errors->first('system_encryption') ? 'has-error' : '' }}">
                        {{ Form::label('system_encryption', 'Система кодирования') }}
                        {{ Form::text('system_encryption', $item->system_encryption, ['class' => 'form-control', 'placeholder' => 'Система кодирования']) }}
                    </div>

                    <div class="checkbox">
                        <label>
                            {{ Form::checkbox('active', '1', $item->active) }} Активность
                        </label>
                    </div>
                </div><!-- /.box-body -->

                <div class="box-footer">
                    {{ Form::submit('Сохранить', ['id' => 'send', 'class' => 'btn btn-primary']) }}
                </div>
            {{ Form::close() }}
        </div><!-- /.box -->
    </div><!--/.col (left) -->
    <!-- right column -->
    <div class="col-md-5">
        <div class="box box-warning">
            <div class="box-header">
                <h3 class="box-title">Изображение</h3>
            </div><!-- /.box-header -->
            <div class="btn btn-primary margin" id="upload">Загрузить фото</div>
            <div class="box-body">
              <div class="container-fluid eg-container">
                <div class="row eg-main crop-image">
                    <div class="default">
                        <div class="cropMain"></div>
                        <div class="cropSlider"></div>
                        <input id="image" name="image" type="file" class="hide">
                    </div>
                </div>
              </div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.box -->
</div>   <!-- /.row -->
<script type="text/javascript">
    $(function() {

        $('#upload').click(function (){
            $('#image').click();
        });

        var handlers = new fileUploadHandlers();

        $('#image').fileupload({
            dataType: 'json',
            url: '/admin/tmpUpload',
            add: handlers.fileDialogComplete,
            done: handlers.loadImageFileCrop
        });
        var one = new CROP;
        one.init(".default");
        @if(Session::has('uploadfile'))
            one.loadImg("{{ Session::get('uploadfile')}}");
        @else
            one.loadImg("/uploads/images/tv/logo/{{$item->id}}.png");
        @endif
    });
</script>
@stop
