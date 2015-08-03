@extends('admin.layout')
@section('content')
<div class="box">
    <div class="box-header margin">
        <div class="pull-left">
            <form action='{{ URL::to("admin/category/add") }}'>
                <button class="btn btn-primary btn-sm">Добавить категорию</button>
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
                    <th>Родительская категория</th>
                    <th>Название</th>
                    <th>Активность</th>
                    <th>Создано</th>
                </tr>
            </thead>
            
            <tbody id="sortable">
                @foreach ($items as $item)
                <tr class="fields">
                    <td class="id">{{ $item->id }}</td>
                    <td class="center small">{{ Category::find($item->parent_id) ? Category::find($item->parent_id)->title : '' }}</td>
                    <td>{{ $item->title }}</td>
                    <td class="text-center">
                    {{ Form::checkbox('active[]', $item->id, $item->active, ['class' => 'checkbox', 'disabled' => 'disabled']) }}
                    </td>
                    <td class="text-center">{{ date('d.m.Y H:i', strtotime($item->created_at)) }}</td>
                </tr>
                @endforeach
            </tbody>

            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Родительская категория</th>
                    <th>Название</th>
                    <th>Активность</th>
                    <th>Создано</th>
                </tr>
            </tfoot>
        </table>
        {{Form::close()}}
    </div>
</div>
@stop
