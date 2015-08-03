@extends('layout')
@section('title'){{ e($page->title) }}@stop
@section('description'){{ e($page->meta_description) }}@stop
@section('author'){{ User::find($page->user_id)->firstname }} {{ User::find($page->user_id)->lastname }}@stop
@section('keywords'){{ e($page->meta_keywords) }}@stop
@section('url'){{ Request::url() }}@stop
@section('content')
    @if ($page->link == 'contacts')
<!-- ========================================= MAIN ========================================= -->
<main id="contact-us" class="inner-bottom-md">
    <section class="google-map map-holder">
        <div id="map" class="map center"></div>
        {{ Form::hidden('zoom', Config::get('setting.zoom')) }}
        {{ Form::hidden('latitude', Config::get('setting.latitude')) }}
        {{ Form::hidden('longitude', Config::get('setting.longitude')) }}
    </section>

    <div class="container">
        <div class="row">
            
            <div class="col-md-8">
                <section class="section leave-a-message">
                    <h2 class="bordered">{{ $page->title }}</h2>
                    <p>{{ $page->content }}</p>
                    <form id="contact-form" class="contact-form cf-style-1 inner-top-xs" method="post" action="{{ asset('page/send') }}">
                    <h2 class="bordered">Оставьте сообщение</h2>
                        <div class="row field-row"><br>
                            <div class="col-xs-12 col-sm-6">
                                {{ Form::label('fullname', 'Ваше имя', ['class' => 'control-label']) }}
                                {{ Form::text('fullname', '', ['class' => 'form-control', 'placeholder' => 'Иван Иванов']) }}
                                @if($errors->has('fullname'))
                                    {{ Form::label('fullname', $errors->first('fullname'), ['class' => 'error']) }}
                                @endif
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                {{ Form::label('email', 'Ваш Email', ['class' => 'control-label']) }}
                                {{ Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'mail@gmail.com']) }}
                                @if($errors->has('email'))
                                    {{ Form::label('email', $errors->first('email'), ['class' => 'error']) }}
                                @endif
                            </div>
                        </div><!-- /.field-row -->
                        
                        <div class="field-row">
                            {{ Form::label('theme', 'Тема', ['class' => 'control-label']) }}
                            {{ Form::text('theme', '', ['class' => 'form-control', 'placeholder' => 'Спутниковое оборудование']) }}
                            @if($errors->has('theme'))
                                {{ Form::label('theme', $errors->first('theme'), ['class' => 'error']) }}
                            @endif
                        </div><!-- /.field-row -->

                        <div class="field-row">
                            {{ Form::label('message', 'Ваше сообщение', ['class' => 'control-label']) }}
                            {{ Form::textarea('message', '', ['size' => '50x3', 'class' => 'form-control']) }}
                            @if($errors->has('message'))
                                {{ Form::label('message', $errors->first('message'), ['class' => 'error']) }}
                            @endif
                        </div><!-- /.field-row -->

                        <div class="buttons-holder">
                            <button type="submit" class="le-button huge">Отправить</button>
                        </div><!-- /.buttons-holder -->
                    </form><!-- /.contact-form -->
                </section><!-- /.leave-a-message -->
            </div><!-- /.col -->

            <div class="col-md-4">
                <section class="our-store section inner-left-xs">
                    <h2 class="bordered">Наш магазин</h2>
                    <address>
                        {{ Config::get('setting.address') }}<br>
                        Т. {{ Config::get('setting.phone') }}
                    </address>
                    <h2 class="bordered">Режим работы</h2>
                    <address>
                        {{ Config::get('setting.mode') }}
                    </address>

                    <!--h3>Career</h3>
                    <p>If you're interested in employment opportunities at MediaCenter, please email us: <a href="mailto:contact@yourstore.com">contact@yourstore.com</a></p-->
                </section><!-- /.our-store -->
            </div><!-- /.col -->

        </div><!-- /.row -->
    </div><!-- /.container -->
</main>
<!-- ========================================= MAIN : END ========================================= -->
    @else
        <!-- ========================================= MAIN ========================================= -->
        <main id="terms" class="inner-bottom-md">
            <div class="container">
                <section class="section section-page-title">
                    <div class="page-header">
                        <h2 class="page-title">{{ $page->title }}</h2>
                    </div>
                </section><!-- /.section-page-title -->
                <p>{{ $page->content }}</p>
            </div>
        </main><!-- /.inner-bottom-md -->
        <!-- ========================================= MAIN ========================================= -->
    @endif
@stop