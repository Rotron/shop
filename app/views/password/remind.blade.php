@extends('layout')
@section('content')
<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <section class="section sign-in inner-right-xs">
                    <h2 class="bordered">Восстановление пароля</h2>
                    <p>Для восстановления пароля укажите адрес электронной почты, который используется для входа в «{{ Config::get('setting.company') }}»</p>
                    {{ Form::open(array('url' => action('RemindersController@postRemind'), 'method' => 'post', 'id' => 'password-remind', 'class' => 'login-form cf-style-1')) }}
                        <div class="field-row">
                            {{ Form::label('email', 'Электронная почта*', ['class' => 'control-label']) }}
                            {{ Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'test@gmail.com']) }}
                        </div>
                        <div class="buttons-holder">
                            <button type="submit" class="le-button huge">Восстановить пароль</button>
                        </div>
                    {{ Form::close() }}
                </section>
            </div>
        </div>
    </div>
</main>
@stop