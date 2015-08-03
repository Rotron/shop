@extends('layout')

@section('content')
<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <section class="section register inner-left-xs">
                    <h2 class="bordered">Регистрация</h2>
                    <p>Вы можете зарегистрироваться с помощью учетных записей социальных сетей</p>
                    <!--div class="social-auth-buttons">
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn-block btn-lg btn btn-vk"><i class="fa fa-vk"></i>Регистрация Вконтакте</button>
                            </div>
                            <div class="col-md-6">
                                <button class="btn-block btn-lg btn btn-facebook"><i class="fa fa-facebook"></i>Регистрация Facebook</button>
                            </div>
                        </div>
                    </div-->
                    {{ Form::open(array('url' => asset('registration'), 'method' => 'post', 'id' => 'registration', 'class' => 'register-form cf-style-1')) }}
                        <div class="field-row">
                            {{ Form::label('firstname', 'Ваше имя*', ['class' => 'control-label']) }}
                            {{ Form::text('firstname', '', ['class' => 'form-control',]) }}
                        </div>

                        <div class="field-row">
                            {{ Form::label('email', 'Электронная почта*', ['class' => 'control-label']) }}
                            {{ Form::text('email', '', ['class' => 'form-control',]) }}
                        </div>

                        <div class="field-row">
                            {{ Form::label('password', 'Придумайте себе пароль*', ['class' => 'control-label']) }}
                            {{ Form::password('password', ['class' => 'form-control']) }}
                        </div>

                        <div class="buttons-holder">
                            <button type="submit" class="le-button huge">Зарегистрироваться</button>
                        </div>
                    {{ Form::close() }}
                    <h2 class="semi-bold">Зарегистрируйтесь сегодня и вы сможете:</h2>

                    <ul class="list-unstyled list-benefits">
                        <li><i class="fa fa-check primary-color"></i> Быстро оформлять заказ</li>
                        <li><i class="fa fa-check primary-color"></i> Легко отслеживать свои заказы</li>
                        <li><i class="fa fa-check primary-color"></i> Просматривать историю покупок</li>
                    </ul>
                </section>
            </div>
            <div class="col-md-5">
                <section class="section sign-in inner-right-xs">
                    <h2 class="bordered">Вход в интернет-магазин</h2>
                    <p>Войти как пользователь</p>
                    <!--div class="social-auth-buttons">
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn-block btn-lg btn btn-vk"><i class="fa fa-vk"></i>Вход Вконтакте</button>
                            </div>
                            <div class="col-md-6">
                                <button class="btn-block btn-lg btn btn-facebook"><i class="fa fa-facebook"></i>Вход Facebook</button>
                            </div>
                        </div>
                    </div-->
                    {{ Form::open(array('url' => asset('login'), 'method' => 'post', 'id' => 'login', 'class' => 'login-form cf-style-1')) }}
                        <div class="field-row">
                            {{ Form::label('email', 'Электронная почта*', ['class' => 'control-label']) }}
                            {{ Form::text('email', '', ['class' => 'form-control',]) }}
                        </div>

                        <div class="field-row">
                            {{ Form::label('password', 'Пароль*', ['class' => 'control-label']) }}
                            {{ Form::password('password', ['class' => 'form-control']) }}
                        </div>

                        <div class="field-row clearfix">
                            <span class="pull-left">
                                <button type="submit" class="le-button huge">Вход</button>
                            </span>
                            <span class="pull-right">
                                <a href="{{ asset('password/remind') }}" class="content-color bold">Забыли пароль?</a>
                            </span>
                        </div>
                    {{ Form::close() }}

                </section>
            </div>
        </div>
    </div>
</main>
@stop