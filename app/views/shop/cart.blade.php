@extends('layout')
{{-- Content --}}

@section('content')
<section id="cart-page">
    <div class="container">
        <!-- ========================================= CONTENT ========================================= -->
        <div class="col-xs-12 col-md-9 items-holder no-margin">
        @if( $cart->isEmpty() )
            <div class="cart-empty">Корзина пуста</div>
        @else
            @foreach(Cart::content() as $row)
            <div class="row no-margin cart-item">
                <div class="col-xs-12 col-sm-2 no-margin">
                    <a href="{{ $row->options->link }}" class="thumb-holder">
                        <img class="lazy" alt="{{ $row->name }}" src='{{ asset("uploads/images/product/" . $row->id . "_1_thumb.png") }}' />
                    </a>
                </div>

                <div class="col-xs-12 col-sm-5 ">
                    <div class="title">
                        <a href="{{ $row->options->link }}">{{ $row->name }}</a>
                    </div>
                    <div class="price"><span>{{ $row->price }}</span>грн</div>
                </div> 

                <div class="col-xs-12 col-sm-3 no-margin">
                    <div class="quantity">
                        <div class="le-quantity">
                            <form>
                                <a class="minus" href="#reduce"></a>
                                <input name="product_id" type="hidden" value="{{ $row->id }}" />
                                <input name="quantity" readonly="readonly" type="text" value="{{ $row->qty }}" />
                                <a class="plus" href="#add"></a>
                            </form>
                        </div>
                    </div>
                </div> 

                <div class="col-xs-12 col-sm-2 no-margin">
                    <div class="total-price">
                        <span>{{ $row->subtotal }}</span>грн
                    </div>
                    <a class="close-btn" data-product="{{ $row->id }}" href="#" data-toggle="modal" data-target=".bs-example-modal-sm"></a>
                </div>
            </div><!-- /.cart-item -->
            @endforeach
        @endif
        </div>
        <!-- ========================================= CONTENT : END ========================================= -->

        <!-- ========================================= SIDEBAR ========================================= -->

        <div class="col-xs-12 col-md-3 no-margin sidebar">
            <div class="widget cart-summary">
                <h1 class="border">Корзина</h1>
                <div class="body">
                    <ul id="total-price" class="tabled-data inverse-bold no-border">
                        <li>
                            <label>итого</label>
                            <div class="value pull-right"><span>{{ Cart::total() }}</span>грн</div>
                        </li>
                    </ul>
                    <div class="buttons-holder">
                        @if( !$cart->isEmpty() )
                        <a class="le-button big" href="{{ asset('checkout') }}" >Оформить заказ</a>
                        @endif
                        <a class="simple-link block" href="{{ asset('/') }}" >Продолжить покупки</a>
                    </div>
                </div>
            </div><!-- /.widget -->

            <!--div id="cupon-widget" class="widget">
                <h1 class="border">использование купона</h1>
                <div class="body">
                    <form>
                        <div class="inline-input">
                            <input data-placeholder="enter coupon code" type="text" />
                            <button class="le-button" type="submit">Apply</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.widget -->
        </div><!-- /.sidebar -->

        <!-- ========================================= SIDEBAR : END ========================================= -->
    </div>
</section>
@stop
