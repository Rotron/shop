@extends('admin.layout')
@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">{{ trans("name.add") }} спутника</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            {{ Form::open() }}
                <div class="box-body">
                    @if($errors->has())
                       @foreach ($errors->all() as $error)
                          <div class="form-group has-error"><label><i class="fa fa-times-circle-o"></i> {{ $error }}</label></div>
                      @endforeach
                    @endif
                    <div class="form-group {{ $errors->first('name') ? 'has-error' : '' }}">
                        {{ Form::label('name', 'Название')}}
                        {{ Form::text('name', $item->name, ['class' => 'form-control', 'placeholder' => 'Amos 2/3']) }}
                    </div>
                    <div class="form-group {{ $errors->first('longitude') ? 'has-error' : '' }}">
                        {{ Form::label('longitude', 'Долгота') }}
                        {{ Form::text('longitude', $item->longitude, ['class' => 'form-control', 'placeholder' => '4 W']) }}
                    </div>
                    <div class="form-group {{ $errors->first('ward') ? 'has-error' : '' }}">
                        {{ Form::label('ward', 'Направление')}}
                        {{ Form::select('ward', TvSatellite::WARD, $item->ward, ['class' => 'form-control']); }}
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