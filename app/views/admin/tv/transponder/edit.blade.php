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
                    <div class="form-group {{ $errors->first('satellite_id') ? 'has-error' : '' }}">
                        {{ Form::label('satellite_id', 'Спутник')}}
                        {{ Form::select('satellite_id', Satellite::lists('name', 'id'), $item->satellite_id, ['class' => 'form-control', 'placeholder' => 'Amos 2/3']); }}
                    </div>

                    <div class="form-group {{ $errors->first('frequency') ? 'has-error' : '' }}">
                        {{ Form::label('frequency', 'Частота и поляризация') }}
                        {{ Form::text('frequency', $item->frequency, ['class' => 'form-control', 'placeholder' => '10722 H']) }}
                    </div>

                    <div class="form-group {{ $errors->first('polarization') ? 'has-error' : '' }}">
                        {{ Form::label('polarization', 'Поляризация')}}
                        {{ Form::select('polarization', Transponder::POLARIZATION, $item->polarization, ['class' => 'form-control']); }}
                    </div>

                    <div class="form-group {{ $errors->first('sr') ? 'has-error' : '' }}">
                        {{ Form::label('sr', 'Скорость потока') }}
                        {{ Form::text('sr',  $item->sr, ['class' => 'form-control', 'placeholder' => '27500-3/4']) }}
                    </div>

                    <div class="form-group {{ $errors->first('fec') ? 'has-error' : '' }}">
                        {{ Form::label('fec', 'FEC')}}
                        {{ Form::select('fec', Transponder::FEC, $item->fec, ['class' => 'form-control']); }}
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