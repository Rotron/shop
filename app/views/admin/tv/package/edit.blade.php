@extends('admin.layout')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">{{ trans("name.edit") }} пакета</h3>
            </div>
            {{ Form::open() }}
            <div class="box-body">
                @if($errors->has())
                   @foreach ($errors->all() as $error)
                      <div class="form-group has-error"><label><i class="fa fa-times-circle-o"></i> {{ $error }}</label></div>
                  @endforeach
                @endif
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group {{ $errors->first('name') ? 'has-error' : '' }}">
                            {{ Form::label('name', 'Название') }}
                            {{ Form::text('name', $item->name, ['class' => 'form-control', 'placeholder' => 'Стандарт']) }}
                        </div>
                    </div>

                    <div class="col-md-5 col-sm-5">
                        <div class="form-group {{ $errors->first('operator_id') ? 'has-error' : '' }}">
                            {{ Form::label('operator_id', 'Оператор') }}
                            {{ Form::select('operator_id', TvOperator::lists('name', 'id'), $item->operator_id, ['class' => 'form-control']); }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group {{ $errors->first('active') ? 'has-error' : '' }}">
                            {{ Form::checkbox('active', '1', $item->active) }} Активность
                        </div>
                    </div>

                    <div class="hide">
                        <div class="form-group {{ $errors->first('tv_channels') ? 'has-error' : '' }}">
                            {{ Form::text('tv_channels',  $item->tv_channels, ['id' => 'tv-channels', 'class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="hide">
                        <div class="form-group {{ $errors->first('tv_satellites') ? 'has-error' : '' }}">
                            {{ Form::text('tv_satellites',  $item->tv_satellites, ['id' => 'tv-satellites', 'class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="hide">
                        <div class="form-group {{ $errors->first('tv_packages') ? 'has-error' : '' }}">
                            {{ Form::text('tv_packages',  $item->tv_packages, ['id' => 'tv-packages', 'class' => 'form-control']) }}
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
    $tvSatellites = json_decode($item->tv_satellites);
    $tvPackages = json_decode($item->tv_packages);
?>

<div class='row'>
    <div class='col-xs-12'>
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#channels" data-toggle="tab">Телеканалы</a></li>
                <li><a href="#satellites" data-toggle="tab">Спутники</a></li>
                <li><a href="#packages" data-toggle="tab">Пакеты</a></li>
            </ul>
            <div class="tab-content">
                <!-- Font Awesome icons -->
                <div class="tab-pane active" id="channels">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box">
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
                            <div class="box box-success" placeholder="ssss">
                                <div class="box-header">
                                    <h3 class="box-title">Телеканалы этого пакета</h3>
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
                </div>
                <div class="tab-pane" id="satellites" >
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Все спутники</h3>
                                </div>
                                <ol id="foo-satellites" class="list">
                                @foreach (TvSatellite::all() as $satellite)
                                    @if ( !is_array($tvSatellites) || array_search($satellite->id, $tvSatellites) === false)
                                    <li class="border" data-id="{{ $satellite->id }}"> <span>{{ $satellite->name }} - {{ $satellite->longitude }}{{ TvSatellite::WARD[$satellite->ward] }}</span></li>
                                    @endif
                                @endforeach
                                </ol>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="box box-success" placeholder="ssss">
                                <div class="box-header">
                                    <h3 class="box-title">Спутники этого пакета</h3>
                                </div>
                                <ol id="bar-satellites" class="list">
                                @foreach (TvSatellite::all() as $satellite)
                                    @if ( is_array($tvSatellites) && array_search($satellite->id, $tvSatellites) !== false)
                                    <li class="border" data-id="{{ $satellite->id }}"> <span>{{ $satellite->name }} - {{ $satellite->longitude }}{{ TvSatellite::WARD[$satellite->ward] }}</span></li>
                                    @endif
                                @endforeach
                                </ol>
                            </div>
                        </div>    
                    </div>
                </div><!-- /#ion-icons -->
                <div class="tab-pane" id="packages" >
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Все пакеты</h3>
                                </div>
                                <ol id="foo-packages" class="list">
                                @foreach (TvPackage::all() as $packege)
                                    @if ( !is_array($tvPackages) || array_search($packege->id, $tvPackages) === false)
                                    <li class="border" data-id="{{ $packege->id }}"> <span>{{ $packege->name }}</span></li>
                                    @endif
                                @endforeach
                                </ol>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="box box-success" placeholder="ssss">
                                <div class="box-header">
                                    <h3 class="box-title">Пакеты этого пакета</h3>
                                </div>

                                <ol id="bar-packages" class="list">
                                @foreach (TvPackage::all() as $satellite)
                                    @if ( is_array($tvPackages) && array_search($satellite->id, $tvPackages) !== false)
                                    <li class="border" data-id="{{ $satellite->id }}"> <span>{{ $satellite->name }}</span></li>
                                    @endif
                                @endforeach
                                </ol>
                            </div>
                        </div>    
                    </div>
                </div><!-- /#ion-icons -->
            </div><!-- /.tab-content -->
        </div><!-- /.nav-tabs-custom -->
    </div><!-- /.col -->
</div><!-- /.row -->

<script src="{{ asset('/backend/js/plugins/sortable/sortable.js') }}"></script>
<script src="{{ asset('/backend/js/plugins/sortable/app.js') }}"></script>
<script type="text/javascript">
    $(function(){
        $('#bar').height($('#foo').height());
    })
</script>

<style type="text/css">
    .list{
        min-height: 300px;
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