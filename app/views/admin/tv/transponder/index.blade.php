@extends('admin.layout')
@section('content')
<div class="box">
    <div class="box-header margin">
        <div class="pull-left">
            {{ HTML::link('admin/transponder/add', 'Добавить транспондер', ['class' => 'btn btn-primary btn-sm']) }}
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
                    <th>Спутник</th>
                    <th>Частота</th>
                    <th>Поляризация</th>
                    <th>Скорость потока</th>
                    <th>FEC</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach ($items as $item)
                <tr class="fields">
                    <td>{{ $item->id }}</td>
                    <td>{{ $satellites[$item->satellite_id] }}</td>
                    <td>{{ $item->frequency }}</td>
                    <td>{{ Transponder::POLARIZATION[$item->polarization] }}</td>
                    <td>{{ $item->sr }}</td>
                    <td>{{ Transponder::FEC[$item->fec] }}</td>
                </tr>
                @endforeach
            </tbody>

            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Спутник</th>
                    <th>Частота</th>
                    <th>Поляризация</th>
                    <th>Скорость потока</th>
                    <th>FEC</th>
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
