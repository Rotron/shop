@extends('admin.layout')
@section('content')
<div class="box">
    <div class="box-header margin">
        <div class="pull-left">
            <form action='{{ URL::to("admin/article/add") }}'>
                <button class="btn btn-primary btn-sm">Добавить статью</button>
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
                    <th>Опубликовано</th>
                    <th>Активность</th>
                    <th>Автор</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach ($items as $item)
                <tr class="fields">
                    <td>{{ $item->id }}</td>
                    <td><img src="/uploads/images/articles/{{ $item->id }}_small.jpg?{{ time() }}" alt="{{ $item->title }}" width="50"></td>
                    <td>{{ $item->title }}</td>
                    <td class="text-center">{{ date('d.m.Y H:i', strtotime($item->published_at)) }}</td>
                    <td class="text-center">
                    {{ Form::checkbox('active[]', $item->id, $item->active, ['class' => 'checkbox', 'disabled' => 'disabled']) }}
                    </td>
                    <td class="center small">{{ User::find($item->user_id) ? User::find($item->user_id)->login : $item->user_id }}</td>
                </tr>
                @endforeach
            </tbody>

            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Фото</th>
                    <th>Название</th>
                    <th>Опубликовано</th>
                    <th>Активность</th>
                    <th>Автор</th>
                </tr>
            </tfoot>
        </table>
        {{Form::close()}}
    </div>
</div>
<script type="text/javascript">
    $(function() {
        $("#data").dataTable();
        $('.icheckbox_minimal').removeClass('disabled');
    });
</script>
@stop
