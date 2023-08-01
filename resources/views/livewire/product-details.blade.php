@section('title')
product details
@endsection

<main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                     @if($product->category_id)
                     <span></span> {{$product->category->name}}
                     @endif
                     @if($product->subcategory_id)
                     <span></span> {{$product->subcategory->name}}
                     @endif
                    <span></span> {{$product->name}}
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="product-detail accordion-detail">
                            <div class="row mb-50">
                                <div class="col-md-6 col-sm-12 col-xs-12" wire:ignore>
                                    <div class="detail-gallery">
                                        <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                        <!-- MAIN SLIDES -->
                                        <div class="product-image-slider">

                                            <figure class="border-radius-10">
                                                <img src="{{asset('website/imgs/shop/product')}}/{{$product->image}}" alt="{{$product->name}}">
                                            </figure>

                                            @php
                                             $images = explode(",",$product->images);
                                            @endphp
                                            
                                            @foreach($images as $image)
                                            @if($image)
                                            <figure class="border-radius-10">
                                                <img src="{{asset('website/imgs/shop/product')}}/{{$image}}" alt="{{$product->name}}">
                                            </figure>
                                            @endif
                                            @endforeach

                                        </div>
                                        <!-- THUMBNAILS -->
                                        <div class="slider-nav-thumbnails pl-15 pr-15">

                                            <div><img src="{{asset('website/imgs/shop/product')}}/{{$product->image}}" alt="{{$product->name}}"></div>

                                            @foreach($images as $image)
                                              @if($image)
                                                 <div><img src="{{asset('website/imgs/shop/product')}}/{{$image}}" alt="{{$product->name}}"></div>
                                              @endif
                                            @endforeach
                                         
                                        </div>
                                    </div>
                                    <!-- End Gallery -->
                                    <div class="social-icons single-share">
                                        <ul class="text-grey-5 d-inline-block">
                                            <li><strong class="mr-10">Share this:</strong></li>
                                            <li class="social-facebook"><a href="#"><img src="{{asset('website/imgs/theme/icons/icon-facebook.svg')}}" alt=""></a></li>
                                            <li class="social-twitter"> <a href="#"><img src="{{asset('website/imgs/theme/icons/icon-twitter.svg')}}" alt=""></a></li>
                                            <li class="social-instagram"><a href="#"><img src="{{asset('website/imgs/theme/icons/icon-instagram.svg')}}" alt=""></a></li>
                                            <li class="social-linkedin"><a href="#"><img src="{{asset('website/imgs/theme/icons/icon-pinterest.svg')}}" alt=""></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-info">
                                        <h2 class="title-detail">{{$product->name}}</h2>
                                        <div class="product-detail-rating">
                                            @if($product->brand_id)
                                            <div class="pro-details-brand">
                                                <span> Brands: <a href="shop.html">{{$product->brand->name}}</a></span>
                                            </div>
                                            @endif
                                            <div class="product-rate-cover text-end">
                                                <div class="product-rate d-inline-block">
                                                    @php
                                                      $avgrating = 0;
                                                      $reviewcount = $product->orderitem->where('rstatus', 1)->count();
                                                    @endphp

                                                    @foreach($product->orderitem->where('rstatus', 1) as $orderitem)
                                                     @php
                                                       $avgrating = $avgrating + $orderitem->review->rating;
                                                     @endphp

                                                    @endforeach

                                                    @php
                                                     $rating = ($avgrating / $reviewcount) * 20;
                                                    @endphp


                                                    <div class="product-rating" style="width:@php echo $rating @endphp%">
                                                    </div>

                                                </div>
                                                <span class="font-small ml-5 text-muted"> ({{$product->orderitem->where('rstatus', 1)->count()}} reviews)</span>
                                            </div>
                                        </div>
                                        <div class="clearfix product-price-cover">
                                            <div class="product-price primary-color float-left">
                                                @if($product->dis_price)
                                                <ins><span class="text-brand">${{$product->price}}</span></ins>
                                                <ins><span class="old-price font-md ml-15">${{$product->dis_price}}</span></ins>
                                                @else
                                                <ins><span class="text-brand">${{$product->price}}</span></ins>
                                                @endif
                                                @if($product->dis_percent)
                                                <span class="save-price  font-md color3 ml-15">{{$product->dis_percent}} Off</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                        <div class="short-desc mb-30">
                                            <p>{{$product->short_desc}}</p>
                                        </div>
                                        <div class="product_sort_info font-xs mb-30">
                                            <ul>
                                                @if($product->warranty)
                                                <li class="mb-10"><i class="fi-rs-crown mr-5"></i> {{$product->warranty}}</li>
                                                @endif
                                                @if($product->return_policy)
                                                <li class="mb-10"><i class="fi-rs-refresh mr-5"></i> {{$product->return_policy}}</li>
                                                @endif
                                                @if($product->cash_on_delivery == 0)
                                                <li><i class="fi-rs-credit-card mr-5"></i> Cash on Delivery available</li>
                                                @else
                                                <li><i class="fi-rs-credit-card mr-5"></i> Cash on Delivery not available</li>
                                                @endif
                                            </ul>
                                        </div>
                                        
                                        <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                        @if($product->stock_status == 'instock')
                                        <div class="detail-extralink">
                                            <div class="detail-qty border radius">
                                                <a href="#" class="qty-down" wire:click.prevent="decressQuantity"><i class="fi-rs-angle-small-down"></i></a>
                                                <span class="qty-val">{{$qty}}</span>
                                                <a href="#" class="qty-up" wire:click.prevent="incressQuantity"><i class="fi-rs-angle-small-up"></i></a>
                                            </div>
                                            
                                            <div class="product-extra-link2">
                                                <button type="submit" class="button button-add-to-cart" wire:click.prevent="stor({{$product->id}},'{{$product->name}}',{{$product->price}})">Add to cart</button>

                                                @php
                                                $wishlist = Cart::instance('wishlist')->content()->pluck('id');
                                                 @endphp

                                                @if($wishlist->contains($product->id))
                                                <a style="background-color: #F15412 !important;border: 1px solid transparent; color: #ffffff;" aria-label="Add To Wishlist" class="action-btn hover-up" href="#" wire:click.prevent="removeWishList({{$product->id}})"><i class="fi-rs-heart"></i></a>
                                                @else
                                                <a aria-label="Add To Wishlist" class="action-btn hover-up" href="#"wire:click.prevent="addToWishList({{$product->id}},'{{$product->name}}',{{$product->price}})"><i class="fi-rs-heart"></i></a>
                                                @endif

                                                <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                                            </div>
                                        </div>
                                        @endif
                                        <ul class="product-meta font-xs color-grey mt-50">
                                            <li class="mb-5">SKU: <a href="#">{{$product->sku}}</a></li>
                                            @if($product->tags)
                                            <li class="mb-5">Tags: <a href="#" rel="tag">{{$product->tags}}</a></li>
                                            @endif
                                            <li>Availability:<span class="in-stock text-success ml-5">
                                                @if($product->stock_status == 'instock')
                                                 {{$product->quantity}} Items In Stock
                                                 @else
                                                 Out Of Stock
                                                 @endif
                                            </span>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Detail Info -->
                                </div>
                            </div>
                            <div class="tab-style3">
                                <ul class="nav nav-tabs text-uppercase">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description">Description</a>
                                    </li>
                                    @if($product->additional_info)
                                    <li class="nav-item">
                                        <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab" href="#Additional-info">Additional info</a>
                                    </li>
                                    @endif
                                    <li class="nav-item">
                                        <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">Reviews ({{$product->orderitem->where('rstatus', 1)->count()}})</a>
                                    </li>
                                </ul>
                                <div class="tab-content shop_info_tab entry-main-content">
                                    <div class="tab-pane fade show active" id="Description">
                                        <div class="">
                                             <p>{{$product->description}}</p>
                                        </div>
                                    </div>
                                    @if($product->additional_info)
                                    <div class="tab-pane fade" id="Additional-info">
                                        <p>{{$product->additional_info}}</p>
                                    </div>
                                    @endif

                                    <div class="tab-pane fade" id="Reviews">
                                        <!--Comments-->
                                        <div class="comments-area">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <h4 class="mb-30">Customer questions & answers</h4>
                                                    <div class="comment-list">

                                                        @foreach($product->orderitem->where('rstatus', 1) as $orderitem)
                                                        <div class="single-comment justify-content-between d-flex">
                                                            <div class="user justify-content-between d-flex">
                                                                <div class="thumb text-center">
                                                                    <img src="{{asset('website/imgs/page/avatar-6.jpg')}}" alt="">
                                                                    <h6><a href="#">{{$orderitem->order->user->name}}</a></h6>
                                                                </div>
                                                                <div class="desc">
                                                                    <div class="product-rate d-inline-block">
                                                                        <div class="product-rating" style="width:@php echo $orderitem->review->rating * 20 @endphp%">
                                                                        </div>
                                                                    </div>
                                                                    <p>{{$orderitem->review->comment}}</p>
                                                                    <div class="d-flex justify-content-between">
                                                                        <div class="d-flex align-items-center">
                                                                            <p class="font-xs mr-30">{{Carbon\Carbon::parse($orderitem->review->created_at)->format('d F Y g:i A')}} </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                        <!--single-comment -->
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                   <!--  <h4 class="mb-30">Customer reviews</h4>
                                                    <div class="d-flex mb-30">
                                                        <div class="product-rate d-inline-block mr-15">
                                                            <div class="product-rating" style="width:90%">
                                                            </div>
                                                        </div>
                                                        <h6>4.8 out of 5</h6>
                                                    </div>
                                                    <div class="progress">
                                                        <span>5 star</span>
                                                        <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                                                    </div>
                                                    <div class="progress">
                                                        <span>4 star</span>
                                                        <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                                    </div>
                                                    <div class="progress">
                                                        <span>3 star</span>
                                                        <div class="progress-bar" role="progressbar" style="width: 45%;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">45%</div>
                                                    </div>
                                                    <div class="progress">
                                                        <span>2 star</span>
                                                        <div class="progress-bar" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">65%</div>
                                                    </div>
                                                    <div class="progress mb-30">
                                                        <span>1 star</span>
                                                        <div class="progress-bar" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">85%</div>
                                                    </div>
                                                    <a href="#" class="font-xs text-muted">How are ratings calculated?</a> -->
                                                </div>
                                            </div>
                                        </div>
                                        <!--comment form-->
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-60">
                                <div class="col-12">
                                    <h3 class="section-title style-1 mb-30">Related products</h3>
                                </div>
                                <div class="col-12">
                                    <div class="row related-products">

                                        @foreach($related_Products as $related_Product)

                                        <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                            <div class="product-cart-wrap small hover-up">
                                                <div class="product-img-action-wrap">
                                                    <div class="product-img product-img-zoom">
                                                        <a href="{{route('product.details',$related_Product->slug)}}">
                                                            <img class="default-img" src="{{asset('website/imgs/shop/product')}}/{{$related_Product->image}}" alt="">
                                                            @php
                                                              $images = explode(',',$related_Product->images);
                                                              $i = 0;
                                                            @endphp
                                                            @foreach($images as $image)
                                                             @if($i == 1)
                                                               @breack
                                                             @endif
                                                            <img class="hover-img" src="{{asset('website/imgs/shop/product')}}/{{$image}}" alt="">
                                                            @endforeach
                                                        </a>
                                                    </div>
                                                    <div class="product-action-1">
                                                        <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-search"></i></a>
                                                        <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="wishlist.php" tabindex="0"><i class="fi-rs-heart"></i></a>
                                                        <a aria-label="Compare" class="action-btn small hover-up" href="compare.php" tabindex="0"><i class="fi-rs-shuffle"></i></a>
                                                    </div>
                                                    <div class="product-badges product-badges-position product-badges-mrg">
                                                        <span class="hot">Hot</span>
                                                    </div>
                                                </div>
                                                <div class="product-content-wrap">
                                                    <h2><a href="{{route('product.details',$related_Product->slug)}}" tabindex="0">{{ Illuminate\Support\Str::limit($related_Product->name, 30, $end='...') }}</a></h2>
                                                    <div class="rating-result" title="90%">
                                                        <span>
                                                        </span>
                                                    </div>
                                                    <div class="product-price">
                                                        @if($related_Product->dis_price)
                                                        <span>${{$related_Product->price}} </span>
                                                        <span class="old-price">${{$related_Product->dis_price}}</span>
                                                        @else
                                                        <span>${{$related_Product->price}} </span>
                                                        @endif
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
                    <div class="col-lg-3 primary-sidebar sticky-sidebar">
                        <div class="widget-category mb-30">
                            <h5 class="section-title style-1 mb-30 wow fadeIn animated">Category</h5>
                            <ul class="categories">
                                @foreach($categories as $categorie)
                                <li><a href="{{route('category',['cat_slug'=>$categorie->slug])}}">{{$categorie->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="widget-category mb-30">
                            <h5 class="section-title style-1 mb-30 wow fadeIn animated">Brand</h5>
                            <ul class="categories">
                                @foreach($brands as $brand)
                                <li><a href="{{route('brand',$brand->slug)}}">{{$brand->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                      
                        <!-- Product sidebar Widget -->
                        <div class="sidebar-widget product-sidebar  mb-30 p-30 bg-grey border-radius-10">
                            <div class="widget-header position-relative mb-20 pb-10">
                                <h5 class="widget-title mb-10">Popular products</h5>
                                <div class="bt-1 border-color-1"></div>
                            </div>
                            @foreach($popular_products as $popular_product)
                            <div class="single-post clearfix">
                                <div class="image">
                                    <img src="{{asset('website/imgs/shop/product')}}/{{$popular_product->image}}" alt="{{$popular_product->name}}">
                                </div>
                                <div class="content pt-10">
                                    <h5><a href="{{route('product.details',$popular_product->slug)}}">{{ Illuminate\Support\Str::limit($popular_product->name, 30, $end='...') }}</a></h5>
                                    <p class="price mb-0 mt-5">${{$popular_product->price}}</p>
                                    <div class="product-rate">
                                        <div class="product-rating" style="width:90%"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>                        
                    </div>
                </div>
            </div>
        </section>
    </main>
   