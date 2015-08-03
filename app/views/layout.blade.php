<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta -->
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta name="description" content="@yield('description', Config::get('setting.description'))">
        <meta name="author" content="@yield('author', Config::get('setting.author'))">
        <meta name="keywords" content="@yield('keywords', Config::get('setting.keywords'))">
        <meta property="og:title" content="@yield('title', Config::get('setting.title'))" />
        <meta property="og:description" content="@yield('description', Config::get('setting.description'))" />
        <meta property="og:url" content="@yield('url', Request::url())" />
        <meta name="robots" content="all">
        <title>@yield('title', Config::get('setting.title'))</title>

        {{ HTML::style('css/bootstrap.min.css') }}
        {{ HTML::style('css/bootstrap-theme.min.css') }}

        {{ HTML::style('css/main.css') }}
        {{ HTML::style('css/blue.css') }}
        {{ HTML::style('css/owl.carousel.css') }}
        {{ HTML::style('css/owl.transitions.css') }}
        {{ HTML::style('css/animate.min.css') }}
        {{ HTML::style('css/style.css') }}

        <!-- Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800' rel='stylesheet' type='text/css'>
        
        <!-- Icons/Glyphs -->
        {{ HTML::style('css/font-awesome.min.css') }}
        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

        {{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js') }}
        {{ HTML::script('js/bootstrap.min.js') }}

        {{ HTML::script('http://maps.google.com/maps/api/js?sensor=false&amp;language=en') }}

        {{ HTML::script('js/gmap3.min.js') }}
        {{ HTML::script('js/bootstrap-hover-dropdown.min.js') }}
        {{ HTML::script('js/owl.carousel.min.js') }}
        {{ HTML::script('js/css_browser_selector.min.js') }}
        {{ HTML::script('js/echo.min.js') }}
        {{ HTML::script('js/jquery.easing-1.3.min.js') }}
        {{ HTML::script('js/bootstrap-slider.min.js') }}
        {{ HTML::script('js/jquery.raty.min.js') }}
        {{ HTML::script('js/jquery.prettyPhoto.min.js') }}
        {{ HTML::script('js/jquery.customSelect.min.js') }}
        {{ HTML::script('js/wow.min.js') }}
        {{ HTML::script('/backend/js/plugins/bootstrap-confirm/bootbox.min.js') }}
        {{ HTML::script('js/jquery.validate.js') }}
        {{ HTML::script('js/scripts.js') }}

        <!-- HTML5 elements and media queries Support for IE8 : HTML5 shim and Respond.js -->
        <!--[if lt IE 9]>
            <script src="{{asset('js/html5shiv.js')}}"></script>
            <script src="{{asset('js/respond.min.js')}}"></script>
        <![endif]-->
    </head>
<body>
    
    <div class="wrapper">
        <!-- ============================================================= TOP NAVIGATION ============================================================= -->
<nav class="top-bar animate-dropdown">
    <div class="container">
        <div class="col-xs-12 col-sm-8 no-margin">
            <ul>
                <li><a href="/">Главная</a></li>
                <!--li class="dropdown">
                    <a class="dropdown-toggle"  data-toggle="dropdown" href="#change-colors">Change Colors</a>

                    <ul class="dropdown-menu" role="menu" >
                        <li role="presentation"><a role="menuitem" class="changecolor green-text" tabindex="-1" href="#" title="Green color">Green</a></li>
                        <li role="presentation"><a role="menuitem" class="changecolor blue-text" tabindex="-1" href="#" title="Blue color">Blue</a></li>
                        <li role="presentation"><a role="menuitem" class="changecolor red-text" tabindex="-1" href="#" title="Red color">Red</a></li>
                        <li role="presentation"><a role="menuitem" class="changecolor orange-text" tabindex="-1" href="#" title="Orange color">Orange</a></li>
                        <li role="presentation"><a role="menuitem" class="changecolor navy-text" tabindex="-1" href="#" title="Navy color">Navy</a></li>
                        <li role="presentation"><a role="menuitem" class="changecolor dark-green-text" tabindex="-1" href="#" title="Darkgreen color">Dark Green</a></li>
                    </ul>
                </li-->
                <li><a href="{{ asset('blog') }}">Блог</a></li>
                <!--li><a href="{{asset('faq')}}">Вопросы и ответы</a></li-->
                <!--li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#pages">Pages</a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="index.html">Главная</a></li>
                        <li><a href="index-2.html">Главная Alt</a></li>
                        <li><a href="category-grid.html">Category - Grid/List</a></li>
                        <li><a href="category-grid-2.html">Category 2 - Grid/List</a></li>
                        <li><a href="single-product.html">Single Product</a></li>
                        <li><a href="single-product-sidebar.html">Single Product with Sidebar</a></li>
                        <li><a href="cart.html">Shopping Cart</a></li>
                        <li><a href="checkout.html">Checkout</a></li>
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                        <li><a href="blog.html">Блог</a></li>
                        <li><a href="blog-fullwidth.html">Блог Full Width</a></li>
                        <li><a href="blog-post.html">Блог Post</a></li>
                        <li><a href="faq.html">FAQ</a></li>
                        <li><a href="terms.html">Terms & Conditions</a></li>
                        <li><a href="authentication.html">Login/Register</a></li>
                    </ul>
                </li-->
                <li><a href="{{ asset('articles') }}">Статьи</a></li>
                <li><a href="{{ asset('page/contacts') }}">Контакты</a></li>
            </ul>
        </div><!-- /.col -->

        <div class="col-xs-12 col-sm-4 no-margin">
            <ul class="right">
                <!--li class="dropdown">
                    <a class="dropdown-toggle"  data-toggle="dropdown" href="#change-language">English</a>
                    <ul class="dropdown-menu" role="menu" >
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Turkish</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Tamil</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">French</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Russian</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle"  data-toggle="dropdown" href="#change-currency">Dollar (US)</a>
                    <ul class="dropdown-menu" role="menu">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Euro (EU)</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Turkish Lira (TL)</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Indian Rupee (INR)</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Dollar (US)</a></li>
                    </ul>
                </li-->
                @if (Auth::check())
                    <li><a href="#">{{ Auth::user()->firstname }} </a></li>
                    <li><a href="{{ asset('logout') }}">Выход</a></li>
                @else
                    <li><a href="{{ asset('registration') }}">Регистрация</a></li>
                    <li><a href="{{ asset('login') }}">Вход</a></li>
                @endif
            </ul>
        </div><!-- /.col -->
    </div><!-- /.container -->
</nav><!-- /.top-bar -->
<!-- ============================================================= TOP NAVIGATION : END ============================================================= -->       <!-- ============================================================= HEADER ============================================================= -->
<header class="no-padding-bottom header-alt">
    <div class="container no-padding">
        
        <div class="col-xs-12 col-md-3 logo-holder">
            <!-- ============================================================= LOGO ============================================================= -->
            <div class="logo">
                <a href="{{ asset('/') }}">
                {{ HTML::image(Config::get('setting.logo.path')) }}
                <!--img src="{{ asset(Config::get('setting.logo.path')) }}"-->
                    <!--svg width="233" height="54" xmlns="http://www.w3.org/2000/svg">
                     <g>
                      <title>ukrtvsat</title>
                      <text fill="#3498db" stroke="#3498db" stroke-width="0" stroke-linejoin="null" stroke-linecap="null" x="115.24182" y="46.26511" id="svg_7" font-size="43" font-family="Sans-serif" text-anchor="middle" xml:space="preserve" font-weight="bold" transform="matrix(0.880684, 0, 0, 1.29058, -0.957407, -14.742)">ukrtvsat.</text>
                      <ellipse fill="#3498db" stroke="#3498db" stroke-width="0" stroke-linejoin="null" stroke-linecap="null" cx="1818" cy="801.4" id="svg_9" rx="200" ry="107"/>
                      <ellipse fill="#3498db" stroke="#3498db" stroke-width="0" stroke-linejoin="null" stroke-linecap="null" cx="1814" cy="804.4" id="svg_10" rx="72" ry="77"/>
                      <ellipse fill="#3498db" stroke="#3498db" stroke-width="0" stroke-linejoin="null" stroke-linecap="null" cx="1822" cy="766.4" id="svg_11" ry="1"/>
                      <ellipse fill="#3498db" stroke="#3498db" stroke-width="0" stroke-linejoin="null" stroke-linecap="null" cx="1806" cy="777.4" id="svg_12" ry="6"/>
                      <ellipse fill="#3498db" stroke="#3498db" stroke-width="0" stroke-linejoin="null" stroke-linecap="null" cx="1806" cy="800.4" id="svg_13" rx="2"/>
                      <text transform="matrix(0.730767, 0, 0, 1.22222, 49.6012, -9.86632)" fill="#3a3a3a" stroke="#3498db" stroke-width="0" stroke-linejoin="null" stroke-linecap="null" x="202.38858" y="35.4" id="svg_14" font-size="26" font-family="Sans-serif" text-anchor="middle" xml:space="preserve" font-weight="bold">com</text>
                      <rect fill="#3498db" stroke="#3498db" stroke-width="0" stroke-linejoin="null" stroke-linecap="null" x="1469" y="509" width="171" height="14" id="svg_16"/>
                      <rect fill="#3498db" stroke="#3498db" stroke-width="0" stroke-linejoin="null" stroke-linecap="null" x="1399" y="472" width="237" height="14" id="svg_17"/>
                     </g>
                    </svg-->
                </a>
            </div><!-- /.logo -->
            <!-- ============================================================= LOGO : END ============================================================= -->     
        </div><!-- /.logo-holder -->

    <div class="col-xs-12 col-md-6 top-search-holder no-margin">
        <div class="contact-row">
    <div class="phone inline">
        <i class="fa fa-phone"></i> {{ Config::get('setting.phone') }}
    </div>
    <div class="contact inline">
        <i class="fa fa-envelope"></i> <span class="le-color">{{ Config::get('setting.email') }}</span>
    </div>
</div><!-- /.contact-row -->
<!-- ============================================================= SEARCH AREA ============================================================= -->
<div class="search-area">
    <!--form-->
    {{ Form::model(null, array('action' => array('ProductController@search'), 'method' => 'get')) }}
        <div class="control-group">
            {{ Form::text('text', Input::get('text'), array('class' => 'search-field', 'placeholder' => 'Поиск' )) }}
            {{ Form::hidden('category', Input::get('category'), array('id' => 'search-category-id')) }}
            <ul class="categories-filter animate-dropdown">
                <li class="dropdown">
                    <a id="search-category-title" class="dropdown-toggle" data-toggle="dropdown" href="#">Все категории</a>
                    <ul id="search-category-list" class="dropdown-menu" role="menu" >
                        <li role="presentation"><a role="menuitem" tabindex="-1" id="category-0" href="#" data-id="0">Все категории</a></li>
                        @foreach(Category::where('id', '>=', 0)->take(0)->active()->orderBy('title', 'asc')->get() as $category)
                        <li role="presentation"><a role="menuitem" tabindex="-1" id="category-{{ $category->id }}" href="#" data-id="{{ $category->id }}" class="active">{{ $category->title }}</a></li>
                        @endforeach
                    </ul>
                </li>
            </ul>
            <button class="search-button" type="submit"></button>
            <!--a class="search-button" href="#" ></a-->    
        </div>
    {{ Form::close() }}
    <!--/form-->
</div><!-- /.search-area -->

<!-- ============================================================= SEARCH AREA : END ============================================================= -->      </div><!-- /.top-search-holder -->

<div class="col-xs-12 col-md-3 top-cart-row no-margin">
    <div class="top-cart-row-container">
        <div class="wishlist-compare-holder">
            <!--div class="wishlist ">
                <a href="#"><i class="fa fa-heart"></i>Желания <span class="value">(21)</span> </a>
            </div>
            <div class="compare">
                <a href="#"><i class="fa fa-exchange"></i>Сравнение <span class="value">(2)</span> </a>
            </div-->
        </div>

    <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
    <div class="top-cart-holder dropdown animate-dropdown">
        
        <div class="basket">
            
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <div class="basket-item-count">
                    <span class="count">{{ Cart::count(false) }}</span>
                    <img src="{{asset('images/icon-cart.png')}}" alt="" />
                </div>

                <div class="total-price-basket"> 
                    <span class="lbl">Корзина:</span>
                    <div class="total-price">
                        <span class="value">{{ Cart::total() }}</span>грн.
                    </div>
                </div>
            </a>
            <ul class="dropdown-menu">
            @if(Cart::count())
                @foreach(Cart::content() as $row)
                    <li>
                        <div class="basket-item">
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 no-margin text-center">
                                    <div class="thumb">
                                        <img alt="" src='{{ asset("uploads/images/product/" . $row->id . "_1_thumb.png") }}' />
                                    </div>
                                </div>
                                <div class="col-xs-8 col-sm-8 no-margin">
                                    <div class="title">{{ $row->name }}</div>
                                    <div class="price"><span>{{ $row->price }}</span>грн</div>
                                </div>
                            </div>
                            <a class="close-btn" data-product="{{ $row->id }}" href="#" data-toggle="modal" data-target=".bs-example-modal-sm"></a>
                        </div>
                    </li>
                @endforeach
                <li class="checkout">
                    <div class="basket-item">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <a href="{{ asset('cart') }}" class="le-button inverse">Перейти в корзину</a>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <a href="{{ asset('checkout') }}" class="le-button">Оформить заказ</a>
                            </div>
                        </div>
                    </div>
                </li>
            @else
                <li class="checkout">
                    <div class="basket-item">
                        <div class="row">
                            <div class="col-xs-12 col-sm-2">
                                <div class="basket-item-count">
                                    <span class="count">0</span>
                                    <img alt="" src="http://ukrtvsat.loc/images/icon-cart.png">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-10">
                                <div class="cart-empty">Корзина пуста</div>
                            </div>
                        </div>
                    </div>
                </li>
            @endif
            </ul>
        </div><!-- /.basket -->
    </div><!-- /.top-cart-holder -->
</div><!-- /.top-cart-row-container -->
<!-- ============================================================= SHOPPING CART DROPDOWN : END ============================================================= -->       </div><!-- /.top-cart-row -->

</div><!-- /.container -->

<!-- ========================================= NAVIGATION ========================================= -->
<nav id="top-megamenu-nav" class="megamenu-vertical animate-dropdown">
    <div class="container">
        <div class="yamm navbar">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mc-horizontal-menu-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div><!-- /.navbar-header -->
            <div class="collapse navbar-collapse" id="mc-horizontal-menu-collapse">
                <ul class="nav navbar-nav">

                    <!--li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">Computers</a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Computer Cases &amp; Accessories</a></li>
                            <li><a href="#">CPUs, Processors</a></li>
                            <li><a href="#">Fans, Heatsinks &amp; Cooling</a></li>
                            <li><a href="#">Graphics, Video Cards</a></li>
                            <li><a href="#">Interface, Add-On Cards</a></li>
                            <li><a href="#">Laptop Replacement Parts</a></li>
                            <li><a href="#">Memory (RAM)</a></li>
                            <li><a href="#">Motherboards</a></li>
                            <li><a href="#">Motherboard &amp; CPU Combos</a></li>
                        </ul>
                    </li-->
                    @foreach(category::roots()->active()->get() as $parentCategory)
                    <li class="dropdown">
                        <a href='{{ asset("category/$parentCategory->link") }}' class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">{{ $parentCategory->title }}</a>
                        <ul class="dropdown-menu">
                        <?php $i = 0;?>
                        @foreach($parentCategory->children as $category)
                            @if ($category->children->count() > 0 && $category->active)
                                @if (!$i)
                                 <li>
                                    <div class="yamm-content">
                                        <div class="row">
                                @endif
                                            <div class="col-xs-12 col-sm-{{ 12 / count($parentCategory->children) }}">
                                                <h2><a href='{{ asset("category/$category->link") }}'>{{ $category->title }}</a></h2>
                                                <ul>
                                                
                                                    @foreach($category->children as $childrenCategory)
                                                        <li><a href='{{ asset("category/$childrenCategory->link") }}'>{{ $childrenCategory->title }}</a></li>
                                                    @endforeach
                                               
                                                </ul>
                                            </div>
                                @if ($i == count($parentCategory->children))
                                        </div>
                                    </div>
                                </li>
                                @endif
                                    <?php $i++;?>
                                    @else
                                    <li><a href='{{ asset("category/$category->link") }}'>{{ $category->title }}</a></li>
                                    @endif
                                @endforeach
                        </ul>
                    </li>
                    @endforeach


                    <!--li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">RTV</a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                       <div class="col-xs-12 col-sm-4">
                                            <h2>Laptops &amp; Notebooks</h2>
                                            <ul>
                                                <li><a href="#">Power Supplies Power</a></li>
                                                <li><a href="#">Power Supply Testers Sound </a></li>
                                                <li><a href="#">Sound Cards (Internal)</a></li>
                                                <li><a href="#">Video Capture &amp; TV Tuner Cards</a></li>
                                                <li><a href="#">Other</a></li>
                                            </ul>
                                        </div>

                                        <div class="col-xs-12 col-sm-4">
                                            <h2>Computers &amp; Laptops</h2>
                                            <ul>
                                                <li><a href="#">Computer Cases &amp; Accessories</a></li>
                                                <li><a href="#">CPUs, Processors</a></li>
                                                <li><a href="#">Fans, Heatsinks &amp; Cooling</a></li>
                                                <li><a href="#">Graphics, Video Cards</a></li>
                                                <li><a href="#">Interface, Add-On Cards</a></li>
                                                <li><a href="#">Laptop Replacement Parts</a></li>
                                                <li><a href="#">Memory (RAM)</a></li>
                                                <li><a href="#">Motherboards</a></li>
                                                <li><a href="#">Motherboard &amp; CPU Combos</a></li>
                                                <li><a href="#">Motherboard Components &amp; Accs</a></li>
                                            </ul>
                                        </div>

                                        <div class="col-xs-12 col-sm-4">
                                            <h2>Dekstop Parts</h2>
                                            <ul>
                                                <li><a href="#">Power Supplies Power</a></li>
                                                <li><a href="#">Power Supply Testers Sound</a></li>
                                                <li><a href="#">Sound Cards (Internal)</a></li>
                                                <li><a href="#">Video Capture &amp; TV Tuner Cards</a></li>
                                                <li><a href="#">Other</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li-->
                </ul><!-- /.navbar-nav -->
            </div><!-- /.navbar-collapse -->
        </div><!-- /.navbar -->
    </div><!-- /.container -->
</nav><!-- /.megamenu-vertical -->
<!-- ========================================= NAVIGATION : END ========================================= -->


@if (Route::currentRouteAction() !== 'IndexController@index')
<div class="animate-dropdown">
    <div id="breadcrumb-alt">
        <div class="container">
            <div class="breadcrumb-nav-holder minimal">
                <!--ul>
                    <li class="dropdown breadcrumb-item">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            Media Center
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Computer Cases &amp; Accessories</a></li>
                            <li><a href="#">CPUs, Processors</a></li>
                            <li><a href="#">Fans, Heatsinks &amp; Cooling</a></li>
                            <li><a href="#">Graphics, Video Cards</a></li>
                            <li><a href="#">Interface, Add-On Cards</a></li>
                            <li><a href="#">Laptop Replacement Parts</a></li>
                            <li><a href="#">Memory (RAM)</a></li>
                            <li><a href="#">Motherboards</a></li>
                            <li><a href="#">Motherboard &amp; CPU Combos</a></li>
                            <li><a href="#">Motherboard Components</a></li>
                        </ul>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Home</a>
                    </li>
                    <li class="breadcrumb-item current">
                        <a href="#">Blog</a>
                    </li>
                </ul-->
            </div>
        </div>
    </div>
</div>
@endif
</header>

@yield('content')

<footer id="footer" class="color-bg">
    
    <div class="container">
        <div class="row no-margin widgets-row">
            <div class="col-xs-12  col-sm-4 no-margin-left">
                <!-- ============================================================= FEATURED PRODUCTS ============================================================= -->
                    <div class="widget">
                        <h2>Рекомендуемые товары</h2>
                        <div class="body">
                            <ul>
                                @foreach(Product::take(3)->skip(0)->active()->orderBy('created_at', 'desc')->get() as $product)
                                <li>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-9 no-margin">
                                            <a href="{{ asset('product/' . $product->link) }}">{{ $product->name }}</a>
                                            <div class="price">
                                                <div class="price-prev">{{ $product->price_prev ? $product->price_prev . 'грн' : '' }}</div>
                                                <div class="price-current">{{ $product->currency_id == 1 ?  $product->price : $product->price * Config::get('setting.exchangeRates') }}грн</div>
                                            </div>
                                        </div>  

                                        <div class="col-xs-12 col-sm-3 no-margin">
                                            <a href="{{ asset('product/' . $product->link) }}" class="thumb-holder">
                                                <img alt="{{ $product->name }}" src="{{asset('images/blank.gif')}}" data-echo='{{ asset("uploads/images/product/" . $product->id . "_1_thumb.png") }}' />
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div><!-- /.body -->
                    </div> <!-- /.widget -->
                <!-- ================================= FEATURED PRODUCTS : END ===================================== -->            
            </div><!-- /.col -->

            <div class="col-xs-12 col-sm-4 ">
                <!-- ============================================================= ON SALE PRODUCTS ============================================================= -->
                <div class="widget">
                    <h2>Новые поступления</h2>
                    <div class="body">
                        <ul>
                            @foreach(product::take(3)->skip(3)->active()->orderBy('created_at', 'desc')->get() as $product)
                            <li>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-9 no-margin">
                                        <a href="{{ asset('product/' . $product->link) }}">{{ $product->name }}</a>
                                        <div class="price">
                                            <div class="price-prev">{{ $product->price_prev ? $product->price_prev . 'грн' : '' }}</div>
                                            <div class="price-current">{{ $product->currency_id == 1 ?  $product->price : $product->price * Config::get('setting.exchangeRates') }}грн</div>
                                        </div>
                                    </div>  

                                    <div class="col-xs-12 col-sm-3 no-margin">
                                        <a href="{{ asset('product/' . $product->link) }}" class="thumb-holder">
                                            <img alt="{{ $product->name }}" src="{{asset('images/blank.gif')}}" data-echo='{{ asset("uploads/images/product/" . $product->id . "_1_thumb.png") }}' />
                                        </a>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div><!-- /.body -->
                </div> <!-- /.widget -->
                <!-- ============================================================= ON SALE PRODUCTS : END ============================================================= -->            </div><!-- /.col -->

                            <div class="col-xs-12 col-sm-4 ">
                                <!-- ============================================================= TOP RATED PRODUCTS ============================================================= -->
                <div class="widget">
                    <h2>Лучшие товары</h2>
                    <div class="body">
                        <ul>
                            @foreach(product::take(3)->skip(6)->active()->orderBy('created_at', 'desc')->get() as $product)
                            <li>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-9 no-margin">
                                        <a href="{{ asset('product/' . $product->link) }}">{{ $product->name }}</a>
                                        <div class="price">
                                            <div class="price-prev">{{ $product->price_prev ? $product->price_prev . 'грн' : '' }}</div>
                                            <div class="price-current">{{ $product->currency_id == 1 ?  $product->price : $product->price * Config::get('setting.exchangeRates') }}грн</div>
                                        </div>
                                    </div>  

                                    <div class="col-xs-12 col-sm-3 no-margin">
                                        <a href="{{ asset('product/' . $product->link) }}" class="thumb-holder">
                                            <img alt="{{ $product->name }}" src="{{asset('images/blank.gif')}}" data-echo='{{ asset("uploads/images/product/" . $product->id . "_1_thumb.png") }}' />
                                        </a>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div><!-- /.body -->
                </div><!-- /.widget -->
                <!-- ============================================================= TOP RATED PRODUCTS : END ============================================================= -->            </div><!-- /.col -->

        </div><!-- /.widgets-row-->
    </div><!-- /.container -->

    <div class="sub-form-row">
        <div class="container">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2 no-padding">
                <!--form role="form">
                    <input placeholder="Подпишитесь на нашу рассылку">
                    <button class="le-button">Подписаться</button>
                </form-->
            </div>
        </div><!-- /.container -->
    </div><!-- /.sub-form-row -->

    <div class="link-list-row">
        <div class="container no-padding">
            <div class="col-xs-12 col-md-4 ">
                <!-- ============================================================= CONTACT INFO ============================================================= -->
<div class="contact-info">
    <!--div class="footer-logo">
        <svg width="233" height="54" xmlns="http://www.w3.org/2000/svg">
         <g>
          <title>ukrtvsat</title>
          <text fill="#3498db" stroke="#3498db" stroke-width="0" stroke-linejoin="null" stroke-linecap="null" x="115.24182" y="46.26511" id="svg_7" font-size="43" font-family="Sans-serif" text-anchor="middle" xml:space="preserve" font-weight="bold" transform="matrix(0.880684, 0, 0, 1.29058, -0.957407, -14.742)">ukrtvsat.</text>
          <ellipse fill="#3498db" stroke="#3498db" stroke-width="0" stroke-linejoin="null" stroke-linecap="null" cx="1818" cy="801.4" id="svg_9" rx="200" ry="107"/>
          <ellipse fill="#3498db" stroke="#3498db" stroke-width="0" stroke-linejoin="null" stroke-linecap="null" cx="1814" cy="804.4" id="svg_10" rx="72" ry="77"/>
          <ellipse fill="#3498db" stroke="#3498db" stroke-width="0" stroke-linejoin="null" stroke-linecap="null" cx="1822" cy="766.4" id="svg_11" ry="1"/>
          <ellipse fill="#3498db" stroke="#3498db" stroke-width="0" stroke-linejoin="null" stroke-linecap="null" cx="1806" cy="777.4" id="svg_12" ry="6"/>
          <ellipse fill="#3498db" stroke="#3498db" stroke-width="0" stroke-linejoin="null" stroke-linecap="null" cx="1806" cy="800.4" id="svg_13" rx="2"/>
          <text transform="matrix(0.730767, 0, 0, 1.22222, 49.6012, -9.86632)" fill="#3a3a3a" stroke="#3498db" stroke-width="0" stroke-linejoin="null" stroke-linecap="null" x="202.38858" y="35.4" id="svg_14" font-size="26" font-family="Sans-serif" text-anchor="middle" xml:space="preserve" font-weight="bold">com</text>
          <rect fill="#3498db" stroke="#3498db" stroke-width="0" stroke-linejoin="null" stroke-linecap="null" x="1469" y="509" width="171" height="14" id="svg_16"/>
          <rect fill="#3498db" stroke="#3498db" stroke-width="0" stroke-linejoin="null" stroke-linecap="null" x="1399" y="472" width="237" height="14" id="svg_17"/>
         </g>
        </svg>  
    </div--><!-- /.footer-logo -->
    
    <!--p class="regular-bold"> Не стесняйтесь обращаться к нам по телефону или электронной почте.</p-->
    <address>
      <strong>Наш адрес:</strong><br>
        {{ Config::get('setting.address') }}
    </address>
    <address>
      <strong>Контактная информация:</strong><br>
      URL сайта: {{ HTML::link('') }}<br>
      <abbr title="ответим в ближайшее время">email:</abbr> {{ HTML::mailto(Config::get('setting.email')) }}<br>
      <abbr title="мы Вам перезвоним">телефон:</abbr> {{ Config::get('setting.phone') }}<br>
    </address>
    <!--div class="social-icons">
        <h3>Мы в соцсетях</h3>
        <ul>
            <li><a href="http://facebook.com/transvelo" class="fa fa-facebook"></a></li>
            <li><a href="#" class="fa fa-twitter"></a></li>
            <li><a href="#" class="fa fa-pinterest"></a></li>
            <li><a href="#" class="fa fa-linkedin"></a></li>
            <li><a href="#" class="fa fa-stumbleupon"></a></li>
            <li><a href="#" class="fa fa-dribbble"></a></li>
            <li><a href="#" class="fa fa-vk"></a></li>
        </ul>
    </div-->
</div>
<!-- ============================================================= CONTACT INFO : END ============================================================= -->            </div>

            <div class="col-xs-12 col-md-8 no-margin">
                <!-- ============================================================= LINKS FOOTER ============================================================= -->
<div class="link-widget">
    <div class="widget">
        <h3>Меню</h3>
        <ul>
            @foreach(Page::active()->orderBy('created_at', 'desc')->get() as $page)
            <li><a href="{{ asset("page/$page->link") }}">{{ $page->title }}</a></li>
            @endforeach
        </ul>
    </div><!-- /.widget -->
</div><!-- /.link-widget -->

<div class="link-widget">
    <div class="widget">
        <h3>Полезные статьи</h3>
        <ul>
            @foreach(Article::take(5)->active()->orderBy('created_at', 'desc')->get() as $article)
            <li><a href="{{ asset("article/$article->link") }}">{{ $article->title }}</a></li>
            @endforeach
        </ul>
    </div><!-- /.widget -->
</div><!-- /.link-widget -->

<div class="link-widget">
    <div class="widget">
        <h3>Блог</h3>
        <ul>
            @foreach(Post::active()->orderBy('created_at', 'desc')->get() as $post)
            <li><a href="{{ asset("post/$post->link") }}">{{ $post->title }}</a></li>
            @endforeach
        </ul>
    </div><!-- /.widget -->
</div><!-- /.link-widget -->
<!-- ============================================================= LINKS FOOTER : END ============================================================= -->            </div>
        </div><!-- /.container -->
    </div><!-- /.link-list-row -->

    <div class="copyright-bar">
        <div class="container">
            <div class="col-xs-12 col-sm-6 no-margin">
                <div class="copyright">
                    &copy; Интернет-магазин «{{ Config::get('setting.company') }}» – оборудование для приема и настройки спутникового телевидения, все права защищены
                </div><!-- /.copyright -->
            </div>
            <!--div class="col-xs-12 col-sm-6 no-margin">
                <div class="payment-methods ">
                    <ul>
                        <li><img alt="" src="{{asset('images/payments/payment-visa.png')}}"></li>
                        <li><img alt="" src="{{asset('images/payments/payment-master.png')}}"></li>
                        <li><img alt="" src="{{asset('images/payments/payment-paypal.png')}}"></li>
                        <li><img alt="" src="{{asset('images/payments/payment-skrill.png')}}"></li>
                    </ul>
                </div>
            </div-->
        </div><!-- /.container -->
    </div><!-- /.copyright-bar -->

</footer><!-- /#footer -->
<!-- ============================================================= FOOTER : END ============================================================= -->   </div><!-- /.wrapper -->

    <!-- For demo purposes – can be removed on production -->

    <!-- Small modal -->
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
        <div class="want-delete">
            <div class="cart-wishlist">
                <a class="cart-wishlist-link" href="#" name="move">
                    <div class="cart-wishlist-icon"></div>
                    Переместить
                    <br>
                    в список желаний
                </a>
            </div>
            <div class="cart-delete">
                <a class="cart-delete-link" href="#" name="delete">
                    <div class="cart-delete-icon"></div>
                    Удалить
                    <br>
                    без сохранения
                </a>
            </div>
            <a class="cart-cancel-delete" href="#" class="close" data-dismiss="modal" aria-label="Close" name="cancel">Отмена</a>
        </div>
        </div>
      </div>
    </div>    
</body>
</html>
<script type="text/javascript">
    $(function() {
        @if(Session::has('status'))
            bootbox.alert("{{ Session::get('status') }}");
            window.setTimeout(function(){
                bootbox.hideAll();
            }, 5000);
        @endif
    });
</script>