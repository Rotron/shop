@extends('admin.layout')
@section('content')
<link href="/backend/css/cropper/crop.css" rel="stylesheet" type="text/css" />
<link href="//rawgit.com/Eonasdan/bootstrap-datetimepicker/master/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
<script src="{{asset('backend/js/plugins/jqfileupload/jquery.ui.widget.js')}}"></script>
<script src="{{asset('backend/js/plugins/jqfileupload/jquery.fileupload.js')}}"></script>

<script src="/backend/js/plugins/cropper/crop.js"></script>
<script src="//cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
<script src="//rawgit.com/Eonasdan/bootstrap-datetimepicker/master/src/js/bootstrap-datetimepicker.js"></script>
<script src="/backend/js/scripts/friendurl.min.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

<div class="row">
    <div class="col-md-7">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Добавление {{ trans("name.$name" . '-') }}</h3>
            </div>
            {{ Form::open() }}
                <div class="box-body">
                    @if($errors->has())
                       @foreach ($errors->all() as $error)
                          <div class="form-group has-error"><label><i class="fa fa-times-circle-o"></i> {{ $error }}</label></div>
                       @endforeach
                    @endif
                    <div class="form-group {{ $errors->first('title') ? 'has-error' : '' }}">
                        {{ Form::label('title', 'Заголовок')}}
                        {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Заголовок']) }}
                    </div>
                    <div class="form-group {{ $errors->first('link') ? 'has-error' : '' }}">
                        {{ Form::label('link', 'Ссылка') }}
                        {{ Form::text('link', '', ['class' => 'form-control', 'placeholder' => 'Ссылка']) }}
                    </div>
                    <div class="form-group {{ $errors->first('description') ? 'has-error' : '' }}">
                        {{ Form::label('description', 'Описание')}}
                        {{ Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Описание', 'rows' => 3]) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('meta_title', 'Meta заголовок') }}
                        {{ Form::text('meta_title', '', ['class' => 'form-control', 'placeholder' => 'Meta заголовок', 'rows' => 3]) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('meta_description', 'Meta описание') }}
                        {{ Form::textarea('meta_description', '', ['class' => 'form-control', 'placeholder' => 'Meta описание', 'rows' => 3]) }}
                    </div>
                    <div class="form-group {{ $errors->first('meta_keywords') ? 'has-error' : '' }}">
                        {{ Form::label('meta_keywords', 'Meta ключевые слова') }}
                        {{ Form::text('meta_keywords', '', ['class' => 'form-control', 'placeholder' => 'Meta ключевые слова', 'rows' => 3]) }}
                    </div>
                    <div class="form-group hide {{ $errors->first('images') ? 'has-error' : '' }}">
                        {{ Form::label('images', 'Изображения') }}
                        {{ Form::text('images', '', ['class' => 'form-control', 'placeholder' => 'Изображения', 'rows' => 3]) }}
                    </div>
                    <div class="form-group">
                       {{ Form::text('parameters', '', ['id' => 'parameters', 'class' => 'hide', 'rows' => 3]) }}
                    </div>
                    <div class="checkbox">
                        <label>
                            {{ Form::checkbox('active', '1', '') }} Активность
                        </label>
                    </div>
                </div>
                <div class="box-footer">
                    {{ Form::submit('Сохранить', ['id' => 'send', 'class' => 'btn btn-primary']) }}
                </div>
            {{ Form::close() }}
        </div>
    </div>
    <div class="col-md-5">
        <div class="box box-warning">
            <div class="box-header">
                <h3 class="box-title">Изображения</h3>
            </div>
            <div class="btn btn-primary margin" id="add-image"><i class="glyphicon glyphicon-upload"></i> Загрузить фото</div>
            <form id = "fileupload">
                <input id="image" name="image" type="file" class="hide">
                <input type="text" name="number" value="" id="number" class="hide">
            </form>
              <div class="container-fluid eg-container">
                    <div class="table table-striped" class="files" id="previews">
                      <div id="template" class="file-row">
                        <table class="table table-striped table-images" id="table-images">
                            <thead>
                                <tr>
                                    <th>Номер</th>
                                    <th>Фото</th>
                                    <th>Действие</th>
                                </tr>
                            </thead>
                            <tbody id="sortable">
                                @if (Session::has('images'))
                                    @if (Session::get('images'))
                                        @foreach (explode( ',' , Session::get('images')) as $i => $image)
                                            <tr  class="ui-state-default">
                                                <td class="number">{{ $i+1 }}</td>
                                                <td><img src="/uploads/images/{{ $name }}/{{ $image }}_small.jpg?{{time()}}"></td>
                                                <td><button  data-img="{{ $image }}" data-id="{{ $i+1 }}" class="btn btn-danger delete margin"><i class="glyphicon glyphicon-trash"></i> Удалить</button></td>
                                            </tr>
                                        @endforeach
                                    @endif
                                @endif
                            </tbody>
                        </table>
                      </div>
                    </div>
              </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function() {

        $('#title').friendurl({id : 'link', transliterate: true});

        $('.fa-calendar').click(function(){
            $('#datetimepicker').datetimepicker({
                locale: 'ru'
            });
        });

        $('#add-image').click(function (){
            $('#image').click();
        });

        function changeimage(){
            var rowCount = $('#table-images tr').length - 1;
            var strImages = '';
            var separator = ',';
            for (var i = 1; i <= rowCount; i++) {
                if (i == rowCount) {
                    separator = '';
                }
                strImages += $('table tr:eq(' + i + ') .delete').data('img') + separator;
            };
            $('#images').val(strImages);
        };

        function deleteimage(num){
            $("tr").eq(num).remove();
            changeimage()
        }; 

        $('#image').fileupload({
            dataType: 'json',
            done: function( e, data ) {
                $('div').removeClass('glyphicon-upload');
                var rowCount = $('#table-images tr').length;
                var buttonDelete = $('<button  data-img="' + data.result.tmp + '" data-id="' + rowCount + '" class="btn btn-danger delete margin"><i class="glyphicon glyphicon-trash"></i> Удалить</button>').click(function () {
                    deleteimage($(this).data('id'));
                    $.post( "/admin/{{ $name }}/deleteImage", { img: $(this).data('img') })
                });

                var newRowContent = '<tr><td class="number">' + rowCount + '</td><td><img src="' + data.result.thumb + '"></td><td class="serv-button"></td></tr>';
                $(newRowContent).appendTo($("#table-images"));
                $("tr:last .serv-button").append(buttonDelete);
                changeimage();
            }
        });

        $('.delete').click(function(){
            deleteimage($(this).data('id'));
        });

        $('#sortable').sortable();
        $('#sortable').disableSelection();

        $('tbody').sortable({
            update: function( event, ui ) {
                changeimage();
            }
        });
    });
</script>
@stop
