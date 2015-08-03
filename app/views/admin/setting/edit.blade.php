@extends('admin.layout')
@section('content')
<link href="{{ asset('backend/css/cropper/crop.css') }}" rel="stylesheet" type="text/css" />
<link href="//rawgit.com/Eonasdan/bootstrap-datetimepicker/master/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
<script src="{{ asset('backend/js/plugins/jqfileupload/jquery.ui.widget.js') }}"></script>
<script src="{{ asset('backend/js/plugins/jqfileupload/handlers.js') }}"></script>
<script src="{{ asset('backend/js/plugins/jqfileupload/jquery.fileupload.js') }}"></script>
<script src="{{ asset('backend/js/plugins/cropper/crop.js') }}"></script>
<script src="//cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>

<div class="row">
    <!-- left column -->
    <div class="col-md-7">
        <!-- general form elements -->
        {{ Form::open(array('method' => 'post')) }}
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Настройки сайта</h3>
            </div><!-- /.box-header -->
            <!-- form start -->

            <div class="box-body">
                @if($errors->has())
                   @foreach ($errors->all() as $error)
                      <div class="form-group has-error"><label><i class="fa fa-times-circle-o"></i> {{ $error }}</label></div>
                   @endforeach
                @endif

                <div class="form-group {{ $errors->first('phone') ? 'has-error' : '' }}">
                    {{ Form::label('phone', 'Телефон') }}
                    {{ Form::text('phone', Config::get('setting.phone'), ['class' => 'form-control', 'placeholder' => 'Телефон']) }}
                </div>
                <div class="form-group {{ $errors->first('email') ? 'has-error' : '' }}">
                    {{ Form::label('email', 'Email') }}
                    {{ Form::text('email', Config::get('setting.email'), ['class' => 'form-control', 'placeholder' => 'Email']) }}
                </div>
                <div class="form-group {{ $errors->first('company') ? 'has-error' : '' }}">
                    {{ Form::label('company', 'Название компании') }}
                    {{ Form::text('company', Config::get('setting.company'), ['class' => 'form-control', 'placeholder' => 'Название компании']) }}
                </div>
                <div class="form-group {{ $errors->first('title') ? 'has-error' : '' }}">
                    {{ Form::label('title', 'Заголовок') }}
                    {{ Form::text('title', Config::get('setting.title'), ['class' => 'form-control', 'placeholder' => 'Заголовок']) }}
                </div>
                <div class="form-group {{ $errors->first('description') ? 'has-error' : '' }}">
                    {{ Form::label('description', 'Описание') }}
                    {{ Form::text('description', Config::get('setting.description'), ['class' => 'form-control', 'placeholder' => 'Описание']) }}
                </div>
                <div class="form-group {{ $errors->first('author') ? 'has-error' : '' }}">
                    {{ Form::label('author', 'Автор') }}
                    {{ Form::text('author', Config::get('setting.author'), ['class' => 'form-control', 'placeholder' => 'Автор']) }}
                </div>
                <div class="form-group {{ $errors->first('keywords') ? 'has-error' : '' }}">
                    {{ Form::label('keywords', 'Ключевые слова') }}
                    {{ Form::text('keywords', Config::get('setting.keywords'), ['class' => 'form-control', 'placeholder' => 'Ключевые слова']) }}
                </div>
                <div class="form-group {{ $errors->first('title') ? 'has-error' : '' }}">
                    {{ Form::label('address', 'Адрес') }}
                    {{ Form::text('address', Config::get('setting.address'), ['class' => 'form-control', 'placeholder' => 'Адрес']) }}
                </div>
                <div class="form-group {{ $errors->first('title') ? 'has-error' : '' }}">
                    {{ Form::label('mode', 'Режим работы') }}
                    {{ Form::textarea('mode', Config::get('setting.mode'), ['size' => '50x3', 'class' => 'form-control']) }}
                </div>
                <div class="form-group">
                   {{ Form::text('parameters', '', ['id' => 'parameters', 'class' => 'hide', 'rows' => 3]) }}
                </div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Google map</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
                @if($errors->has())
                   @foreach ($errors->all() as $error)
                      <div class="form-group has-error"><label><i class="fa fa-times-circle-o"></i> {{ $error }}</label></div>
                   @endforeach
                @endif
                <div class="form-group {{ $errors->first('title') ? 'has-error' : '' }}">
                    {{ Form::label('zoom', 'Zoom') }}
                    {{ Form::text('zoom', Config::get('setting.zoom'), ['class' => 'form-control']) }}
                </div>
                <div class="form-group {{ $errors->first('title') ? 'has-error' : '' }}">
                    {{ Form::label('latitude', 'Широта') }}
                    {{ Form::text('latitude', Config::get('setting.latitude'), ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('longitude', 'Долгота') }}
                    {{ Form::text('longitude', Config::get('setting.longitude'), ['class' => 'form-control']) }}
                </div>
            </div><!-- /.box-body -->

            <div class="box-footer">
                {{ Form::submit('Сохранить', ['id' => 'send', 'class' => 'btn btn-primary']) }}
            </div>
        </div><!-- /.box -->
        {{ Form::close() }}
    </div><!--/.col (left) -->
    <div class="col-md-5">
        <div class="box box-warning">
            <div class="box-header">
                <h3 class="box-title">Логотип</h3>
            </div><!-- /.box-header -->
            <div class="btn btn-primary margin" id="upload">Загрузить фото</div>
            <div class="box-body">
              <div class="container-fluid eg-container">
                <div class="row eg-main crop-image">
                    <div class="default" id="logo">
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
        one.loadImg("{{ asset(Config::get('setting.logo.path')) }}");

        CKEDITOR.editorConfig = function( config ) {
          config.allowedContent = true;
        }

        CKEDITOR.replace('mode', {
            customConfig: '/backend/js/plugins/ckeditor/config.js',
            'filebrowserBrowseUrl':'/backend/js/plugins/kcfinder/browse.php?type=files',
            'filebrowserImageBrowseUrl':'/backend/js/plugins/kcfinder/browse.php?type=images',
            'filebrowserFlashBrowseUrl':'/backend/js/plugins/kcfinder/browse.php?type=flash',
            'filebrowserUploadUrl':'/backend/js/plugins/kcfinder/upload.php?type=files',
            'filebrowserImageUploadUrl':'/backend/js/plugins/kcfinder/upload.php?type=images',
            'filebrowserFlashUploadUrl':'/backend/js/plugins/kcfinder/upload.php?type=flash'});
    });
</script>
<style type="text/css">
    .default .cropMain {
        width:{{ Config::get('setting.logo.w') + (Config::get('setting.logo.w') * 0.38) }}px;
        height:{{ Config::get('setting.logo.h') + (Config::get('setting.logo.h') * 0.38) }}px;
    }
</style>
@stop
