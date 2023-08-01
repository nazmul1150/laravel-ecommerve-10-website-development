@section('title')
Product Category
@endsection

<main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> product
                    <span></span> {{$category_name}}
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="shop-product-fillter">
                            <div class="totall-product">
                                <p> We found <strong class="text-brand">{{$products->total()}}</strong> items for you!</p>
                            </div>
                            <div class="sort-by-product-area">
                                <div class="sort-by-cover mr-10">
                                    <div class="sort-by-product-wrap">
                                        <div class="sort-by">
                                            <span><i class="fi-rs-apps"></i>Show:</span>
                                        </div>
                                        <div class="sort-by-dropdown-wrap">
                                            <span> {{$pagesize}} <i class="fi-rs-angle-small-down"></i></span>
                                        </div>
                                    </div>
                                    <div class="sort-by-dropdown">
                                        <ul>
                                            <li><a class="{{$pagesize==12 ? 'active' : ''}}" href="#" wire:click.prevent="changePagesize(12)">12</a></li>
                                            <li><a class="{{$pagesize==15 ? 'active' : ''}}" href="#" wire:click.prevent="changePagesize(15)">15</a></li>
                                            <li><a class="{{$pagesize==25 ? 'active' : ''}}" href="#" wire:click.prevent="changePagesize(25)">25</a></li>
                                            <li><a class="{{$pagesize==32 ? 'active' : ''}}" href="#" wire:click.prevent="changePagesize(32)">32</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="sort-by-cover">
                                    <div class="sort-by-product-wrap">
                                        <div class="sort-by">
                                            <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                                        </div>
                                        <div class="sort-by-dropdown-wrap">
                                            <span> {{$orderBy}} <i class="fi-rs-angle-small-down"></i></span>
                                        </div>
                                    </div>
                                    <div class="sort-by-dropdown">
                                        <ul>
                                            <li><a  class="{{$orderBy=='Default Sorting' ? 'active' : ''}}" href="#" wire:click.prevent="changeOrderBy('Default Sorting')">Default Sorting</a></li>
                                            <li><a class="{{$orderBy=='Price: Low to High' ? 'active' : ''}}" href="#" wire:click.prevent="changeOrderBy('Price: Low to High')">Price: Low to High</a></li>
                                            <li><a class="{{$orderBy=='Price: High to Low' ? 'active' : ''}}" href="#" wire:click.prevent="changeOrderBy('Price: High to Low')">Price: High to Low</a></li>
                                            <li><a class="{{$orderBy=='Sort By Newness' ? 'active' : ''}}" href="#" wire:click.prevent="changeOrderBy('Sort By Newness')">Sort By Newness</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row product-grid-3">

                            @foreach($products as $product)
                            <div class="col-lg-4 col-md-4 col-6 col-sm-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{route('product.details',$product->slug)}}">
                                                <img class="default-img" src="{{asset('website/imgs/shop/product')}}/{{$product->image}}" alt="">
                                                @php
                                                  $images = explode(',',$product->images);
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
                                            <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                                <i class="fi-rs-search"></i></a>

                                            @php
                                             $wishlist = Cart::instance('wishlist')->content()->pluck('id');
                                             @endphp

                                            @if($wishlist->contains($product->id))
                                            <a style="background-color: #F15412 !important;border: 1px solid transparent; color: #ffffff;" aria-label="Add To Wishlist" class="action-btn hover-up wishlist-active" href="#" wire:click.prevent="removeWishList({{$product->id}})"><i class="fi-rs-heart"></i></a>
                                            @else
                                            <a aria-label="Add To Wishlist" class="action-btn hover-up" href="#" wire:click.prevent="addToWishList({{$product->id}},'{{$product->name}}',{{$product->price}})"><i class="fi-rs-heart"></i></a>
                                            @endif
                                            
                                            <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">Hot</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="#">{{$product->category->name}}</a>
                                        </div>
                                        <h2><a href="{{route('product.details',$product->slug)}}">{{ Illuminate\Support\Str::limit($product->name, 30, $end='...') }}</a></h2>

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
                                        @if($product->stock_status == 'instock')
                                        <div class="product-action-1 show">
                                            <a aria-label="Add To Cart" class="action-btn hover-up" href="#" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->price}})"><i class="fi-rs-shopping-bag-add"></i></a>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                        <!--pagination-->
                        <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                            <!-- <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-start">
                                    <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                    <li class="page-item"><a class="page-link" href="#">02</a></li>
                                    <li class="page-item"><a class="page-link" href="#">03</a></li>
                                    <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                                    <li class="page-item"><a class="page-link" href="#">16</a></li>
                                    <li class="page-item"><a class="page-link" href="#"><i class="fi-rs-angle-double-small-right"></i></a></li>
                                </ul>
                            </nav> -->
                            {{$products->links()}}
                        </div>
                    </div>
                    <div class="col-lg-3 primary-sidebar sticky-sidebar">
                        <div class="widget-category mb-30">
                            <h5 class="section-title style-1 mb-30 wow fadeIn animated">Category</h5>
                            <ul class="categories">
                                @foreach($categories as $category)
                                 <li><a href="{{route('category',['cat_slug'=>$category->slug])}}">{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- Fillter By Price -->
                        <div class="sidebar-widget price_range range mb-30">
                            <div class="widget-header position-relative mb-20 pb-10">
                                <h5 class="widget-title mb-10">Fillter by price</h5>
                                <div class="bt-1 border-color-1"></div>
                            </div>
                            <div class="price-filter">
                                <div class="price-filter-inner">
                                    <div id="slider-range" wire:ignore></div>
                                    <div class="price_slider_amount">
                                        <div class="label-input">
                                            <span>Range:</span><span class="text-info">${{$min_value}}</span> - <span class="text-info">${{$max_value}}</span>
                                            <!-- <input type="text" id="amount" name="price" placeholder="Add Your Price"> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <a href="shop.html" class="btn btn-sm btn-default"><i class="fi-rs-filter mr-5"></i> Fillter</a> -->
                        </div>
                        <div class="widget-category mb-30">
                            <h5 class="section-title style-1 mb-30 wow fadeIn animated">Brands</h5>
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
                                    <img src="{{asset('website/imgs/shop/product')}}/{{$popular_product->image}}" alt="#">
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

@push('scripts')
    <script>
        var sliderrange = $('#slider-range');
        var amountprice = $('#amount');
        $(function() {
            sliderrange.slider({
                range: true,
                min: 0,
                max: 1000,
                values: [0, 1000],
                slide: function(event, ui) {
                    //amountprice.val("$" + ui.values[0] + " - $" + ui.values[1]);
                    @this.set('min_value',ui.values[0]);
                    @this.set('max_value',ui.values[1]);
                }
            });
            // amountprice.val("$" + sliderrange.slider("values", 0) +
            //     " - $" + sliderrange.slider("values", 1));
        }); 
        
        Livewire.restart();
    </script>
@endpush
    