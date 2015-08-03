@extends('admin.layout')
@section('content')
<div class="box">
    <div class="box-header margin">
        <!--div class="pull-left">
            <form action='{{ URL::to("admin/order/add") }}'>
                <button class="btn btn-primary btn-sm">Добавить заказ</button>
            </form>
        </div-->
        <div class="pull-right">
            <div id="message"></div>
            <button class="btn btn-info btn-sm change"><i class="fa fa-edit"></i>Изменить</button>
            <!--button class="btn btn-sm btn-danger confirm"><i class="glyphicon glyphicon-trash"></i>Удалить</button-->
        </div>
    </div>
    <div class="box-body table-responsive">
    {{ Form::open()}}
        <table id="data" class="table table-bordered display">
            <thead>
                <tr>
                    <th>№ заказа</th>
                    <th>Покупатель</th>
                    <th>Статус</th>
                    <th>Создан</th>
                    <th>Итого</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($items as $item)
                <tr class="fields">
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->fullname }}</td>
                    <td>{{ $item->title }}</td>
                    <td class="text-center">{{ date('d.m.Y H:i', strtotime($item->created_at)) }}</td>
                    <td>{{ $item->total }} грн.</td>
                </tr>
                @endforeach
            </tbody>

            <tfoot>
                <tr>
                    <th>№ заказа</th>
                    <th>Покупатель</th>
                    <th>Статус</th>
                    <th>Создан</th>
                    <th>Итого</th>
                </tr>
            </tfoot>
        </table>
        {{Form::close()}}
    </div>
</div>
<script type="text/javascript">
    $(function() {
       /*var table = $("#data").dataTable({
        'aaSorting': [0, 'desc']
       });*/
       //table.fnSort([[0, 'DESC']]);
       $('.icheckbox_minimal').removeClass('disabled');
    });
</script>
@stop
