@extends('admin.layout')
@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">{{ trans("name.add") }} транспондера</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            {{ Form::open() }}
                <div class="box-body">
                    @if($errors->has())
                       @foreach ($errors->all() as $error)
                          <div class="form-group has-error"><label><i class="fa fa-times-circle-o"></i> {{ $error }}</label></div>
                      @endforeach
                    @endif
                    <div class="form-group {{ $errors->first('satellites_id') ? 'has-error' : '' }}">
                        {{ Form::label('satellites_id', 'Спутник')}}
                        {{ Form::select('satellites_id', Satellite::all(), null, ['class' => 'form-control', 'placeholder' => 'Amos 2/3']); }}
                    </div>
                    <div class="form-group {{ $errors->first('frequency_beam') ? 'has-error' : '' }}">
                        {{ Form::label('frequency_beam', 'Частота и поляризация') }}
                        {{ Form::text('frequency_beam', $item->frequency_beam, ['class' => 'form-control', 'placeholder' => '10722 H']) }}
                    </div>

                    <div class="form-group {{ $errors->first('sr_fec') ? 'has-error' : '' }}">
                        {{ Form::label('sr_fec', 'Скорость потока и FEC') }}
                        {{ Form::text('sr_fec',  $item->sr_fec, ['class' => 'form-control', 'placeholder' => '27500-3/4']) }}
                    </div>
                </div><!-- /.box-body -->

                <div class="box-footer">
                    {{ Form::submit('Сохранить', ['id' => 'send', 'class' => 'btn btn-primary']) }}
                </div>
            {{ Form::close() }}
        </div><!-- /.box -->
    </div><!--/.col (left) -->
</div>   <!-- /.row -->
@stop