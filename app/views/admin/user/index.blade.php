@extends('admin.layout')
@section('content')
<div class="box">
    <div class="box-header margin">
        <div class="pull-left">
            <a class="btn btn-primary btn-sm" href="{{ URL::to('admin/user/add') }}">Добавить</a>
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
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Email</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach ($items as $item)
                <tr class="fields">
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->firstname }}</td>
                    <td>{{ $item->lastname }}</td>
                    <td>{{ $item->email }}</td>
                </tr>
                @endforeach
            </tbody>

            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Email</th>
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
