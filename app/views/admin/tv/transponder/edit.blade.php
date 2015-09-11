@extends('admin.layout')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">{{ trans("name.edit") }} транспондера</h3>
            </div>
            {{ Form::open() }}
            <div class="box-body">
                @if($errors->has())
                   @foreach ($errors->all() as $error)
                      <div class="form-group has-error"><label><i class="fa fa-times-circle-o"></i> {{ $error }}</label></div>
                  @endforeach
                @endif
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <div class="form-group {{ $errors->first('satellite_id') ? 'has-error' : '' }}">
                            {{ Form::label('satellite_id', 'Спутник')}}
                            {{ Form::select('satellite_id', TvSatellite::lists('name', 'id'), $item->satellite_id, ['class' => 'form-control', 'placeholder' => 'Amos 2/3']); }}
                        </div>
                    </div>

                    <div class="col-md-2 col-sm-2">
                        <div class="form-group {{ $errors->first('frequency') ? 'has-error' : '' }}">
                            {{ Form::label('frequency', 'Частота') }}
                            {{ Form::text('frequency', $item->frequency, ['class' => 'form-control', 'placeholder' => '10722 H']) }}
                        </div>
                    </div>

                    <div class="col-md-2 col-sm-2">
                        <div class="form-group {{ $errors->first('polarization') ? 'has-error' : '' }}">
                            {{ Form::label('polarization', 'Поляризация')}}
                            {{ Form::select('polarization', TvTransponder::POLARIZATION, $item->polarization, ['class' => 'form-control']); }}
                        </div>
                    </div>

                    <div class="col-md-2 col-sm-2">
                        <div class="form-group {{ $errors->first('sr') ? 'has-error' : '' }}">
                            {{ Form::label('sr', 'Скорость') }}
                            {{ Form::text('sr',  $item->sr, ['class' => 'form-control', 'placeholder' => '27500-3/4']) }}
                        </div>
                    </div>

                    <div class="col-md-2 col-sm-2">
                        <div class="form-group {{ $errors->first('fec') ? 'has-error' : '' }}">
                            {{ Form::label('fec', 'FEC')}}
                            {{ Form::select('fec', TvTransponder::FEC, $item->fec, ['class' => 'form-control']); }}
                        </div>
                    </div>
                    <div class="hide">
                        <div class="form-group {{ $errors->first('tv_channels') ? 'has-error' : '' }}">
                            {{ Form::label('tv_channels', 'Телеканалы') }}
                            {{ Form::text('tv_channels',  $item->tv_channels, ['id' => 'tv-channels', 'class' => 'form-control']) }}
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    {{ Form::submit('Сохранить', ['id' => 'send', 'class' => 'btn btn-primary']) }}
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>

<?php 
    $tvChannels = json_decode($item->tv_channels);
?>
<div class="row">
    <div class="col-md-6">
        <div class="box" id="tv-channel-list">
            <div class="box-header">
                <h3 class="box-title">Все телеканалы</h3>
            </div>
            <ol id="foo" class="list">
            @foreach (TvChannel::all() as $item)
                @if ( !is_array($tvChannels) || array_search($item->id, $tvChannels) === false)
                <li class="border" data-id="{{ $item->id }}"><img src="/uploads/images/tv/logo/{{ $item->id }}.png?{{ time() }}" alt="{{ $item->title }}" width="50"> <span>{{ $item->name }}</span></li>
                @endif
            @endforeach
            </ol>
        </div>
    </div>
    <div class="col-md-6">
        <div class="box box-success"  id="tv-channel-list-tratsponder">
            <div class="box-header">
                <h3 class="box-title">Телеканалы этого транспондера</h3>
            </div>

            <ol id="bar" class="list">
            @foreach (TvChannel::all() as $item)
                @if ( is_array($tvChannels) && array_search($item->id, $tvChannels) !== false)
                <li class="border" data-id="{{ $item->id }}"><img src="/uploads/images/tv/logo/{{ $item->id }}.png?{{ time() }}" alt="{{ $item->title }}" width="50"> <span>{{ $item->name }}</span></li>
                @endif
            @endforeach
            </ol>
        </div>
    </div>
</div>
<script src="{{ asset('/backend/js/plugins/sortable/sortable.js') }}"></script>
<script src="{{ asset('/backend/js/plugins/sortable/app.js') }}"></script>
<script type="text/javascript">
    $(function(){
        $('#bar').height($('#foo').height())
    })
</script>
<style type="text/css">
    .list{
        min-height: 200px 
    }
    .list{
        padding-bottom: 20px;

    }
    ol li{
        cursor: move;
        border-bottom: 1px solid #F4F4F4;
        max-width: 96%;
    }
    ol li span{
        font-size: 16px;
        vertical-align: middle;
    }
    ol li img{
        margin-right: 5px auto;
    }
</style>
@stop