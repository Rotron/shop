@extends('layout')
@section('title'){{ e($product->title) }}@stop
@section('description'){{ e($product->meta_description) }}@stop
@section('keywords'){{ e($product->meta_keywords) }}@stop
@section('url'){{ Request::url() }}@stop

@section('content')
<div id="single-product">




    <div class="container">

         <div class="no-margin col-xs-12 col-sm-6 col-md-5 gallery-holder">
    <div class="product-item-holder size-big single-product-gallery small-gallery">

        <div id="owl-single-product">
            <div class="single-product-gallery-item" id="slide1">
                <a data-rel="prettyphoto">
                    <img class="img-responsive" alt="" src="{{ asset('/images/blank.gif') }}" data-echo="{{ asset('/uploads/images/product/' . $product->id . '_1_max.png') }}" />
                </a>
            </div>

            <div class="single-product-gallery-item" id="slide2">
                <a data-rel="prettyphoto" href="images/products/product-gallery-01.jpg">
                    <img class="img-responsive" alt="" src="{{ asset('/images/blank.gif') }}" data-echo="{{ asset('/uploads/images/product/' . $product->id . '_2_max.png') }}" />
                </a>
            </div>

            <div class="single-product-gallery-item" id="slide3">
                <a data-rel="prettyphoto" href="images/products/product-gallery-01.jpg">
                    <img class="img-responsive" alt="" src="{{ asset('/images/blank.gif') }}" data-echo="{{ asset('/uploads/images/product/' . $product->id . '_3_max.png') }}" />
                </a>
            </div>
        </div>

        <div class="single-product-gallery-thumbs gallery-thumbs">
            @if ($product->images)
            <div id="owl-single-product-thumbnails">
				@foreach(explode(',', $product->images) as $key => $image)
                <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="0" href="#slide{{ $key }}">
                    <img width="67" height="67" alt="" src="{{ asset('/images/blank.gif') }}" data-echo="{{ asset('/uploads/images/product/' . $image . '_thumb.png') }}" />
                </a>
				@endforeach
            </div>
            @endif
            <div class="nav-holder left hidden-xs">
                <a class="prev-btn slider-prev" data-target="#owl-single-product-thumbnails" href="#prev"></a>
            </div><!-- /.nav-holder -->
            
            <div class="nav-holder right hidden-xs">
                <a class="next-btn slider-next" data-target="#owl-single-product-thumbnails" href="#next"></a>
            </div><!-- /.nav-holder -->

        </div><!-- /.gallery-thumbs -->

    </div><!-- /.single-product-gallery -->
</div><!-- /.gallery-holder -->        
        <div class="no-margin col-xs-12 col-sm-7 body-holder">
    <div class="body">
        <!--div class="star-holder inline"><div class="star" data-score="4"></div></div-->
        <div class="availability"><label>Наличие:</label><span class="available">  на складе</span></div>

        <div class="title"><a>{{ $product->name }}</a></div>
        <!--div class="brand">спутниковое оборудование</div-->

        <div class="social-row">
            <span class="st_facebook_hcount"></span>
            <span class="st_twitter_hcount"></span>
            <span class="st_pinterest_hcount"></span>
        </div>

        <!--div class="buttons-holder">
            <a class="btn-add-to-wishlist" href="#">в желания</a>
            <a class="btn-add-to-compare" href="#">в сравнение</a>
        </div-->

        <div class="excerpt">
            <p>{{ $product->description }}</p>
        </div>
        
        <div class="prices">
            <div class="price-current"><span>{{ $product->currency_id == 1 ?  $product->price : $product->price * Config::get('setting.exchangeRates') }}</span>грн.</div>
            <!--div class="price-prev">{{ $product->price + ($product->price * 0.1) }}грн.</div-->
        </div>

        <div class="qnt-holder add-cart-button">
            <!--div class="le-quantity">
                <form>
                    <a class="minus" href="#reduce"></a>
                    <input name="quantity" readonly="readonly" type="text" value="1" />
                    <a class="plus" href="#add"></a>
                </form>
            </div-->
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            @if(Cart::search(array('id' => (string) $product->id)))
            <img src="{{asset('images/cart.png')}}" alt="" />
            <div class="huge">товар в корзине</div>
            @else
            <a href="#" class="le-button huge">добавить в корзину</a>
            @endif
            <!--a id="addto-cart" href="cart.html" class="le-button huge">add to cart</a-->
        </div><!-- /.qnt-holder -->
    </div><!-- /.body -->

</div><!-- /.body-holder -->
    </div><!-- /.container -->
</div><!-- /.single-product -->

<!-- ========================================= SINGLE PRODUCT TAB ========================================= -->
<section id="single-product-tab">
    <div class="container">
        <div class="tab-holder">
            
            <ul class="nav nav-tabs simple" >
                <li class="active"><a href="#description" data-toggle="tab">Описание</a></li>
                <?php //var_dump($product->package_id)?>
                @if($product->package_id)
                <li><a href="#list-tv-channels" data-toggle="tab">Список телеканалов</a></li>
                @endif
                <!--li><a href="#additional-info" data-toggle="tab">Дополнительная информация</a></li>
                <li><a href="#reviews" data-toggle="tab">Отзывы (3)</a></li-->
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="description">
                    {{ $product->content }}

                    <!--div class="meta-row">
                        <div class="inline">
                            <label>SKU:</label>
                            <span>54687621</span>
                        </div>

                        <span class="seperator">/</span>

                        <div class="inline">
                            <label>categories:</label>
                            <span><a href="#">-50% sale</a>,</span>
                            <span><a href="#">gaming</a>,</span>
                            <span><a href="#">desktop PC</a></span>
                        </div>

                        <span class="seperator">/</span>

                        <div class="inline">
                            <label>tag:</label>
                            <span><a href="#">fast</a>,</span>
                            <span><a href="#">gaming</a>,</span>
                            <span><a href="#">strong</a></span>
                        </div>
                    </div-->
                </div>

                <div class="tab-pane" id="list-tv-channels">
                    <table>
                    @if($product->package_id)
                        @if ($i = 1) @endif
                        <tr>

                        @foreach(TvSatellite::whereIn('id', json_decode(TvPackage::find($product->package_id)->tv_satellites))->get() as $satellite)
                            @foreach(TvTransponder::where('satellite_id', $satellite->id)->get() as $key => $transponder)
                                @foreach(TvChannel::whereIn('id', json_decode($transponder->tv_channels))->get() as $tvChannel)
                                    <td><div><b>{{ $tvChannel->name }}</b></div><img src="/uploads/images/tv/logo/{{ $tvChannel->id }}.png"></td>
                                    @if ($i % 4 === 0)
                                        </tr><tr id="{{ $i }}">
                                    @endif
                                    @if ($i++) @endif
                                @endforeach
                            @endforeach
                        @endforeach

                        @foreach(TvPackage::whereIn('id', json_decode(TvPackage::find($product->package_id)->tv_packages))->get() as $package)
                            @foreach(TvSatellite::whereIn('id', json_decode(TvPackage::find($package->id)->tv_satellites))->get() as $satellite)
                                @foreach(TvTransponder::where('satellite_id', $satellite->id)->get() as $key => $transponder)
                                    @foreach(TvChannel::whereIn('id', json_decode($transponder->tv_channels))->get() as $tvChannel)
                                        <td><div><b>{{ $tvChannel->name }}</b></div><img src="/uploads/images/tv/logo/{{ $tvChannel->id }}.png"></td>
                                        @if ($i % 4 === 0)
                                            </tr><tr id="{{ $i }}">
                                        @endif
                                        @if ($i++) @endif
                                    @endforeach
                                @endforeach
                            @endforeach
                        @endforeach

                        @foreach(TvPackage::whereIn('id', json_decode(TvPackage::find($product->package_id)->tv_packages))->get() as $package)
                            @foreach(TvChannel::whereIn('id', json_decode(TvPackage::find($package->id)->tv_channels))->get() as $tvChannel)
                                <td><div><b>{{ $tvChannel->name }}</b></div><img src="/uploads/images/tv/logo/{{ $tvChannel->id }}.png"></td>
                                @if ($i % 4 === 0)
                                    </tr><tr id="{{ $i }}">
                                @endif
                                @if ($i++) @endif
                            @endforeach
                        @endforeach

                        @foreach(TvChannel::whereIn('id', json_decode(TvPackage::find($product->package_id)->tv_channels))->get() as $tvChannel)
                            <td><div><b>{{ $tvChannel->name }}</b></div><img src="/uploads/images/tv/logo/{{ $tvChannel->id }}.png"></td>
                            @if ($i % 4 === 0)
                                </tr><tr id="{{ $i }}">
                            @endif
                            @if ($i++) @endif
                        @endforeach

                        </tr>
                    @endif
                    </table>
                    <style type="text/css">
                        table{
                            border-collapse:collapse;
                            border-color:rgb(204,204,204);
                            text-align:center;
                        }
                        td{border:1px solid #E0E0E0; border-color:rgb(204,204,204); border-style:solid;height: 137px; width: 300px;}
                        .header{height: 40px; vertical-align: bottom;}
                        .header h3{text-align:center;display: block;padding: 10px 0 5px 0;}

                    </style>

                </div><!-- /.tab-pane #additional-info -->

                <div class="tab-pane" id="additional-info">
                    <ul class="tabled-data">
                        <li>
                            <label>weight</label>
                            <div class="value">7.25 kg</div>
                        </li>
                        <li>
                            <label>dimensions</label>
                            <div class="value">90x60x90 cm</div>
                        </li>
                        <li>
                            <label>size</label>
                            <div class="value">one size fits all</div>
                        </li>
                        <li>
                            <label>color</label>
                            <div class="value">white</div>
                        </li>
                        <li>
                            <label>guarantee</label>
                            <div class="value">5 years</div>
                        </li>
                    </ul><!-- /.tabled-data -->

                    <div class="meta-row">
                        <div class="inline">
                            <label>SKU:</label>
                            <span>54687621</span>
                        </div><!-- /.inline -->

                        <span class="seperator">/</span>

                        <div class="inline">
                            <label>categories:</label>
                            <span><a href="#">-50% sale</a>,</span>
                            <span><a href="#">gaming</a>,</span>
                            <span><a href="#">desktop PC</a></span>
                        </div><!-- /.inline -->

                        <span class="seperator">/</span>

                        <div class="inline">
                            <label>tag:</label>
                            <span><a href="#">fast</a>,</span>
                            <span><a href="#">gaming</a>,</span>
                            <span><a href="#">strong</a></span>
                        </div><!-- /.inline -->
                    </div><!-- /.meta-row -->
                </div><!-- /.tab-pane #additional-info -->

                <div class="tab-pane" id="reviews">
                    <div class="comments">
                        <div class="comment-item">
                            <div class="row no-margin">
                                <div class="col-lg-1 col-xs-12 col-sm-2 no-margin">
                                    <div class="avatar">
                                        <img alt="avatar" src="assets/images/default-avatar.jpg">
                                    </div><!-- /.avatar -->
                                </div><!-- /.col -->

                                <div class="col-xs-12 col-lg-11 col-sm-10 no-margin">
                                    <div class="comment-body">
                                        <div class="meta-info">
                                            <div class="author inline">
                                                <a href="#" class="bold">John Smith</a>
                                            </div>
                                            <div class="star-holder inline">
                                                <div class="star" data-score="4"></div>
                                            </div>
                                            <div class="date inline pull-right">
                                                12.07.2013
                                            </div>
                                        </div><!-- /.meta-info -->
                                        <p class="comment-text">
                                            Integer id purus ultricies nunc tincidunt congue vitae nec felis. Vivamus sit amet nisl convallis, faucibus risus in, suscipit sapien. Vestibulum egestas interdum tellus id venenatis. 
                                        </p><!-- /.comment-text -->
                                    </div><!-- /.comment-body -->

                                </div><!-- /.col -->

                            </div><!-- /.row -->
                        </div><!-- /.comment-item -->

                        <div class="comment-item">
                            <div class="row no-margin">
                                <div class="col-lg-1 col-xs-12 col-sm-2 no-margin">
                                    <div class="avatar">
                                        <img alt="avatar" src="assets/images/default-avatar.jpg">
                                    </div><!-- /.avatar -->
                                </div><!-- /.col -->

                                <div class="col-xs-12 col-lg-11 col-sm-10 no-margin">
                                    <div class="comment-body">
                                        <div class="meta-info">
                                            <div class="author inline">
                                                <a href="#" class="bold">Jane Smith</a>
                                            </div>
                                            <div class="star-holder inline">
                                                <div class="star" data-score="5"></div>
                                            </div>
                                            <div class="date inline pull-right">
                                                12.07.2013
                                            </div>
                                        </div><!-- /.meta-info -->
                                        <p class="comment-text">
                                            Integer id purus ultricies nunc tincidunt congue vitae nec felis. Vivamus sit amet nisl convallis, faucibus risus in, suscipit sapien. Vestibulum egestas interdum tellus id venenatis. 
                                        </p><!-- /.comment-text -->
                                    </div><!-- /.comment-body -->

                                </div><!-- /.col -->

                            </div><!-- /.row -->
                        </div><!-- /.comment-item -->

                        <div class="comment-item">
                            <div class="row no-margin">
                                <div class="col-lg-1 col-xs-12 col-sm-2 no-margin">
                                    <div class="avatar">
                                        <img alt="avatar" src="assets/images/default-avatar.jpg">
                                    </div><!-- /.avatar -->
                                </div><!-- /.col -->

                                <div class="col-xs-12 col-lg-11 col-sm-10 no-margin">
                                    <div class="comment-body">
                                        <div class="meta-info">
                                            <div class="author inline">
                                                <a href="#" class="bold">John Doe</a>
                                            </div>
                                            <div class="star-holder inline">
                                                <div class="star" data-score="3"></div>
                                            </div>
                                            <div class="date inline pull-right">
                                                12.07.2013
                                            </div>
                                        </div><!-- /.meta-info -->
                                        <p class="comment-text">
                                            Integer id purus ultricies nunc tincidunt congue vitae nec felis. Vivamus sit amet nisl convallis, faucibus risus in, suscipit sapien. Vestibulum egestas interdum tellus id venenatis. 
                                        </p><!-- /.comment-text -->
                                    </div><!-- /.comment-body -->

                                </div><!-- /.col -->

                            </div><!-- /.row -->
                        </div><!-- /.comment-item -->
                    </div><!-- /.comments -->

                    <div class="add-review row">
                        <div class="col-sm-8 col-xs-12">
                            <div class="new-review-form">
                                <h2>Add review</h2>
                                <form id="contact-form" class="contact-form" method="post" >
                                    <div class="row field-row">
                                        <div class="col-xs-12 col-sm-6">
                                            <label>name*</label>
                                            <input class="le-input" >
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <label>email*</label>
                                            <input class="le-input" >
                                        </div>
                                    </div><!-- /.field-row -->
                                    
                                    <div class="field-row star-row">
                                        <label>your rating</label>
                                        <div class="star-holder">
                                            <div class="star big" data-score="0"></div>
                                        </div>
                                    </div><!-- /.field-row -->

                                    <div class="field-row">
                                        <label>your review</label>
                                        <textarea rows="8" class="le-input"></textarea>
                                    </div><!-- /.field-row -->

                                    <div class="buttons-holder">
                                        <button type="submit" class="le-button huge">submit</button>
                                    </div><!-- /.buttons-holder -->
                                </form><!-- /.contact-form -->
                            </div><!-- /.new-review-form -->
                        </div><!-- /.col -->
                    </div><!-- /.add-review -->

                </div><!-- /.tab-pane #reviews -->
            </div><!-- /.tab-content -->

        </div><!-- /.tab-holder -->
    </div><!-- /.container -->
</section><!-- /#single-product-tab -->
<!-- ========================================= SINGLE PRODUCT TAB : END ========================================= -->
<!-- ========================================= RECENTLY VIEWED ========================================= -->
<!--section id="recently-reviewd" class="wow fadeInUp">
	<div class="container">
		<div class="carousel-holder hover">
			
			<div class="title-nav">
				<h2 class="h1">Recently Viewed</h2>
				<div class="nav-holder">
					<a href="#prev" data-target="#owl-recently-viewed" class="slider-prev btn-prev fa fa-angle-left"></a>
					<a href="#next" data-target="#owl-recently-viewed" class="slider-next btn-next fa fa-angle-right"></a>
				</div>
			</div>

			<div id="owl-recently-viewed" class="owl-carousel product-grid-holder">
				<div class="no-margin carousel-item product-item-holder size-small hover">
					<div class="product-item">
						<div class="ribbon red"><span>sale</span></div> 
						<div class="image">
							<img alt="" src="{{ asset('/images/blank.gif') }}" data-echo="assets/images/products/product-11.jpg" />
						</div>
						<div class="body">
							<div class="title">
								<a href="single-product.html">LC-70UD1U 70" class aquos 4K ultra HD</a>
							</div>
							<div class="brand">Sharp</div>
						</div>
						<div class="prices">
							<div class="price-current text-right">$1199.00</div>
						</div>
						<div class="hover-area">
							<div class="add-cart-button">
								<a href="single-product.html" class="le-button">Add to Cart</a>
							</div>
							<div class="wish-compare">
								<a class="btn-add-to-wishlist" href="#">Add to Wishlist</a>
								<a class="btn-add-to-compare" href="#">Compare</a>
							</div>
						</div>
					</div>
				</div>

				<div class="no-margin carousel-item product-item-holder size-small hover">
					<div class="product-item">
						<div class="ribbon blue"><span>new!</span></div> 
						<div class="image">
							<img alt="" src="{{ asset('/images/blank.gif') }}" data-echo="assets/images/products/product-12.jpg" />
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
								<a href="single-product.html" class="le-button">Add to cart</a>
							</div>
							<div class="wish-compare">
								<a class="btn-add-to-wishlist" href="#">Add to Wishlist</a>
								<a class="btn-add-to-compare" href="#">Compare</a>
							</div>
						</div>
					</div>
				</div>

				<div class=" no-margin carousel-item product-item-holder size-small hover">
					<div class="product-item">

						<div class="image">
							<img alt="" src="{{ asset('/images/blank.gif') }}" data-echo="assets/images/products/product-13.jpg" />
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
								<a href="single-product.html" class="le-button">Add to cart</a>
							</div>
							<div class="wish-compare">
								<a class="btn-add-to-wishlist" href="#">Add to Wishlist</a>
								<a class="btn-add-to-compare" href="#">Compare</a>
							</div>
						</div>
					</div>
				</div>

				<div class=" no-margin carousel-item product-item-holder size-small hover">
					<div class="product-item">
						<div class="ribbon blue"><span>new!</span></div> 
						<div class="image">
							<img alt="" src="{{ asset('/images/blank.gif') }}" data-echo="assets/images/products/product-14.jpg" />
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
								<a href="single-product.html" class="le-button">Add to cart</a>
							</div>
							<div class="wish-compare">
								<a class="btn-add-to-wishlist" href="#">Add to Wishlist</a>
								<a class="btn-add-to-compare" href="#">Compare</a>
							</div>
						</div>
					</div>
				</div>

				<div class=" no-margin carousel-item product-item-holder size-small hover">
					<div class="product-item">
						<div class="ribbon green"><span>bestseller</span></div> 
						<div class="image">
							<img alt="" src="{{ asset('/images/blank.gif') }}" data-echo="assets/images/products/product-15.jpg" />
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
								<a href="single-product.html" class="le-button">Add to cart</a>
							</div>
							<div class="wish-compare">
								<a class="btn-add-to-wishlist" href="#">Add to Wishlist</a>
								<a class="btn-add-to-compare" href="#">Compare</a>
							</div>
						</div>
					</div>
				</div>

				<div class=" no-margin carousel-item product-item-holder size-small hover">
					<div class="product-item">

						<div class="image">
							<img alt="" src="{{ asset('/images/blank.gif') }}" data-echo="assets/images/products/product-16.jpg" />
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
								<a href="single-product.html" class="le-button">Add to cart</a>
							</div>
							<div class="wish-compare">
								<a class="btn-add-to-wishlist" href="#">Add to Wishlist</a>
								<a class="btn-add-to-compare" href="#">Compare</a>
							</div>
						</div>
					</div>
				</div>

				<div class=" no-margin carousel-item product-item-holder size-small hover">
					<div class="product-item">

						<div class="image">
							<img alt="" src="{{ asset('/images/blank.gif') }}" data-echo="assets/images/products/product-13.jpg" />
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
								<a href="single-product.html" class="le-button">Add to cart</a>
							</div>
							<div class="wish-compare">
								<a class="btn-add-to-wishlist" href="#">Add to Wishlist</a>
								<a class="btn-add-to-compare" href="#">Compare</a>
							</div>
						</div>
					</div>
				</div>

				<div class=" no-margin carousel-item product-item-holder size-small hover">
					<div class="product-item">
						<div class="ribbon blue"><span>new!</span></div> 
						<div class="image">
							<img alt="" src="{{ asset('/images/blank.gif') }}" data-echo="assets/images/products/product-14.jpg" />
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
								<a href="single-product.html" class="le-button">Add to cart</a>
							</div>
							<div class="wish-compare">
								<a class="btn-add-to-wishlist" href="#">Add to Wishlist</a>
								<a class="btn-add-to-compare" href="#">Compare</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section-->
@stop