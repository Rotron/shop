@extends('admin.layout')
@section('content')
<div class="box">
    <div class="box-header margin">
        <div class="pull-left">
            <form action='{{ URL::to("admin/tv-channel/add") }}'>
                <button class="btn btn-primary btn-sm">Добавить телеканал</button>
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
                    <th>Активность</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach ($items as $item)
                <tr class="fields">
                    <td>{{ $item->id }}</td>
                    <td><img src="/uploads/images/tv/logo/{{ $item->id }}.png?{{ time() }}" alt="{{ $item->title }}" width="50"></td>
                    <td>{{ $item->name }}</td>
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
                    <th>Активность</th>
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
