<section id="slider">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        @foreach(Product::where('id', '>', 1)->take(3)->get() as $product)
                        <div class="item {{ $product->id == 2 ? 'active' : '' }}">
                            <div class="col-sm-6">
                                <h1><span>{{{ $product->name }}}</span></h1>
                                <h2>{{{ Str::limit($product->description, 50) }}}</h2>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="/uploads/images/shop/product/{{ $product->id }}_1_big.png" class="girl img-responsive" alt="" />
                                <img src="/img/home/pricing.png"  class="pricing" alt="" />
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>