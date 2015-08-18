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
                <h3 class="box-title">{{ trans("name.add") }} телеканала</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            {{ Form::open() }}
                <div class="box-body">
                    @if($errors->has())
                       @foreach ($errors->all() as $error)
                          <div class="form-group has-error"><label><i class="fa fa-times-circle-o"></i> {{ $error }}</label></div>
                      @endforeach
                    @endif
                    <div class="form-group {{ $errors->first('transponder_id') ? 'has-error' : '' }}">
                        {{ Form::label('transponder_id', 'Категория')}}
                        {{ Form::select('transponder_id', Transponders::all(), null, ['class' => 'form-control']); }}
                    </div>
                    <div class="form-group {{ $errors->first('system_encryption_id') ? 'has-error' : '' }}">
                        {{ Form::label('system_encryption_id', 'Категория')}}
                        {{ Form::select('system_encryption_id', Transponders::all(), null, ['class' => 'form-control']); }}
                    </div>

                    <div class="form-group {{ $errors->first('name') ? 'has-error' : '' }}">
                        {{ Form::label('name', 'Название') }}
                        {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Название']) }}
                    </div>

                    <div class="form-group">
                       {{ Form::text('parameters', '', ['id' => 'parameters', 'class' => 'hide', 'rows' => 3]) }}
                    </div>
                    <div class="checkbox">
                        <label>
                            {{ Form::checkbox('active', '1', '') }} Активность
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
        @if(Session::has('uploadfile') && Session::get('uploadfile'))
            one.loadImg("{{ Session::get('uploadfile')}}");
        @else
            one.loadImg("/uploads/images/articles/default.jpg");
        @endif
    });
</script>
@stop