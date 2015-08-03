@extends('admin.layout')
@section('content')
<link href="//rawgit.com/Eonasdan/bootstrap-datetimepicker/master/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
<script src="//cdn.ckeditor.com/4.4.7/standard/ckeditor.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
<script src="//rawgit.com/Eonasdan/bootstrap-datetimepicker/master/src/js/bootstrap-datetimepicker.js"></script>
<script src="/backend/js/scripts/friendurl.min.js"></script>

<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">{{ trans("name.$action") }} {{ trans("name.$name" . '-') }}</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            {{ Form::open() }}
                <div class="box-body">
                    @if($errors->has())
                       @foreach ($errors->all() as $error)
                          <div class="form-group has-error"><label><i class="fa fa-times-circle-o"></i> {{ $error }}</label></div>
                      @endforeach
                    @endif
                    <div class="form-group {{ $errors->first('title') ? 'has-error' : '' }}">
                        {{ Form::label('title', 'Заголовок') }}
                        {{ Form::text('title', $item->title, ['class' => 'form-control', 'placeholder' => 'Заголовок']) }}
                    </div>
                    <div class="form-group {{ $errors->first('link') ? 'has-error' : '' }}">
                        {{ Form::label('link', 'Ссылка') }}
                        {{ Form::text('link', $item->link, ['class' => 'form-control', 'placeholder' => 'Ссылка']) }}
                    </div>
                    <div class="form-group {{ $errors->first('content') ? 'has-error' : '' }}">
                        {{ Form::label('content', 'Содержание') }}
                        {{ Form::textarea('content', $item->content, ['class' => 'form-control', 'rows' => 3]) }}
                    </div>
                    <div class="form-group {{ $errors->first('published_at') ? 'has-error' : '' }}">
                        {{ Form::label('published_at', 'Дата публикации') }}
                        <div id="datetimepicker" class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            {{ Form::text('published_at', date('d.m.Y H:i', strtotime($item->published_at)), ['class' => 'form-control', 'placeholder' => 'Дата публикации']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('meta_title', 'Meta заголовок') }}
                        {{ Form::text('meta_title', $item->meta_title, ['class' => 'form-control', 'placeholder' => 'Meta заголовок', 'rows' => 3]) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('meta_description', 'Meta описание') }}
                        {{ Form::textarea('meta_description', $item->meta_description, ['class' => 'form-control', 'placeholder' => 'Meta описание', 'rows' => 3]) }}
                    </div>
                    <div class="form-group {{ $errors->first('meta_keywords') ? 'has-error' : '' }}">
                        {{ Form::label('meta_keywords', 'Meta ключевые слова') }}
                        {{ Form::text('meta_keywords', $item->meta_keywords, ['class' => 'form-control', 'placeholder' => 'Meta ключевые слова', 'rows' => 3]) }}
                    </div>
                    <div class="form-group">
                        {{ Form::text('parameters', $item->parameters, ['id' => 'parameters', 'class' => 'hide', 'rows' => 3]) }}
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
</div>   <!-- /.row -->
<script type="text/javascript">
    $(function() {
        $('#title').friendurl({id : 'link', transliterate: true});

        CKEDITOR.replace('content', {
            customConfig: '/backend/js/plugins/ckeditor/config.js',
            'filebrowserBrowseUrl':'/backend/js/plugins/kcfinder/browse.php?type=files',
            'filebrowserImageBrowseUrl':'/backend/js/plugins/kcfinder/browse.php?type=images',
            'filebrowserFlashBrowseUrl':'/backend/js/plugins/kcfinder/browse.php?type=flash',
            'filebrowserUploadUrl':'/backend/js/plugins/kcfinder/upload.php?type=files',
            'filebrowserImageUploadUrl':'/backend/js/plugins/kcfinder/upload.php?type=images',
            'filebrowserFlashUploadUrl':'/backend/js/plugins/kcfinder/upload.php?type=flash'});
    });
</script>
@stop
