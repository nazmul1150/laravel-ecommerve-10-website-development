@section('title')
wishlist
@endsection

<main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> Shop
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shop-product-fillter">
                            <div class="totall-product">
                                <p> We found <strong class="text-brand">{{Cart::instance('wishlist')->count()}}</strong> items for you!</p>
                            </div>
                        </div>
                        <div class="row product-grid-3">

                            @if(Cart::instance('wishlist')->content()->count() > 0)
                            
                            @foreach(Cart::instance('wishlist')->content() as $product)
                            <div class="col-lg-4 col-md-4 col-6 col-sm-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{route('product.details',['p_slug'=>$product->model->slug])}}">
                                                <img class="default-img" src="{{asset('website/imgs/shop/product')}}/{{$product->model->image}}" alt="{{$product->model->name}}">
                                                @php
                                                  $images = explode(',',$product->model->images);
                                                  $i = 0;
                                                @endphp
                                                @foreach($images as $image)
                                                 @if($i == 1)
                                                   @breack
                                                 @endif
                                                <img class="hover-img" src="{{asset('website/imgs/shop/product')}}/{{$image}}" alt="{{$product->model->name}}">
                                                @endforeach
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                                <i class="fi-rs-search"></i></a>
                                             
                                            <a style="background-color: #F15412 !important;border: 1px solid transparent; color: #ffffff;" aria-label="Add To Wishlist" class="action-btn hover-up wishlist-active" href="#" wire:click.prevent="removeWishList({{$product->model->id}})"><i class="fi-rs-heart"></i></a>
                                           

                                            <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">Hot</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="#">{{$product->model->category->name}}</a>
                                        </div>
                                        <h2><a href="{{route('product.details',['p_slug'=>$product->model->slug])}}">{{ Illuminate\Support\Str::limit($product->model->name, 30, $end='...') }}</a></h2>

                                        <div class="rating-result" title="90%">
                                            <span>
                                                <span>90%</span>
                                            </span>
                                        </div>

                                        <div class="product-price">
                                            @if($product->model->dis_price)
                                            <span>${{$product->model->price}} </span>
                                            <span class="old-price">${{$product->model->dis_price}}</span>
                                            @else
                                            <span>${{$product->model->price}} </span>
                                            @endif
                                        </div>
                                        @if($product->model->stock_status == 'instock')
                                        <div class="product-action-1 show">
                                            <a aria-label="Add To Cart" class="action-btn hover-up" href="#" wire:click.prevent="moveProductFormCArt('{{$product->rowId}}')"><i class="fi-rs-shopping-bag-add"></i></a>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            @else

                            <p>wishlist Empty!</p>

                            @endif

                        </div>

                    </div>

                </div>
            </div>
        </section>
    </main>
    