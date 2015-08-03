@extends('admin.layout')
@section('content')
<div class="box">
    <div class="box-header margin">
    <form action='{{ URL::to("admin/$name/add") }}'>
        <button class="btn btn-primary">Добавить работы</button> 
    </form>
    </div>
    <div class="box-body table-responsive">
    {{ Form::open()}}
        <table id="data" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Фото</th>
                    <th>Название</th>
                    <th>Создано</th>
                    <th>Активность</th>
                    <th>Автор</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                <tr class="fields">
                    <td>{{ $item->id }}</td>
                    <td><img src="/uploads/images/{{ $name }}/{{ $item->id }}_1_small.jpg?{{ time() }}" alt="{{ $item->title }}" width="50"></td>
                    <td>{{$item->title}}</td>
                    <td class="text-center">{{ date('d.m.Y H:i', strtotime($item->created_at)) }}</td>
                    <td class="text-center">
                    {{ Form::checkbox('active[]', $item->id, $item->active, ['class' => 'checkbox', 'disabled' => 'disabled']) }}
                    </td>
                    <td class="center small">{{ User::find($item->user_id) ? User::find($item->user_id)->login : $item->user_id }}</td>
                    <td class="text-center service-buttons">
                        <a class="btn btn-info btn-sm" href="/admin/{{ $name }}/{{ $item->id }}/edit"><i class="fa fa-edit"></i> Изменить</a>
                        <a class="btn btn-sm btn-danger confirm" href="#" data-row="{{ $item->id }}"><i class="glyphicon glyphicon-trash"></i> Удалить</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Фото</th>
                    <th>Название</th>
                    <th>Создано</th>
                    <th>Активность</th>
                    <th>Автор</th>
                    <th>Действия</th>
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
