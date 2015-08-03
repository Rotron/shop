@extends('layout')
{{-- Content --}}

@section('content')
<section id="single-product-tab">
    <div class="container">
        <div class="tab-holder">
            @if (!Auth::check())
            <ul class="nav nav-tabs simple" >
                <li class="active"><a href="#new" data-toggle="tab" id="new-client">Я новый покупатель</a></li>
                <li><a href="#old" data-toggle="tab" id="old-client">Я постоянный клиент</a></li>
            </ul><!-- /.nav-tabs -->
            @endif

            <div class="tab-content">
                <div class="tab-pane active" id="new">
                    <form role="form" id="order-form" method="post" action="{{ asset('checkout/add') }}">
                        <div class="billing-address">
                            <h2 class="border h1">Оформление заказа</h2>
                            <div class="row field-row">
                                <div class="col-xs-12 col-sm-6 form-group {{ $errors->has('firstname') ? 'has-error' : '' }}">
                                    {{ Form::label('firstname', 'Имя*', ['class' => 'control-label']) }}
                                    {{ Form::text('firstname', isset(Auth::user()->firstname) ? Auth::user()->firstname : '', ['class' => 'form-control', 'placeholder' => 'Иван']) }}
                                    @if($errors->has('firstname'))
                                        {{ Form::label('firstname', $errors->first('firstname'), ['class' => 'error']) }}
                                    @endif
                                </div>
                                <div class="col-xs-12 col-sm-6 form-group {{ $errors->has('lastname') ? 'has-error' : '' }}">
                                    {{ Form::label('lastname', 'Фамилия*', ['class' => 'control-label']) }}
                                    {{ Form::text('lastname', isset(Auth::user()->lastname) ? Auth::user()->lastname : '', ['class' => 'form-control', 'placeholder' => 'Иванов']) }}
                                    @if($errors->has('lastname'))
                                        {{ Form::label('lastname', $errors->first('lastname'), ['class' => 'error']) }}
                                    @endif
                                </div>
                            </div>

                            <div class="row field-row">
                                <div class="col-xs-12 col-sm-{{ Auth::check() ? 6 : 4 }} form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                                    {{ Form::label('address', 'Почтовый адрес*', ['class' => 'control-label']) }}
                                    {{ Form::text('address', isset(Auth::user()->address) ? Auth::user()->address : '', ['class' => 'form-control', 'placeholder' => 'Киев, ул. Лесная 22, кв 2']) }}
                                    @if($errors->has('address'))
                                        {{ Form::label('address', $errors->first('address'), ['class' => 'error']) }}
                                    @endif
                                </div>
                                <div class="col-xs-12 col-sm-{{ Auth::check() ? 6 : 4 }} form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                                    {{ Form::label('phone', 'Номер телефона*', ['class' => 'control-label']) }}
                                    {{ Form::text('phone', isset(Auth::user()->phone) ? Auth::user()->phone : '', ['class' => 'form-control', 'placeholder' => '(050) 222-22-22']) }}
                                    @if($errors->has('phone'))
                                        {{ Form::label('phone', $errors->first('phone'), ['class' => 'error']) }}
                                    @endif
                                </div>
                                <div class="col-xs-12 col-sm-4 form-group {{ Auth::check() ? 'hide' : '' }} {{ $errors->has('email') ? 'has-error' : '' }}">
                                    {{ Form::label('email', 'Email*', ['class' => 'control-label']) }}
                                    {{ Form::text('email', isset(Auth::user()->email) ? Auth::user()->email : '', [
                                        'class' => 'form-control', 
                                        'placeholder' => 'email@gmail.com', 
                                        'data-toggle' => 'popover', 
                                        'data-placement' => 'bottom', 
                                        'data-html' => 'true', 
                                        'data-title' => 'Email существует', 
                                        'data-content' => '<p>Покупатель с этим адресом эл. почты уже зарегистрирован на ' 
                                            . Config::get('setting.company') 
                                            . '!</p><p><a href="#" id="authorization">Войдите с паролем</a> и мы сохраним этот заказ в Вашем личном кабинете'])
                                    }}
                                    @if($errors->has('email'))
                                        {{ Form::label('email', $errors->first('email'), ['class' => 'error']) }}
                                    @endif
                                </div>
                            </div>
                            <div class="row field-row">
                                <div class="col-xs-12 col-sm-12 form-group">
                                    {{ Form::label('comment', 'Комментарий к заказу', ['class' => 'control-label']) }}
                                    {{ Form::textarea('comment', '', ['size' => '50x2', 'class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="row field-row">
                                <div id="create-account" class="col-xs-12">
                                    @if (!Auth::check())
                                    <!--input  class="le-checkbox big" type="checkbox"  />
                                    <a class="simple-link bold" href="#">Создать аккаунт </a> - вы получите письмо с временно сгенерированным паролем, после входа вы должны изменить его.-->
                                    @endif
                                </div>
                            </div><!-- /.field-row -->

                        </div><!-- /.billing-address -->
                        {{ Form::submit('', array('class' => 'hide', 'id' => 'submit')) }}
                    </form>
                </div><!-- /.tab-pane #description -->

                <div class="tab-pane" id="old">
                    <div class="row">
                        <div class="col-md-6">
                            <section class="section sign-in inner-right-xs">
                                <h2 class="border h1">Вход в интернет-магазин</h2>

                                <!--div class="social-auth-buttons">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button class="btn-block btn-lg btn btn-vk"><i class="fa fa-vk"></i> Вход через вконтакте</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button class="btn-block btn-lg btn btn-facebook"><i class="fa fa-facebook"></i> Вход через facebook</button>
                                        </div>
                                    </div>
                                </div-->
                                {{ Form::open(array('url' => asset('login'), 'method' => 'post', 'class' => 'login-form cf-style-1', 'id' => 'login')) }}
                                    <div class="field-row">
                                        {{ Form::label('email', 'Электронная почта*', ['class' => 'control-label']) }}
                                        {{ Form::text('email', isset(Auth::user()->email) ? Auth::user()->email : '', ['class' => 'form-control']) }}
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
                </div><!-- /.tab-pane #additional-info -->
            </div><!-- /.tab-content -->

        </div><!-- /.tab-holder -->
    </div><!-- /.container -->
</section><!-- /#single-product-tab -->

<section id="checkout-page">
    <div class="container">
        <div class="col-xs-12 no-margin">

                <!--section id="shipping-address">
                    <h2 class="border h1">shipping address</h2>
                    <form>
                        <div class="row field-row">
                            <div class="col-xs-12">
                                <input  class="le-checkbox big" type="checkbox"  />
                                <a class="simple-link bold" href="#">ship to different address?</a>
                            </div>
                        </div>
                    </form>
                </section-->

                <section id="your-order">
                    <h2 class="border h1">Ваш заказ</h2>
                    
                        @foreach(Cart::content() as $row)
                        <div class="row no-margin order-item">
                            <div class="col-xs-12 col-sm-2 no-margin">
                                <a href="{{ asset($row->options['link']) }}" class="thumb-holder">
                                    <img class="lazy" alt="{{ $row->name }}" src='{{ asset("uploads/images/product/" . $row->id . "_1_thumb.png") }}' />
                                </a>                        
                            </div>

                            <div class="col-xs-12 col-sm-6 ">
                                <div class="title"><a href="{{ asset($row->options['link']) }}">{{ $row->name }}</a></div>
                            </div>

                            <div class="col-xs-12 col-sm-2 ">
                                <div class="title"><a>{{ $row->price }}грн.</a></div>
                            </div>

                            <div class="col-xs-12 col-sm-1 ">
                                <div class="title"><a>{{ $row->qty }}шт.</a></div>
                            </div>

                            <div class="col-xs-12 col-sm-1 no-margin">
                                <div class="price">{{ $row->subtotal }}грн.</div>
                            </div>
                        </div>
                        @endforeach
                    
                </section><!-- /#your-order -->

                <div id="total-area" class="row no-margin">
                    <div class="col-xs-12 col-lg-2 col-lg-offset-10 no-margin-right">
                        <div id="subtotal-holder">
                            <!--ul class="tabled-data inverse-bold no-border">
                                <li>
                                    <label>cart subtotal</label>
                                    <div class="value ">$8434.00</div>
                                </li>
                                <li>
                                    <label>shipping</label>
                                    <div class="value">
                                        <div class="radio-group">
                                            <input class="le-radio" type="radio" name="group1" value="free"> <div class="radio-label bold">free shipping</div><br>
                                            <input class="le-radio" type="radio" name="group1" value="local" checked>  <div class="radio-label">local delivery<br><span class="bold">$15</span></div>
                                        </div>
                                    </div>
                                </li>
                            </ul--><!-- /.tabled-data -->

                            <ul id="total-field" class="tabled-data inverse-bold ">
                                <li>
                                    <label>Итого:</label>
                                    <div class="value">{{ Cart::total() }}грн.</div>
                                </li>
                            </ul><!-- /.tabled-data -->

                        </div><!-- /#subtotal-holder -->
                    </div><!-- /.col -->
                </div><!-- /#total-area -->

                <!--div id="payment-method-options">
                    <form>
                        <div class="payment-method-option">
                            <input class="le-radio" type="radio" name="group2" value="Direct">
                            <div class="radio-label bold ">Direct Bank Transfer<br>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce rutrum tempus elit, vestibulum vestibulum erat ornare id.</p>
                            </div>
                        </div>
                        
                        <div class="payment-method-option">
                            <input class="le-radio" type="radio" name="group2" value="cheque">
                            <div class="radio-label bold ">cheque payment</div>
                        </div>
                        
                        <div class="payment-method-option">
                            <input class="le-radio" type="radio" name="group2" value="paypal">
                            <div class="radio-label bold ">paypal system</div>
                        </div>
                    </form>
                </div-->
                
                <div class="place-order-button">
                    <button class="le-button big" id="send">Заказ подтверждаю</button>
                </div><!-- /.place-order-button -->
            
        </div><!-- /.col -->
    </div><!-- /.container -->    
</section><!-- /#checkout-page -->
<script type="text/javascript">
    $(function(){
        $('#send').click(function(){
            $('#submit').click();
        })

        $('#new-client').click(function(){
            $("#checkout-page").removeClass("hide");
        })

        $('#old-client').click(function(){
            $("#checkout-page").addClass("hide");
        })
    });
</script>
@stop