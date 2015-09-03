@extends('admin.layout')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">{{ trans("name.add") }} пакета</h3>
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
                            {{ Form::select('satellite_id', TvSatellite::lists('name', 'id'), '', ['class' => 'form-control', 'placeholder' => 'Amos 2/3']); }}
                        </div>
                    </div>

                    <div class="col-md-2 col-sm-2">
                        <div class="form-group {{ $errors->first('frequency') ? 'has-error' : '' }}">
                            {{ Form::label('frequency', 'Частота') }}
                            {{ Form::text('frequency', '', ['class' => 'form-control', 'placeholder' => '10722']) }}
                        </div>
                    </div>

                    <div class="col-md-2 col-sm-2">
                        <div class="form-group {{ $errors->first('polarization') ? 'has-error' : '' }}">
                            {{ Form::label('polarization', 'Поляризация')}}
                            {{ Form::select('polarization', TvTransponder::POLARIZATION, '', ['class' => 'form-control']); }}
                        </div>
                    </div>

                    <div class="col-md-2 col-sm-2">
                        <div class="form-group {{ $errors->first('sr') ? 'has-error' : '' }}">
                            {{ Form::label('sr', 'Скорость') }}
                            {{ Form::text('sr',  '', ['class' => 'form-control', 'placeholder' => '27500']) }}
                        </div>
                    </div>

                    <div class="col-md-2 col-sm-2">
                        <div class="form-group {{ $errors->first('fec') ? 'has-error' : '' }}">
                            {{ Form::label('fec', 'FEC')}}
                            {{ Form::select('fec', TvTransponder::FEC, '', ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="hide">
                        <div class="form-group {{ $errors->first('tv-channels') ? 'has-error' : '' }}">
                            {{ Form::text('tv-channels',  '', ['id' => 'tv-channels', 'class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="hide">
                        <div class="form-group {{ $errors->first('tv-satellites') ? 'has-error' : '' }}">
                            {{ Form::text('tv-satellites',  '', ['id' => 'tv-satellites', 'class' => 'form-control']) }}
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

<div class='row'>
    <div class='col-xs-12'>
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#channels" data-toggle="tab">Телеканалы</a></li>
                <li><a href="#satellites" data-toggle="tab">Спутники</a></li>
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
                                    <li class="border" data-id="{{ $item->id }}"><img src="/uploads/images/tv/logo/{{ $item->id }}.png?{{ time() }}" alt="{{ $item->title }}" width="50"> <span>{{ $item->name }}</span></li>
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
                                <ol id="foo-satellite" class="list">
                                @foreach (TvSatellite::all() as $item)
                                    <li class="border" data-id="{{ $item->id }}"> <span>{{ $item->name }}</span></li>
                                @endforeach
                                </ol>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="box box-success" placeholder="ssss">
                                <div class="box-header">
                                    <h3 class="box-title">Спутники этого пакета</h3>
                                </div>

                                <ol id="bar-satellite" class="list">
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
        console.log($('#foo').height(), $('#bar').height());
        $('#bar').height($('#foo').height());
                console.log($('#foo').height(), $('#bar').height());
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