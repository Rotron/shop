@extends('admin.layout')
@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">{{ trans("name.edit") }} спутника</h3>
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
                    <div class="hide">
                        <div class="form-group {{ $errors->first('tv_transponders') ? 'has-error' : '' }}">
                            {{ Form::label('tv_transponders', 'Телеканалы') }}
                            {{ Form::text('tv_transponders',  $item->tv_transponders, ['id' => 'tv_transponders', 'class' => 'form-control']) }}
                        </div>
                    </div>
                </div><!-- /.box-body -->

                <div class="box-footer">
                    {{ Form::submit('Сохранить', ['id' => 'send', 'class' => 'btn btn-primary']) }}
                </div>
            {{ Form::close() }}
        </div><!-- /.box -->
    </div><!--/.col (left) -->
    <div class="row">
        <div class="col-md-4">
            <div class="box box-success" id="tv-channel-list">
                <div class="box-header">
                    <h3 class="box-title">Транспондеры этого спутника</h3>
                </div>
                <div class="box-body">
                    @foreach (TvTransponder::where('satellite_id', '=', $item->id)->orderBy('frequency')->get() as $transponder)
                        <div>{{ $transponder->frequency }} | {{ TvTransponder::POLARIZATION[$transponder->polarization] }} | {{ $transponder->sr }}</div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@stop