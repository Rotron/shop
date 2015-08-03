@extends('admin.layout')
@section('content')
<div class="box">
    <div class="box-header margin">
        <div class="pull-left">
            <form action='{{ URL::to("admin/page/add") }}'>
                <button class="btn btn-primary btn-sm">Добавить страницу</button>
            </form>
        </div>
        <div class="pull-right">
            <div id="message"></div>
            <button class="btn btn-info btn-sm change"><i class="fa fa-edit"></i>Изменить</button>
            <button class="btn btn-sm btn-danger confirm"><i class="glyphicon glyphicon-trash"></i>Удалить</button>
        </div>
    </div>
    <div class="box-body table-responsive">
    {{ Form::open() }}
        <table id="data" class="table table-bordered display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Создан</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach ($items as $item)
                <tr class="fields">
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->firstname }}</td>
                    <td>{{ $item->lastname }}</td>
                    <td class="text-center">{{ date('d.m.Y H:i', strtotime($item->created_at)) }}</td>
                </tr>
                @endforeach
            </tbody>

            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Создан</th>
                </tr>
            </tfoot>
        </table>
        {{ Form::close() }}
    </div>
</div>
<script type="text/javascript">
    $(function() {
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
                    url: "{{ asset('admin/page/delete') }}",
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
                window.location.href = '/admin/page/' + $('.selected td:first').text() +'/edit';
            }
        });
    });
</script>
@stop
