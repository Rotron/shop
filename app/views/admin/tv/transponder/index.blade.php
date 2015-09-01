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
        <table id="transponder" class="table table-bordered display">
            <thead>
                <tr>
                    <th  hidden>id</th>
                    <th>Спутник</th>
                    <th>Частота</th>
                    <th>Поляризация</th>
                    <th>Скорость потока</th>
                    <th>FEC</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach ($items as $item)
                <tr  class="fields">
                    <td hidden>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->frequency }}</td>
                    <td>{{ TvTransponder::POLARIZATION[$item->polarization] }}</td>
                    <td>{{ $item->sr }}</td>
                    <td>{{ TvTransponder::FEC[$item->fec] }}</td>
                </tr>
                @endforeach
            </tbody>

            <tfoot>
                <tr>
                    <th hidden>id</th>
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
        $('.icheckbox_minimal').removeClass('disabled');
        var table = $("#transponder").dataTable({ "bSort": false, "paging": false, });

        $('#transponder tbody').on( 'click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }
            else {
                table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        });
    });
</script>
@stop