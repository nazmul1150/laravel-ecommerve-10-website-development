@section('title')
 Home
@endsection

  <main class="main">
        <section class="home-slider position-relative pt-50" wire:ignore>
            <div class="hero-slider-1 dot-style-1 dot-style-1-position-1">
                @php
                 $i= 0;
                @endphp
                @foreach($home_sliders as $home_slider)
                @if($home_slider->status == 0)
                @if($i++ % 2 == 0)
                
                <div class="single-hero-slider single-animation-wrap">
                    <div class="container">
                        <div class="row align-items-center slider-animated-1">
                            <div class="col-lg-5 col-md-6">
                                <div class="hero-slider-content-2">
                                    <h4 class="animated">{{$home_slider->subtitle}}</h4>
                                    <h2 class="animated fw-900">{{$home_slider->title1}}</h2>
                                    <h1 class="animated fw-900 text-brand">{{$home_slider->title2}}</h1>
                                    <p class="animated">{{$home_slider->short_desc}}</p>
                                    <a class="animated btn btn-brush btn-brush-3" href="{{$home_slider->link}}"> Shop Now </a>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-6">
                                <div class="single-slider-img single-slider-img-1">
                                    <img class="animated slider-1-1" src="{{asset('website/imgs/slider')}}/{{$home_slider->image}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @else

                <div class="single-hero-slider single-animation-wrap">
                    <div class="container">
                        <div class="row align-items-center slider-animated-1">
                            <div class="col-lg-5 col-md-6">
                                <div class="hero-slider-content-2">
                                    <h4 class="animated">{{$home_slider->subtitle}}</h4>
                                    <h2 class="animated fw-900">{{$home_slider->title1}}</h2>
                                    <h1 class="animated fw-900 text-7">{{$home_slider->title2}}</h1>
                                    <p class="animated">{{$home_slider->short_desc}}</p>
                                    <a class="animated btn btn-brush btn-brush-2" href="{{$home_slider->link}}"> Discover Now </a>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-6">
                                <div class="single-slider-img single-slider-img-1">
                                    <img class="animated slider-1-2" src="{{asset('website/imgs/slider')}}/{{$home_slider->image}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endif
                @endforeach
            </div>
            <div class="slider-arrow hero-slider-1-arrow"></div>
        </section>
        <section class="featured section-padding position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="{{asset('website/imgs/theme/icons/feature-1.png')}}" alt="">
                            <h4 class="bg-1">Free Shipping</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="{{asset('website/imgs/theme/icons/feature-2.png')}}" alt="">
                            <h4 class="bg-3">Online Order</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="{{asset('website/imgs/theme/icons/feature-3.png')}}" alt="">
                            <h4 class="bg-2">Save Money</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="{{asset('website/imgs/theme/icons/feature-4.png')}}" alt="">
                            <h4 class="bg-4">Promotions</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="{{asset('website/imgs/theme/icons/feature-5.png')}}" alt="">
                            <h4 class="bg-5">Happy Sell</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="{{asset('website/imgs/theme/icons/feature-6.png')}}" alt="">
                            <h4 class="bg-6">24/7 Support</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="product-tabs section-padding position-relative wow fadeIn animated">
            <div class="bg-square"></div>
            <div class="container">
                <div class="tab-header">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">

                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one" aria-selected="true">New added</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="nav-tab-two" data-bs-toggle="tab" data-bs-target="#tab-two" type="button" role="tab" aria-controls="tab-two" aria-selected="false">Popular</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="nav-tab-three" data-bs-toggle="tab" data-bs-target="#tab-three" type="button" role="tab" aria-controls="tab-three" aria-selected="false">Featured</button>
                        </li>

                    </ul>
                    <a href="{{route('shop')}}" class="view-more d-none d-md-flex">View More<i class="fi-rs-angle-double-small-right"></i></a>
                </div>
                <!--End nav-tabs-->
                <div class="tab-content wow fadeIn animated" id="myTabContent">

                    <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one" wire:ignore>
                        <div class="row product-grid-4">
                            @foreach($products as $product)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{route('product.details',['p_slug'=>$product->slug])}}">
                                                <img class="default-img" src="{{asset('website/imgs/shop/product')}}/{{$product->image}}" alt="{{$product->name}}">
                                                @php
                                                  $images = explode(',',$product->images);
                                                  $i = 0;
                                                @endphp
                                                @foreach($images as $image)
                                                 @if($i == 1)
                                                   @breack
                                                 @endif
                                                <img class="hover-img" src="{{asset('website/imgs/shop/product')}}/{{$image}}" alt="{{$product->name}}">
                                                @endforeach
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>

                                             @php
                                             $wishlist = Cart::instance('wishlist')->content()->pluck('id');
                                             @endphp

                                            @if($wishlist->contains($product->id))
                                            <a style="background-color: #F15412 !important;border: 1px solid transparent; color: #ffffff;" aria-label="Add To Wishlist" class="action-btn hover-up wishlist-active" href="#" wire:click.prevent="removeWishList({{$product->id}})"><i class="fi-rs-heart"></i></a>
                                            @else
                                            <a aria-label="Add To Wishlist" class="action-btn hover-up" href="#" wire:click.prevent="addToWishList({{$product->id}},'{{$product->name}}',{{$product->price}})"><i class="fi-rs-heart"></i></a>
                                            @endif

                                            <a aria-label="Compare" class="action-btn hover-up" href="#"><i class="fi-rs-shuffle"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">Hot</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="{{route('category',['cat_slug'=>$product->category->slug])}}">{{$product->category->name}}</a>
                                        </div>
                                        <h2><a href="{{route('product.details',['p_slug'=>$product->slug])}}">{{ Illuminate\Support\Str::limit($product->name, 30, $end='...') }}</a></h2>
                                        <div class="rating-result" title="90%">
                                            <span>
                                                <span>90%</span>
                                            </span>
                                        </div>
                                        <div class="product-price">
                                            @if($product->dis_price)
                                            <span>${{$product->price}} </span>
                                            <span class="old-price">${{$product->dis_price}}</span>
                                            @else
                                            <span>${{$product->price}} </span>
                                            @endif
                                        </div>
                                        <div class="product-action-1 show">
                                            <a aria-label="Add To Cart" class="action-btn hover-up" href="#" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->price}})"><i class="fi-rs-shopping-bag-add"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                        <!--End product-grid-4-->
                    </div>
                    <!--En tab one (New added)-->

                    <div class="tab-pane fade" id="tab-two" role="tabpanel" aria-labelledby="tab-two" wire:ignore>
                        <div class="row product-grid-4">

                          @foreach($popular_products as $product)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{route('product.details',['p_slug'=>$product->slug])}}">
                                                <img class="default-img" src="{{asset('website/imgs/shop/product')}}/{{$product->image}}" alt="{{$product->name}}">
                                                @php
                                                  $images = explode(',',$product->images);
                                                  $i = 0;
                                                @endphp
                                                @foreach($images as $image)
                                                 @if($i == 1)
                                                   @breack
                                                 @endif
                                                <img class="hover-img" src="{{asset('website/imgs/shop/product')}}/{{$image}}" alt="{{$product->name}}">
                                                @endforeach
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>

                                             @php
                                             $wishlist = Cart::instance('wishlist')->content()->pluck('id');
                                             @endphp

                                            @if($wishlist->contains($product->id))
                                            <a style="background-color: #F15412 !important;border: 1px solid transparent; color: #ffffff;" aria-label="Add To Wishlist" class="action-btn hover-up wishlist-active" href="#" wire:click.prevent="removeWishList({{$product->id}})"><i class="fi-rs-heart"></i></a>
                                            @else
                                            <a aria-label="Add To Wishlist" class="action-btn hover-up" href="#" wire:click.prevent="addToWishList({{$product->id}},'{{$product->name}}',{{$product->price}})"><i class="fi-rs-heart"></i></a>
                                            @endif

                                            <a aria-label="Compare" class="action-btn hover-up" href="#"><i class="fi-rs-shuffle"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">Hot</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="{{route('category',['cat_slug'=>$product->category->slug])}}">{{$product->category->name}}</a>
                                        </div>
                                        <h2><a href="{{route('product.details',['p_slug'=>$product->slug])}}">{{ Illuminate\Support\Str::limit($product->name, 30, $end='...') }}</a></h2>
                                        <div class="rating-result" title="90%">
                                            <span>
                                                <span>90%</span>
                                            </span>
                                        </div>
                                        <div class="product-price">
                                            @if($product->dis_price)
                                            <span>${{$product->price}} </span>
                                            <span class="old-price">${{$product->dis_price}}</span>
                                            @else
                                            <span>${{$product->price}} </span>
                                            @endif
                                        </div>
                                        <div class="product-action-1 show">
                                            <a aria-label="Add To Cart" class="action-btn hover-up" href="#" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->price}})"><i class="fi-rs-shopping-bag-add"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                        <!--End product-grid-4-->
                    </div>
                    <!--En tab two (Popular)-->

                    <div class="tab-pane fade" id="tab-three" role="tabpanel" aria-labelledby="tab-three" wire:ignore>
                        <div class="row product-grid-4">
                            @php
                             $featured = 0;
                            @endphp
                            @foreach($featured_products as $product)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{route('product.details',['p_slug'=>$product->slug])}}">
                                                <img class="default-img" src="{{asset('website/imgs/shop/product')}}/{{$product->image}}" alt="{{$product->name}}">
                                                @php
                                                  $images = explode(',',$product->images);
                                                  $i = 0;
                                                @endphp
                                                @foreach($images as $image)
                                                 @if($i == 1)
                                                   @breack
                                                 @endif
                                                <img class="hover-img" src="{{asset('website/imgs/shop/product')}}/{{$image}}" alt="{{$product->name}}">
                                                @endforeach
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>

                                             @php
                                             $wishlist = Cart::instance('wishlist')->content()->pluck('id');
                                             @endphp

                                            @if($wishlist->contains($product->id))
                                            <a style="background-color: #F15412 !important;border: 1px solid transparent; color: #ffffff;" aria-label="Add To Wishlist" class="action-btn hover-up wishlist-active" href="#" wire:click.prevent="removeWishList({{$product->id}})"><i class="fi-rs-heart"></i></a>
                                            @else
                                            <a aria-label="Add To Wishlist" class="action-btn hover-up" href="#" wire:click.prevent="addToWishList({{$product->id}},'{{$product->name}}',{{$product->price}})"><i class="fi-rs-heart"></i></a>
                                            @endif

                                            <a aria-label="Compare" class="action-btn hover-up" href="#"><i class="fi-rs-shuffle"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">Hot</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="{{route('category',['cat_slug'=>$product->category->slug])}}">{{$product->category->name}}</a>
                                        </div>
                                        <h2><a href="{{route('product.details',['p_slug'=>$product->slug])}}">{{ Illuminate\Support\Str::limit($product->name, 30, $end='...') }}</a></h2>
                                        <div class="rating-result" title="90%">
                                            <span>
                                                <span>90%</span>
                                            </span>
                                        </div>
                                        <div class="product-price">
                                            @if($product->dis_price)
                                            <span>${{$product->price}} </span>
                                            <span class="old-price">${{$product->dis_price}}</span>
                                            @else
                                            <span>${{$product->price}} </span>
                                            @endif
                                        </div>
                                        <div class="product-action-1 show">
                                            <a aria-label="Add To Cart" class="action-btn hover-up" href="#" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->price}})"><i class="fi-rs-shopping-bag-add"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            @endforeach

                        </div>
                        <!--End product-grid-4-->
                    </div>
                    <!--En tab three (Featured)-->

                </div>
                <!--End tab-content-->
            </div>
        </section>
        <!-- banner 1 -->
        <section class="banner-2 section-padding pb-0">
            <div class="container">
                <div class="banner-img banner-big wow fadeIn animated f-none">
                    <img src="{{asset('website/imgs/banner')}}/{{$banner_1->image}}" alt="">
                    <div class="banner-text d-md-block d-none">
                        <h4 class="mb-15 mt-40 text-brand">{{$banner_1->subtitle}}</h4>
                        <h1 class="fw-600 mb-20">{{$banner_1->title1}} <br>{{$banner_1->title2}}</h1>
                        <a href="{{$banner_1->link}}" class="btn">{{$banner_1->link_name}} <i class="fi-rs-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </section>
        <!-- end banner 1 -->
        <section class="popular-categories section-padding mt-15 mb-25" wire:ignore>
            <div class="container wow fadeIn animated">
                <h3 class="section-title mb-20"><span>Popular</span> Categories</h3>
                <div class="carausel-6-columns-cover position-relative">
                    <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-arrows"></div>
                    <div class="carausel-6-columns" id="carausel-6-columns">

                        @foreach($product_category as $category)
                        <div class="card-1">
                            <figure class=" img-hover-scale overflow-hidden">
                                <a href="{{route('category',['cat_slug'=>$category->slug])}}"><img src="{{asset('website/imgs/shop/category')}}/{{$category->image}}" alt=""></a>
                            </figure>
                            <h5><a href="{{route('category',['cat_slug'=>$category->slug])}}">{{$category->name}}</a></h5>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>
        <section class="banners mb-15">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-img wow fadeIn animated">
                            <img src="{{asset('website/imgs/banner')}}/{{$banner_2->image}}" alt="">
                            <div class="banner-text">
                                <span>{{$banner_2->subtitle}}</span>
                                <h4>{{$banner_2->title1}} <br>{{$banner_2->title2}}</h4>
                                <a href="{{$banner_2->link}}">{{$banner_2->link_name}} <i class="fi-rs-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-img wow fadeIn animated">
                            <img src="{{asset('website/imgs/banner')}}/{{$banner_3->image}}" alt="">
                            <div class="banner-text">
                                <span>{{$banner_3->subtitle}}</span>
                                <h4>{{$banner_3->title1}} <br>{{$banner_3->title2}}</h4>
                                <a href="{{$banner_3->link}}">{{$banner_3->link_name}} <i class="fi-rs-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 d-md-none d-lg-flex">
                        <div class="banner-img wow fadeIn animated  mb-sm-0">
                            <img src="{{asset('website/imgs/banner')}}/{{$banner_4->image}}" alt="">
                            <div class="banner-text">
                                <span>{{$banner_4->subtitle}}</span>
                                <h4>{{$banner_4->title1}} <br>{{$banner_4->title2}}</h4>
                                <a href="{{$banner_4->link}}">{{$banner_4->link_name}} <i class="fi-rs-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-padding" wire:ignore>
            <div class="container wow fadeIn animated">
                <h3 class="section-title mb-20"><span>New</span> Arrivals</h3>
                <div class="carausel-6-columns-cover position-relative">
                    <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-2-arrows"></div>
                    <div class="carausel-6-columns carausel-arrow-center" id="carausel-6-columns-2">

                        @foreach($products as $product)
                        <div class="product-cart-wrap small hover-up">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{route('product.details',['p_slug'=>$product->slug])}}">
                                        <img class="default-img" src="{{asset('website/imgs/shop/product')}}/{{$product->image}}" alt="{{$product->name}}">
                                        @php
                                            $images = explode(',',$product->images);
                                            $i = 0;
                                        @endphp
                                        @foreach($images as $image)
                                            @if($i == 1)
                                             @breack
                                            @endif
                                        <img class="hover-img" src="{{asset('website/imgs/shop/product')}}/{{$image}}" alt="{{$product->name}}">
                                        @endforeach
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                        <i class="fi-rs-eye"></i></a>

                                    @php
                                       $wishlist = Cart::instance('wishlist')->content()->pluck('id');
                                    @endphp

                                    @if($wishlist->contains($product->id))
                                    <a style="background-color: #F15412 !important;border: 1px solid transparent; color: #ffffff;" aria-label="Add To Wishlist" class="action-btn hover-up wishlist-active" href="#" wire:click.prevent="removeWishList({{$product->id}})"><i class="fi-rs-heart"></i></a>
                                    @else
                                    <a aria-label="Add To Wishlist" class="action-btn hover-up" href="#" wire:click.prevent="addToWishList({{$product->id}},'{{$product->name}}',{{$product->price}})"><i class="fi-rs-heart"></i></a>
                                    @endif

                                    <a aria-label="Compare" class="action-btn small hover-up" href="compare.php" tabindex="0"><i class="fi-rs-shuffle"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">Hot</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <h2><a href="{{route('product.details',['p_slug'=>$product->slug])}}">{{ Illuminate\Support\Str::limit($product->name, 30, $end='...') }}</a></h2>
                                <div class="rating-result" title="90%">
                                    <span>
                                    </span>
                                </div>
                                <div class="product-price">
                                    @if($product->dis_price)
                                        <span>${{$product->price}} </span>
                                        <span class="old-price">${{$product->dis_price}}</span>
                                    @else
                                        <span>${{$product->price}} </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>
       
        <section class="section-padding" wire:ignore>
            <div class="container">
                <h3 class="section-title mb-20 wow fadeIn animated"><span>Featured</span> Brands</h3>
                <div class="carausel-6-columns-cover position-relative wow fadeIn animated">
                    <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-3-arrows"></div>
                    <div class="carausel-6-columns text-center" id="carausel-6-columns-3">

                        @foreach($featured_brands as $featured_brand)
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="{{asset('website/imgs/featured_brands')}}/{{$featured_brand->image}}" alt="{{$featured_brand->image}}">
                        </div>

                        @endforeach

                    </div>
                </div>
            </div>
        </section>
        
    </main>