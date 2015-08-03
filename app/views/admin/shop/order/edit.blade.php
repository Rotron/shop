@extends('admin.layout')
@section('content')
<script src="//cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
<script src="//rawgit.com/Eonasdan/bootstrap-datetimepicker/master/src/js/bootstrap-datetimepicker.js"></script>
<script src="/backend/js/scripts/friendurl.min.js"></script>

<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">{{ trans("name.$action") }} заказа</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            {{ Form::open() }}
                <div class="box-body">
                    <div class="form-group {{ $errors->first('id') ? 'has-error' : '' }}">
                        {{ Form::label('id', 'Статус') }}
                        {{ Form::select('status_id', $status, $item->status_id, ['class' => 'form-control']) }}
                    </div>
                    <div class="row">
                        <div class="col-xs-12 table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td>№ заказа: <b>{{ $item->id }}</b></td>
                                    </tr>
                                    <tr>
                                        <td>Покупатель: <b>{{ $item->fullname }}</b></td>
                                    </tr>
                                    <tr>
                                        <td>{{ $item->comment }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <br>
                    <div class="row">
                        <div class="col-xs-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>код товара</th>
                                        <th>фото</th>
                                        <th>название</th>
                                        <th>цена</th>
                                        <th>Количество</th>
                                        <th>Сумма</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td><img src="{{ asset('uploads/images/product/') }}/{{ $product->id }}_1_thumb.png" style="border-width:0;display:block;margin:auto"></td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ $product->total }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div><!-- /.col -->
                    </div><!-- /.row -->

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
            'filebrowserBrowseUrl':'/backend/js/plugins/kcfinder/browse.php?type=files',
            'filebrowserImageBrowseUrl':'/backend/js/plugins/kcfinder/browse.php?type=images',
            'filebrowserFlashBrowseUrl':'/backend/js/plugins/kcfinder/browse.php?type=flash',
            'filebrowserUploadUrl':'/backend/js/plugins/kcfinder/upload.php?type=files',
            'filebrowserImageUploadUrl':'/backend/js/plugins/kcfinder/upload.php?type=images',
            'filebrowserFlashUploadUrl':'/backend/js/plugins/kcfinder/upload.php?type=flash'});

    });
</script>
@stop
