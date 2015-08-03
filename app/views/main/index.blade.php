@extends('layout', ['meta' => $setting])
{{-- Content --}}

@section('slider')
    @include('main.slider',['kostenko' => 'eeee'])
@stop    

@section('content')
<!-- ============================================================= HEADER : END ============================================================= -->      
 <div id="top-banner-and-menu" class="homepage2">
    <div class="container">
        <div class="col-xs-12">
            <div id="hero">
                <div id="owl-main" class="owl-carousel height-lg owl-inner-nav owl-ui-lg">
                    @foreach(Product::take(5)->skip(0)->active()->orderBy('created_at', 'desc')->get() as $product)
                    <div class="item row">
                        <div class="container-fluid col-xs-12 col-sm-7">
                            <div class="caption vertical-center text-left left" style="padding-left:7%;">
                                <img src='{{asset("uploads/images/product/" . $product->id . "_1_max.png")}}'>
                            </div>
                        </div>
                        <div class="container-fluid col-xs-12 col-sm-5">
                            <div class="caption vertical-center text-left right" style="padding:5% 20% 0 0;">
                                <div class="excerpt fadeInDown-2">
                                    {{ $product->name }}
                                </div>
                                <div class="big-text fadeInDown-1">
                                    <span>{{ $product->currency_id == 1 ?  $product->price : $product->price * Config::get('setting.exchangeRates') }}</span>грн
                                </div>
                                <div class="small fadeInDown-2">
                                    {{ $product->description }}
                                </div>
                                <div class="button-holder fadeInDown-3">
                                    <a href="{{ asset('product/' . $product->link) }}" class="big le-button ">посмотреть</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ========================================= HOME BANNERS ========================================= -->
<!--section id="banner-holder" class="wow fadeInUp">
    <div class="container">
        <div class="col-xs-12 col-lg-6 no-margin banner">
            <a href="category-grid-2">
                <div class="banner-text theblue">
                    <h1>New Life</h1>
                    <span class="tagline">Introducing New Category</span>
                </div>
                <img class="banner-image" alt="" src="{{asset('images/blank.gif')}}" data-echo="{{asset('images/banners/banner-narrow-01.jpg')}}" />
            </a>
        </div>
        <div class="col-xs-12 col-lg-6 no-margin text-right banner">
            <a href="category-grid-2">
                <div class="banner-text right">
                    <h1>Time &amp; Style</h1>
                    <span class="tagline">Checkout new arrivals</span>
                </div>
                <img class="banner-image" alt="" src="{{asset('images/blank.gif')}}" data-echo="{{asset('images/banners/banner-narrow-02.jpg')}}" />
            </a>
        </div>
    </div>
</section--><!-- /#banner-holder -->



<!-- ========================================= TOP BRANDS : END ========================================= -->       <!-- ============================================================= FOOTER ============================================================= -->


<!-- ========================================= HOME BANNERS : END ========================================= -->
<div id="products-tab" class="wow fadeInUp">
    <div class="container">
        <div class="tab-holder">
            <!-- Nav tabs -->
            <!--ul class="nav nav-tabs" >
                <li class="active"><a href="#featured" data-toggle="tab">популярные</a></li>
                <li><a href="#new-arrivals" data-toggle="tab">новые поступления</a></li>
                <li><a href="#top-sales" data-toggle="tab">топ продаж</a></li>
            </ul-->

            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="featured">
                    <div class="product-grid-holder">
                    @foreach(Product::take(4)->skip(0)->active()->orderBy('created_at', 'desc')->get() as $product)
                        <div class="col-sm-4 col-md-3  no-margin product-item-holder hover">
                            <div class="product-item">
                                <!--div class="ribbon red"><span>sale</span></div-->
                                <div class="image">
                                    <img alt="" src="{{asset('images/blank.gif')}}" data-echo="{{ asset("uploads/images/product/" . $product->id . "_1_big.png") }}" />
                                </div>
                                <div class="body">
                                    <!--div class="label-discount green">-50% sale</div-->
                                    <div class="title">
                                        <a href="{{ asset('product/' . $product->link) }}">{{ $product->name }}</a>
                                    </div>
                                </div>
                                <div class="prices">
                                    <!--div class="price-prev"><span>{{ $product->currency_id == 1 ?  $product->price : $product->price * Config::get('setting.exchangeRates') }}</span>грн</div-->
                                    <div class="price-current pull-right"><span>{{ $product->currency_id == 1 ?  $product->price : $product->price * Config::get('setting.exchangeRates') }}</span>грн</div>
                                </div>

                                <div class="hover-area">
                                    <div class="add-cart-button">
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <a href="#" class="le-button">добавить в корзину</a>
                                    </div>
                                    <!--div class="wish-compare">
                                        <a class="btn-add-to-wishlist" href="#">в желания</a>
                                        <a class="btn-add-to-compare" href="#">в сравнение</a>
                                    </div-->
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                    <!--div class="loadmore-holder text-center">
                        <a class="btn-loadmore" href="#">
                            <i class="fa fa-plus"></i>
                           загрузить больше продуктов</a>
                    </div--> 

                </div>
                <div class="tab-pane" id="new-arrivals">
                    <div class="product-grid-holder">
                        
                    @foreach(Product::take(4)->skip(4)->active()->orderBy('created_at', 'desc')->get() as $product)
                        <div class="col-sm-4 col-md-3  no-margin product-item-holder hover">
                            <div class="product-item">
                                <!--div class="ribbon red"><span>sale</span></div-->
                                <div class="image">
                                    <img alt="" src="{{asset('images/blank.gif')}}" data-echo="{{ asset("uploads/images/product/" . $product->id . "_1_big.png") }}" />
                                </div>
                                <div class="body">
                                    <!--div class="label-discount green">-50% sale</div-->
                                    <div class="title">
                                        <a href="{{ asset('product/' . $product->link) }}">{{ $product->name }}</a>
                                    </div>
                                </div>
                                <div class="prices">
                                    <div class="price-prev"><span>{{ $product->currency_id == 1 ?  $product->price : $product->price * Config::get('setting.exchangeRates') }}</span>грн</div>
                                    <div class="price-current pull-right"><span>{{ $product->currency_id == 1 ?  $product->price : $product->price * Config::get('setting.exchangeRates') }}</span>грн</div>
                                </div>

                                <div class="hover-area">
                                    <div class="add-cart-button">
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <a href="#" class="le-button">добавить в корзину</a>
                                    </div>
                                    <!--div class="wish-compare">
                                        <a class="btn-add-to-wishlist" href="#">в желания</a>
                                        <a class="btn-add-to-compare" href="#">в сравнение</a>
                                    </div-->
                                </div>
                            </div>
                        </div>
                    @endforeach

                    </div>
                    <div class="loadmore-holder text-center">
                        <a class="btn-loadmore" href="#">
                            <i class="fa fa-plus"></i>
                           загрузить больше продуктов</a>
                    </div> 

                </div>

                <div class="tab-pane" id="top-sales">
                    <div class="product-grid-holder">

                    @foreach(Product::take(4)->skip(0)->active()->orderBy('created_at', 'asc')->get() as $product)
                        <div class="col-sm-4 col-md-3  no-margin product-item-holder hover">
                            <div class="product-item">
                                <!--div class="ribbon red"><span>sale</span></div-->
                                <div class="image">
                                    <img alt="" src="{{asset('images/blank.gif')}}" data-echo="{{ asset("uploads/images/product/" . $product->id . "_1_big.png") }}" />
                                </div>
                                <div class="body">
                                    <!--div class="label-discount green">-50% sale</div-->
                                    <div class="title">
                                        <a href="{{ asset('product/' . $product->link) }}">{{ $product->name }}</a>
                                    </div>
                                </div>
                                <div class="prices">
                                    <div class="price-prev"><span>{{ $product->currency_id == 1 ?  $product->price : $product->price * Config::get('setting.exchangeRates') }}</span>грн</div>
                                    <div class="price-current pull-right"><span>{{ $product->currency_id == 1 ?  $product->price : $product->price * Config::get('setting.exchangeRates') }}</span>грн</div>
                                </div>

                                <div class="hover-area">
                                    <div class="add-cart-button">
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <a href="#" class="le-button">добавить в корзину</a>
                                    </div>
                                    <!--div class="wish-compare">
                                        <a class="btn-add-to-wishlist" href="#">в желания</a>
                                        <a class="btn-add-to-compare" href="#">в сравнение</a>
                                    </div-->
                                </div>
                            </div>
                        </div>
                    @endforeach

                    </div>
                    <!--div class="loadmore-holder text-center">
                        <a class="btn-loadmore" href="#">
                            <i class="fa fa-plus"></i>
                           загрузить больше продуктов</a>
                    </div--> 
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ========================================= BEST SELLERS ========================================= -->
<section id="bestsellers" class="color-bg wow fadeInUp">
    <div class="container">
        <h1 class="section-title">Рекомендуемые товары</h1>

        <div class="product-grid-holder medium">
            <div class="col-xs-12 col-md-7 no-margin">
                
                <div class="row no-margin">

                    @foreach(Product::take(3)->skip(0)->active()->orderBy('created_at', 'asc')->get() as $product)
                    <div class="col-xs-12 col-sm-4 no-margin product-item-holder size-medium hover">
                        <div class="product-item">
                            <div class="image">
                                <img alt="" src="{{ asset('images/blank.gif') }}" data-echo='{{ asset("uploads/images/product/" . $product->id . "_1_norm.png") }}' />
                            </div>
                            <div class="body">
                                <div class="label-discount clear"></div>
                                <div class="title">
                                    <a href="{{ asset('product/' . $product->link) }}">{{ $product->name }}</a>
                                </div>
                                <!--div class="brand">beats</div-->
                            </div>
                            <div class="prices">

                                <div class="price-current text-right"><span>{{ $product->currency_id == 1 ?  $product->price : $product->price * Config::get('setting.exchangeRates') }}</span>грн</div>
                            </div>
                            <div class="hover-area">
                                <div class="add-cart-button">
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <a href="#" class="le-button">Добавить в корзину</a>
                                </div>
                                <!--div class="wish-compare">
                                    <a class="btn-add-to-wishlist" href="#">в желания</a>
                                    <a class="btn-add-to-compare" href="#">в сравнение</a>
                                </div-->
                            </div>
                        </div>
                    </div><!-- /.product-item-holder -->
                    @endforeach

                </div><!-- /.row -->
                
                <div class="row no-margin">

                    @foreach(Product::take(3)->skip(3)->active()->orderBy('created_at', 'asc')->get() as $product)
                    <div class="col-xs-12 col-sm-4 no-margin product-item-holder size-medium hover">
                        <div class="product-item">
                            <div class="image">
                                <img alt="" src="{{asset('images/blank.gif')}}" data-echo="{{ asset("uploads/images/product/" . $product->id . "_1_norm.png") }}" />
                            </div>
                            <div class="body">
                                <div class="label-discount clear"></div>
                                <div class="title">
                                    <a href="{{ asset('product/' . $product->link) }}">{{ $product->name }}</a>
                                </div>
                            </div>
                            <div class="prices">
                                <div class="price-current text-right"><span>{{ $product->currency_id == 1 ?  $product->price : $product->price * Config::get('setting.exchangeRates') }}</span>грн</div>
                            </div>
                            <div class="hover-area">
                                <div class="add-cart-button">
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <a href="#" class="le-button">Добавить в корзину</a>
                                </div>
                                <!--div class="wish-compare">
                                    <a class="btn-add-to-wishlist" href="#">в желания</a>
                                    <a class="btn-add-to-compare" href="#">в сравнение</a>
                                </div-->
                            </div>
                        </div>
                    </div><!-- /.product-item-holder -->
                    @endforeach

                </div><!-- /.row -->
            </div><!-- /.col -->

            <div class="col-xs-12 col-md-5 no-margin">
                <div class="product-item-holder size-big single-product-gallery small-gallery">
                    <div id="best-seller-single-product-slider" class="single-product-slider owl-carousel">
                        @foreach(explode(',', Product::find(1)->images) as $image)
                        <div class="single-product-gallery-item" id="slide{{ $image }}">
                            <a data-rel="prettyphoto" href='{{ asset("product/" . Product::find(1)->link) }}'>
                                <img alt="" src='{{ asset("uploads/images/product/" . $image . "_max.png") }}' />
                            </a>
                        </div><!-- /.single-product-gallery-item -->
                        @endforeach
                    </div><!-- /.single-product-slider -->

                    <div class="gallery-thumbs clearfix">
                        <ul>
                            @foreach(explode(',', Product::find(1)->images) as $key => $image)
                            <li><a class="horizontal-thumb" data-target="#best-seller-single-product-slider" data-slide="{{ $key }}" href="#slide{{ $image }}"><img alt="" src="{{asset('images/blank.gif')}}" data-echo='{{ asset("uploads/images/product/" . $image . "_thumb.png") }}' /></a></li>
                            @endforeach
                        </ul>
                    </div><!-- /.gallery-thumbs -->

                    <div class="body">
                        <div class="label-discount clear"></div>
                        <div class="title">
                            <a href="{{ asset('product/' . Product::find(1)->link) }}">{{ Product::find(1)->name }}</a>
                        </div>
                        <!--div class="brand">sony</div-->
                    </div>
                    <!--div class="prices">
                        <div class="price-current text-right"><span>{{ Product::find(1)->currency_id == 1 ? Product::find(1)->price : Product::find(1)->price * Config::get('setting.exchangeRates') }}</span>грн</div>
                    </div-->
                    <div class="prices text-right add-cart-button">
                        <div class="price-current inline"><span>{{ Product::find(1)->currency_id == 1 ? Product::find(1)->price : Product::find(1)->price * Config::get('setting.exchangeRates') }}</span>грн</div>
                            <input type="hidden" name="product_id" value="{{ Product::find(1)->id }}">
                            <a href="#" class="le-button big inline">добавить в корзину</a>
                    </div>
                </div><!-- /.product-item-holder -->
            </div><!-- /.col -->


        </div><!-- /.product-grid-holder -->
    </div><!-- /.container -->
</section><!-- /#bestsellers -->
<!-- ========================================= BEST SELLERS : END ========================================= -->
<!-- ========================================= RECENTLY VIEWED ========================================= -->
<section id="recently-reviewd" class="wow fadeInUp">
    <div class="container">
        <div class="carousel-holder hover">
            
            <div class="title-nav">
                <h2 class="h1">Недавно просмотренные</h2>
                <div class="nav-holder">
                    <a href="#prev" data-target="#owl-recently-viewed" class="slider-prev btn-prev fa fa-angle-left"></a>
                    <a href="#next" data-target="#owl-recently-viewed" class="slider-next btn-next fa fa-angle-right"></a>
                </div>
            </div><!-- /.title-nav -->

            <div id="owl-recently-viewed" class="owl-carousel product-grid-holder">
                @foreach(Product::take(10)->skip(0)->active()->orderBy('created_at', 'desc')->get() as $product)
                <div class="no-margin carousel-item product-item-holder size-small hover">
                    <div class="product-item">
                        <!--div class="ribbon red"><span>sale</span></div--> 
                        <div class="image">
                            <img alt="" src="{{asset('images/blank.gif')}}" data-echo='{{ asset("uploads/images/product/" . $product->id . "_1_norm.png") }}' />
                        </div>
                        <div class="body">
                            <div class="title">
                                <a href="{{ asset('product/' . $product->link) }}">{{ $product->name }}</a>
                            </div>
                            <div class="brand">Sharp</div>
                        </div>
                        <div class="prices">
                            <div class="price-current text-right"><span>{{ $product->currency_id == 1 ?  $product->price : $product->price * Config::get('setting.exchangeRates') }}</span>грн</div>
                        </div>
                        <div class="hover-area">
                            <div class="add-cart-button">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <a href="#" class="le-button">Добавить в корзину</a>
                            </div>
                            <!--div class="wish-compare">
                                <a class="btn-add-to-wishlist" href="#">в желания</a>
                                <a class="btn-add-to-compare" href="#">в сравнение</a>
                            </div-->
                        </div>
                    </div><!-- /.product-item -->
                </div><!-- /.product-item-holder -->
                @endforeach

            </div><!-- /#recently-carousel -->

        </div><!-- /.carousel-holder -->
    </div><!-- /.container -->
</section><!-- /#recently-reviewd -->
<!-- ========================================= RECENTLY VIEWED : END ========================================= -->
<!-- ========================================= TOP BRANDS ========================================= -->
<!--section id="top-brands" class="wow fadeInUp">
    <div class="container">
        <div class="carousel-holder" >
            
            <div class="title-nav">
                <h1>Лучшие бренды</h1>
                <div class="nav-holder">
                    <a href="#prev" data-target="#owl-brands" class="slider-prev btn-prev fa fa-angle-left"></a>
                    <a href="#next" data-target="#owl-brands" class="slider-next btn-next fa fa-angle-right"></a>
                </div>
            </div>
            
            <div id="owl-brands" class="owl-carousel brands-carousel">
                
                <div class="carousel-item">
                    <a href="#">
                        <img alt="" src="{{asset('images/brands/brand-01.jpg')}}" />
                    </a>
                </div>
                
                <div class="carousel-item">
                    <a href="#">
                        <img alt="" src="{{asset('images/brands/brand-02.jpg')}}" />
                    </a>
                </div>
                
                <div class="carousel-item">
                    <a href="#">
                        <img alt="" src="{{asset('images/brands/brand-03.jpg')}}" />
                    </a>
                </div>
                
                <div class="carousel-item">
                    <a href="#">
                        <img alt="" src="{{asset('images/brands/brand-04.jpg')}}" />
                    </a>
                </div>

                <div class="carousel-item">
                    <a href="#">
                        <img alt="" src="{{asset('images/brands/brand-01.jpg')}}" />
                    </a>
                </div>

                <div class="carousel-item">
                    <a href="#">
                        <img alt="" src="{{asset('images/brands/brand-02.jpg')}}" />
                    </a>
                </div>

                <div class="carousel-item">
                    <a href="#">
                        <img alt="" src="{{asset('images/brands/brand-03.jpg')}}" />
                    </a>
                </div>

                <div class="carousel-item">
                    <a href="#">
                        <img alt="" src="{{asset('images/brands/brand-04.jpg')}}" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</section-->
@stop
