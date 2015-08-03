@extends('layout')
{{-- Content --}}

@section('content')
<section id="category-grid">
    <div class="container">
        
        <!-- ========================================= SIDEBAR ========================================= -->
        <div class="col-xs-12 col-sm-3 no-margin sidebar narrow">

            <!-- ========================================= PRODUCT FILTER ========================================= -->
<!--div class="widget">
    <h1>Фильтр</h1>
    <div class="body bordered">
        
        <div class="category-filter">
            <h2>Brands</h2>
            <hr>
            <ul>
                <li><input checked="checked" class="le-checkbox" type="checkbox"  /> <label>Samsung</label> <span class="pull-right">(2)</span></li>
                <li><input  class="le-checkbox" type="checkbox" /> <label>Dell</label> <span class="pull-right">(8)</span></li>
                <li><input  class="le-checkbox" type="checkbox" /> <label>Toshiba</label> <span class="pull-right">(1)</span></li>
                <li><input  class="le-checkbox" type="checkbox" /> <label>Apple</label> <span class="pull-right">(5)</span></li>
            </ul>
        </div>
        
        <div class="price-filter">
            <h2>Цена</h2>
            <hr>
            <div class="price-range-holder">

                <input type="text" class="price-slider" value="" >

                <span class="min-max">
                    Price: 10грн - 10000грн
                </span>
                <span class="filter-button">
                    <a href="#">Применить</a>
                </span>
            </div>
        </div>

    </div>
</div-->
<!-- ========================================= PRODUCT FILTER : END ========================================= -->
<!--div class="widget">
    <h1 class="border">special offers</h1>
    <ul class="product-list">
        <li>
            <div class="row">
                <div class="col-xs-4 col-sm-4 no-margin">
                    <a href="#" class="thumb-holder">
                        <img alt="" src="assets/images/blank.gif" data-echo="assets/images/products/product-small-01.jpg" />
                    </a>
                </div>
                <div class="col-xs-8 col-sm-8 no-margin">
                    <a href="#">Netbook Acer </a>
                    <div class="price">
                        <div class="price-prev">$2000</div>
                        <div class="price-current">$1873</div>
                    </div>
                </div>  
            </div>
        </li>

        <li>
            <div class="row">
                <div class="col-xs-4 col-sm-4 no-margin">
                    <a href="#" class="thumb-holder">
                        <img alt="" src="assets/images/blank.gif" data-echo="assets/images/products/product-small-02.jpg" />
                    </a>
                </div>
                <div class="col-xs-8 col-sm-8 no-margin">
                    <a href="#">PowerShot Elph 115 16MP Digital Camera</a>
                    <div class="price">
                        <div class="price-prev">$2000</div>
                        <div class="price-current">$1873</div>
                    </div>
                </div>  
            </div>
        </li>

        <li>
            <div class="row">
                <div class="col-xs-4 col-sm-4 no-margin">
                    <a href="#" class="thumb-holder">
                        <img alt="" src="assets/images/blank.gif" data-echo="assets/images/products/product-small-03.jpg" />
                    </a>
                </div>
                <div class="col-xs-8 col-sm-8 no-margin">
                    <a href="#">PowerShot Elph 115 16MP Digital Camera</a>
                    <div class="price">
                        <div class="price-prev">$2000</div>
                        <div class="price-current">$1873</div>
                    </div>
                </div>  
            </div>
        </li>

        <li>
            <div class="row">
                <div class="col-xs-4 col-sm-4 no-margin">
                    <a href="#" class="thumb-holder">
                        <img alt="" src="assets/images/blank.gif" data-echo="assets/images/products/product-small-01.jpg" />
                    </a>
                </div>
                <div class="col-xs-8 col-sm-8 no-margin">
                    <a href="#">Netbook Acer</a>
                    <div class="price">
                        <div class="price-prev">$2000</div>
                        <div class="price-current">$1873</div>
                    </div>
                </div>  
            </div>
        </li>
        
        <li>
            <div class="row">
                <div class="col-xs-4 col-sm-4 no-margin">
                    <a href="#" class="thumb-holder">
                        <img alt="" src="assets/images/blank.gif" data-echo="assets/images/products/product-small-02.jpg" />
                    </a>
                </div>
                <div class="col-xs-8 col-sm-8 no-margin">
                    <a href="#">PowerShot Elph 115 16MP Digital Camera</a>
                        <div class="price">
                            <div class="price-prev">$2000</div>
                            <div class="price-current">$1873</div>
                        </div>
                </div>  
            </div>
        </li>
    </ul>
</div->
<div class="widget">
    <div class="simple-banner">
        <a href="#"><img alt="" class="img-responsive" src="assets/images/blank.gif" data-echo="assets/images/banner/banner-simple.jpg" /></a>
    </div>
</div>
            <!-- ========================================= FEATURED PRODUCTS ========================================= -->
<div class="widget">
    <h1 class="border">Топ продаж</h1>
    <ul class="product-list">
        @foreach(Product::where('id', '>=', 1)->take(7)->get() as $product)
        <li class="sidebar-product-list-item">
            <div class="row">
                <div class="col-xs-4 col-sm-4 no-margin">
                    <a href="{{ asset('/product/' . $product->link) }}" class="thumb-holder">
                        <img alt="" src="assets/images/blank.gif" data-echo='{{ asset("uploads/images/product/" . $product->id . "_1_thumb.png") }}'/>
                    </a>
                </div>
                <div class="col-xs-8 col-sm-8 no-margin">
                    <a href="{{ asset('/product/' . $product->link) }}">{{ $product->name }} </a>
                    <div class="price">
                        <div class="price-prev"></div>
                        <div class="price-current">{{ $product->currency_id == 1 ?  $product->price : $product->price * Config::get('setting.exchangeRates') }}грн.</div>
                    </div>
                </div>  
            </div>
        </li>
        @endforeach
    </ul>
</div>
<!-- ========================================= FEATURED PRODUCTS : END ========================================= -->
        </div>
        <!-- ========================================= SIDEBAR : END ========================================= -->

        <!-- ========================================= CONTENT ========================================= -->

        <div class="col-xs-12 col-sm-9 no-margin wide sidebar">

            <section id="recommended-products" class="carousel-holder hover small">

    <!--div class="title-nav">
        <h2 class="inverse">Recommended Products</h2>
        <div class="nav-holder">
            <a href="#prev" data-target="#owl-recommended-products" class="slider-prev btn-prev fa fa-angle-left"></a>
            <a href="#next" data-target="#owl-recommended-products" class="slider-next btn-next fa fa-angle-right"></a>
        </div>
    </div>

    <div id="owl-recommended-products" class="owl-carousel product-grid-holder">
        <div class="no-margin carousel-item product-item-holder hover size-medium">
            <div class="product-item">
                <div class="ribbon red"><span>sale</span></div> 
                <div class="image">
                    <img alt="" src="assets/images/blank.gif" data-echo="assets/images/products/product-11.jpg" />
                </div>
                <div class="body">
                    <div class="title">
                        <a href="single-product.html">LC-70UD1U 70" class aquos 4K ultra HD</a>
                    </div>
                    <div class="brand">sharp</div>
                </div>
                <div class="prices">
                    <div class="price-current text-right">$1199.00</div>
                </div>
                <div class="hover-area">
                    <div class="add-cart-button">
                        <a href="single-product.html" class="le-button">add to cart</a>
                    </div>
                    <div class="wish-compare">
                        <a class="btn-add-to-wishlist" href="#">add to wishlist</a>
                        <a class="btn-add-to-compare" href="#">compare</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="no-margin carousel-item product-item-holder hover size-medium">
            <div class="product-item">
                <div class="ribbon blue"><span>new!</span></div> 
                <div class="image">
                    <img alt="" src="assets/images/blank.gif" data-echo="assets/images/products/product-12.jpg" />
                </div>
                <div class="body">
                    <div class="title">
                        <a href="single-product.html">cinemizer OLED 3D virtual reality TV Video</a>
                    </div>
                    <div class="brand">zeiss</div>
                </div>
                <div class="prices">

                    <div class="price-current text-right">$1199.00</div>
                </div>
                <div class="hover-area">
                    <div class="add-cart-button">
                        <a href="single-product.html" class="le-button">add to cart</a>
                    </div>
                    <div class="wish-compare">
                        <a class="btn-add-to-wishlist" href="#">add to wishlist</a>
                        <a class="btn-add-to-compare" href="#">compare</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="no-margin carousel-item product-item-holder hover size-medium">
            <div class="product-item">
                <div class="image">
                    <img alt="" src="assets/images/blank.gif" data-echo="assets/images/products/product-13.jpg" />
                </div>
                <div class="body">
                    <div class="title">
                        <a href="single-product.html">s2340T23" full HD multi-Touch Monitor</a>
                    </div>
                    <div class="brand">dell</div>
                </div>
                <div class="prices">
                    <div class="price-current text-right">$1199.00</div>
                </div>
                <div class="hover-area">
                    <div class="add-cart-button">
                        <a href="single-product.html" class="le-button">add to cart</a>
                    </div>
                    <div class="wish-compare">
                        <a class="btn-add-to-wishlist" href="#">add to wishlist</a>
                        <a class="btn-add-to-compare" href="#">compare</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="no-margin carousel-item product-item-holder hover size-medium">
            <div class="product-item">
                <div class="ribbon blue"><span>new!</span></div> 
                <div class="image">
                    <img alt="" src="assets/images/blank.gif" data-echo="assets/images/products/product-14.jpg" />
                </div>
                <div class="body">
                    <div class="title">
                        <a href="single-product.html">kardon BDS 7772/120 integrated 3D</a>
                    </div>
                    <div class="brand">harman</div>
                </div>
                <div class="prices">
                    <div class="price-current text-right">$1199.00</div>
                </div>
                <div class="hover-area">
                    <div class="add-cart-button">
                        <a href="single-product.html" class="le-button">add to cart</a>
                    </div>
                    <div class="wish-compare">
                        <a class="btn-add-to-wishlist" href="#">add to wishlist</a>
                        <a class="btn-add-to-compare" href="#">compare</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="no-margin carousel-item product-item-holder hover size-medium">
            <div class="product-item">
                <div class="ribbon green"><span>bestseller</span></div> 
                <div class="image">
                    <img alt="" src="assets/images/blank.gif" data-echo="assets/images/products/product-15.jpg" />
                </div>
                <div class="body">
                    <div class="title">
                        <a href="single-product.html">netbook acer travel B113-E-10072</a>
                    </div>
                    <div class="brand">acer</div>
                </div>
                <div class="prices">
                    <div class="price-current text-right">$1199.00</div>
                </div>
                <div class="hover-area">
                    <div class="add-cart-button">
                        <a href="single-product.html" class="le-button">add to cart</a>
                    </div>
                    <div class="wish-compare">
                        <a class="btn-add-to-wishlist" href="#">add to wishlist</a>
                        <a class="btn-add-to-compare" href="#">compare</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="no-margin carousel-item product-item-holder hover size-medium">
            <div class="product-item">
                <div class="image">
                    <img alt="" src="assets/images/blank.gif" data-echo="assets/images/products/product-16.jpg" />
                </div>
                <div class="body">
                    <div class="title">
                        <a href="single-product.html">iPod touch 5th generation,64GB, blue</a>
                    </div>
                    <div class="brand">apple</div>
                </div>
                <div class="prices">
                    <div class="price-current text-right">$1199.00</div>
                </div>
                <div class="hover-area">
                    <div class="add-cart-button">
                        <a href="single-product.html" class="le-button">add to cart</a>
                    </div>
                    <div class="wish-compare">
                        <a class="btn-add-to-wishlist" href="#">add to wishlist</a>
                        <a class="btn-add-to-compare" href="#">compare</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="no-margin carousel-item product-item-holder hover size-medium">
            <div class="product-item">
                <div class="image">
                    <img alt="" src="assets/images/blank.gif" data-echo="assets/images/products/product-13.jpg" />
                </div>
                <div class="body">
                    <div class="title">
                        <a href="single-product.html">s2340T23" full HD multi-Touch Monitor</a>
                    </div>
                    <div class="brand">dell</div>
                </div>
                <div class="prices">
                    <div class="price-current text-right">$1199.00</div>
                </div>
                <div class="hover-area">
                    <div class="add-cart-button">
                        <a href="single-product.html" class="le-button">add to cart</a>
                    </div>
                    <div class="wish-compare">
                        <a class="btn-add-to-wishlist" href="#">add to wishlist</a>
                        <a class="btn-add-to-compare" href="#">compare</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="no-margin carousel-item product-item-holder hover size-medium">
            <div class="product-item">
                <div class="ribbon blue"><span>new!</span></div> 
                <div class="image">
                    <img alt="" src="assets/images/blank.gif" data-echo="assets/images/products/product-14.jpg" />
                </div>
                <div class="body">

                    <div class="title">
                        <a href="single-product.html">kardon BDS 7772/120 integrated 3D</a>
                    </div>
                    <div class="brand">harman</div>
                </div>
                <div class="prices">

                    <div class="price-current text-right">$1199.00</div>
                </div>
                <div class="hover-area">
                    <div class="add-cart-button">
                        <a href="single-product.html" class="le-button">add to cart</a>
                    </div>
                    <div class="wish-compare">
                        <a class="btn-add-to-wishlist" href="#">add to wishlist</a>
                        <a class="btn-add-to-compare" href="#">compare</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section-->        
<section id="gaming">
    <div class="grid-list-products">
        @if($text)
        <h2 class="section-title">«{{ $text }}»</h2>
                                      
        <div class="tab-content">
            <div id="list-view" class="products-grid fade tab-pane in active">
                <div class="products-list">
                @if (!empty($products))
                    @foreach($products  as $product)
                    <div class="product-item product-item-holder">
                        <!--div class="ribbon red"><span>sale</span></div> 
                        <div class="ribbon blue"><span>new!</span></div-->
                        <div class="row">
                            <div class="no-margin col-xs-12 col-sm-4 image-holder">
                                <div class="image">
                                    <img alt="" src="{{ asset('images/blank.gif') }}" data-echo='{{ asset("uploads/images/product/" . $product->id . "_1_big.png") }}' />
                                </div>
                            </div><!-- /.image-holder -->
                            <div class="no-margin col-xs-12 col-sm-5 body-holder">
                                <div class="body">
                                    <!--div class="label-discount green">-50% sale</div-->
                                    <div class="title">
                                        <a href='{{ asset("product/$product->link") }}'>{{ $product->name }}</a>
                                    </div>
                                    <!--div class="brand">sony</div-->
                                    <div class="excerpt">
                                        {{ $product->description }}
                                    </div>
                                    <div class="addto-compare">
                                        <!--a class="btn-add-to-compare" href="#">add to compare list</a-->
                                    </div>
                                </div>
                            </div><!-- /.body-holder -->
                            <div class="no-margin col-xs-12 col-sm-3 price-area">
                                <div class="right-clmn add-cart-button">
                                    <div class="price-current"><span>{{ $product->currency_id == 1 ?  $product->price : $product->price * Config::get('setting.exchangeRates') }}</span>грн</div>
                                    <div class="price-prev"></div>
                                    <!--div class="availability"><label>availability:</label><span class="available">  in stock</span></div-->
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <a class="le-button" href="#">в корзину</a>
                                    <!--a class="btn-add-to-wishlist" href="#">add to wishlist</a-->
                                </div>
                            </div><!-- /.price-area -->
                        </div><!-- /.row -->
                    </div><!-- /.product-item -->
                    @endforeach
                @else
                    <h1>Ничего не найдено</h1>
                @endif
                </div><!-- /.products-list -->

                <!--div class="pagination-holder">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <ul class="pagination">
                                <li class="current"><a  href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">next</a></li>
                            </ul>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="result-counter">
                                Showing <span>1-9</span> of <span>11</span> results
                            </div>
                        </div>
                    </div>
                </div-->

            </div><!-- /.products-grid #list-view -->

        </div><!-- /.tab-content -->
        @else
        <h1>Задайте поисковый запрос</h1>
        @endif
    </div><!-- /.grid-list-products -->

</section><!-- /#gaming -->            
        </div><!-- /.col -->
        <!-- ========================================= CONTENT : END ========================================= -->    
    </div><!-- /.container -->
</section><!-- /#category-grid -->
@stop