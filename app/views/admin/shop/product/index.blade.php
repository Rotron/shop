@extends('admin.layout')
@section('content')
<div class="box">
    <div class="box-header margin">
        <div class="pull-left">
            <form action='{{ URL::to("admin/product/add") }}'>
                <button class="btn btn-primary btn-sm">Добавить товар</button>
            </form>
        </div>
        <div class="pull-right">
            <div id="message"></div>
            <button class="btn btn-info btn-sm change"><i class="fa fa-edit"></i>Изменить</button>
            <button class="btn btn-sm btn-danger confirm"><i class="glyphicon glyphicon-trash"></i>Удалить</button>
        </div>
    </div>
    <div class="box-body table-responsive">
    {{ Form::open()}}
        <table id="data" class="table table-bordered display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Фото</th>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>Количество на складе</th>
                    <th>Создано</th>
                    <th>Активность</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                <tr class="fields">
                    <td>{{ $item->id }}</td>
                    <td>
                        @if(file_exists("uploads/images/product/" . $item->id . "_1_thumb.png"))
                        <img src="/uploads/images/product/{{ $item->id }}_1_thumb.png?{{ time() }}" alt="{{ $item->name }}">
                        @endif 
                    </td>
                    <td>{{ $item->name }}</td>
                    <td class="center small">{{ $item->price }}</td>
                    <td class="center small">{{ $item->stock }}</td>
                    <td class="text-center">{{ date('d.m.Y H:i', strtotime($item->created_at)) }}</td>
                    <td class="text-center">
                    {{ Form::checkbox('active[]', $item->id, $item->active, ['class' => 'checkbox', 'disabled' => 'disabled']) }}
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Фото</th>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>Количество на складе</th>
                    <th>Создано</th>
                    <th>Активность</th>
                </tr>
            </tfoot>
        </table>
        {{Form::close()}}
    </div>
</div>
<script type="text/javascript">
    /*$(function() {
        $('.confirm').click(function(){
            if ( $('tbody tr').hasClass('selected') ) {
                $('#message').click();
            }
        });

        $("#message").confirm({
            text: "Вы уверены, что хотите удалить эту запись?",
            title: "Требуется подтверждение",
            confirm: function(button) {
                $.ajax({
                    method: 'POST',
                    url: "{{ asset('admin/product/delete') }}",
                    data: {id: $('.selected td:first').text()}
                })

                .done(function() {
                   table.row('.selected').remove().draw( false );
                });
            },
            confirmButton: "Да",
            cancelButton: "Нет",
            confirmButtonClass: "btn-danger",
            cancelButtonClass: "btn-default"
        });

        $('.change').click(function() {
            if ( $('tbody tr').hasClass('selected') ) {
                window.location.href = '/admin/product/' + $('.selected td:first').text() +'/edit';
            }
        });
    });*/
</script>
@stop
