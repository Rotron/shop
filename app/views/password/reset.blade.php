@extends('layout')
@section('content')
<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <section class="section sign-in inner-right-xs">
                    <h2 class="bordered">Восстановление пароля</h2>
                    <p>Для изменения пароля заполните форму</p>
                    {{ Form::open(array('url' => action('RemindersController@postReset'), 'method' => 'post', 'id' => 'password-reset', 'class' => 'login-form cf-style-1')) }}
                        <div class="field-row">
                            {{ Form::label('email', 'Электронная почта*', ['class' => 'control-label']) }}
                            {{ Form::text('email', '', ['class' => 'form-control']) }}
                        </div>
                        <div class="field-row">
                            {{ Form::label('password', 'Пароль*', ['class' => 'control-label']) }}
                            {{ Form::password('password', ['id' => 'password', 'class' => 'form-control']) }}
                        </div>
                        <div class="field-row">
                            {{ Form::label('password_confirmation', 'Подтверждение пароля*', ['class' => 'control-label']) }}
                            {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
                            {{ Form::hidden('token', $token) }}
                        </div>
                        <div class="buttons-holder">
                            <button type="submit" class="le-button huge">Сохранить новый пароль</button>
                        </div>
                    {{ Form::close() }}
                </section>
            </div>
        </div>
    </div>
</main>
@stop