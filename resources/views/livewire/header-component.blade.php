<header class="header-area header-style-1 header-height-2">
        <div class="header-top header-top-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-4">
                        <div class="header-info">
                        <ul>
                                <li>
                                    <a class="language-dropdown-active" href="#"> <i class="fi-rs-world"></i> English <i class="fi-rs-angle-small-down"></i></a>
                                    <ul class="language-dropdown">
                                        <li><a href="#"><img src="{{asset('website/imgs/theme/flag-fr.png')}}" alt="">Français</a></li>
                                        <li><a href="#"><img src="{{asset('website/imgs/theme/flag-dt.png')}}" alt="">Deutsch</a></li>
                                        <li><a href="#"><img src="{{asset('website/imgs/theme/flag-ru.png')}}" alt="">Pусский</a></li>
                                    </ul>
                                </li>                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-4">
                        <div class="text-center">
                            <div id="news-flash" class="d-inline-block">
                                <ul>
                                    @foreach($news_top as $data)
                                    @if($data->status == 0)
                                    <li>{{$data->title}} @if($data->link)<a href="{{$data->link}}">{{$data->link_name}}</a>@endif</li>
                                    @endif
                                   @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <div class="header-info header-info-right">
                            <ul>

                             @auth
                             <li><i class="fi-rs-key"></i><a href="javascript:void(0)">{{Auth::user()->name}}</a>  / 
                                <form method="POST" action="{{ route('logout') }}">
                                     @csrf
                                     <a href="{{route('logout')}}" onclick="event.preventDefault();this.closest('form').submit();">Logout</a>
                                </form>
                             </li>
                             @else
                             <li><i class="fi-rs-key"></i><a href="{{route('login')}}">Log In </a>  / <a href="{{route('register')}}">Sign Up</a></li>
                             @endif 
                                                         
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="header-wrap">
                    <div class="logo logo-width-1">
                        <a href="/"><img src="{{asset('website/imgs/logo')}}/{{$logo->logo}}" alt="logo"></a>
                    </div>
                    <div class="header-right">

                        <livewire:header-search-component />
                        
                        <div class="header-action-right">
                            <div class="header-action-2">
                                <livewire:wishlist-count-component />
                                <div class="header-action-icon-2">
                                    <a class="mini-cart-icon" href="{{route('cart')}}">
                                        <img alt="Surfside Media" src="{{asset('website/imgs/theme/icons/icon-cart.svg')}}">
                                        <span class="pro-count blue">
                                            @if(Cart::instance('cart')->count() > 0)
                                            {{Cart::instance('cart')->count()}}
                                            @else
                                            0
                                            @endif
                                        </span>
                                    </a>

                                    <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                        @if(Cart::instance('cart')->count() > 0)
                                        <ul>
                                            @foreach(Cart::instance('cart')->content() as $data)
                                            <li style="flex-wrap: inherit;">
                                                <div class="shopping-cart-img">
                                                    <a href="{{route('product.details',$data->model->slug)}}"><img alt="{{$data->model->name}}" src="{{asset('website/imgs/shop/product')}}/{{$data->model->image}}" width="100"></a>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h4><a href="{{route('product.details',$data->model->slug)}}">{{$data->model->name}}</a></h4>
                                                    <h4><span>{{$data->qty}} × </span>${{$data->model->price}}</h4>
                                                </div>
                                                <div class="shopping-cart-delete">
                                                    <a href="#" wire:click.prevent="deleteCartProduct('{{$data->rowId}}')"><i class="fi-rs-cross-small"></i></a>
                                                </div>
                                            </li>
                                            @endforeach

                                        </ul>
                                        <div class="shopping-cart-footer">
                                            <div class="shopping-cart-total">
                                                <h4>Total <span>${{Cart::instance('cart')->total()}}</span></h4>
                                            </div>
                                            <div class="shopping-cart-button">
                                                <a href="{{route('cart')}}" class="outline">View cart</a>
                                                <a href="{{route('checkout')}}">Checkout</a>
                                            </div>
                                        </div>
                                        @else
                                        <p>No item in a Cart!</p>
                                         @endif
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom header-bottom-bg-color sticky-bar">
            <div class="container">
                <div class="header-wrap header-space-between position-relative">
                    <div class="logo logo-width-1 d-block d-lg-none">
                        <a href="index.html"><img src="{{asset('website/imgs/logo/logo.png')}}" alt="logo"></a>
                    </div>
                    <div class="header-nav d-none d-lg-flex">
                        <div class="main-categori-wrap d-none d-lg-block">
                            <a class="categori-button-active" href="#">
                                <span class="fi-rs-apps"></span> Browse Categories
                            </a>
                            <div class="categori-dropdown-wrap categori-dropdown-active-large">
                                <ul>
                                    @foreach($categorys as $category)

                                   
                                    <li class="has-children">
                                        <a href="{{route('category',$category->slug)}}"><i class="{{count($category->subcategory) > 0 ? 'surfsidemedia-font-dress' : 'surfsidemedia-font-desktop'}}"></i>{{$category->name}}</a>
                                         @if(count($category->subcategory) > 0)
                                        <div class="dropdown-menu">
                                            <ul class="mega-menu d-lg-flex">
                                                <li class="mega-menu-col col-lg-7">
                                                    <ul class="d-lg-flex">
                                                        <li class="mega-menu-col col-lg-6">
                                                            <ul>
                                                                @foreach($category->subcategory as $data)
                                                                <li>
                                                                    <a class="dropdown-item nav-link nav_item" href="{{route('subcategory',[$category->slug,$data->slug])}}">{{$data->name}}
                                                                    </a>
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                       
                                                    </ul>
                                                </li>
                                                
                                            </ul>
                                        </div>
                                        @endif
                                    </li>

                                    @endforeach

                                </ul>
                                <div class="more_categories">Show more...</div>
                            </div>
                        </div>
                        <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                            <nav>
                                <ul>
                                    <li><a class="active" href="/">Home </a></li>
                                    <li><a href="{{route('about')}}">About</a></li>
                                    <li><a href="{{route('shop')}}">Shop</a></li>
                                    </li>                                  
                                    <li><a href="{{route('contact')}}">Contact</a></li>

                                    @if(Route::has('login'))
                                     @auth
                                      @if(Auth::user()->utype === 'ADM')
                                        <li><a href="#">My Account<i class="fi-rs-angle-down"></i></a>
                                            <ul class="sub-menu">
                                                <li><a href="{{route('admin.dashboard')}}">Admin Dashboard</a></li>
                                                <li><a href="{{route('dashboard')}}">User Dashboard</a></li>
                                                <li>
                                                    <form method="POST" action="{{route('logout')}}">
                                                     @csrf
                                                       <a href="{{route('logout')}}" onclick="event.preventDefault();this.closest('form').submit();">Logout</a>
                                                    </form>
                                                </li>  
                                            </ul>
                                        </li>
                                      @else
                                           <li><a href="#">My Account<i class="fi-rs-angle-down"></i></a>
                                                <ul class="sub-menu">
                                                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                                                    <li><a href="#">Products</a></li>
                                                    <li><a href="#">Categories</a></li>
                                                    <li><a href="#">Coupons</a></li>
                                                    <li><a href="#">Orders</a></li>
                                                    <li><a href="#">Customers</a></li>
                                                    <li>
                                                        <form method="POST" action="{{route('logout')}}">
                                                         @csrf
                                                           <a href="{{route('logout')}}" onclick="event.preventDefault();this.closest('form').submit();">Logout</a>
                                                        </form>
                                                    </li>   
                                                </ul>
                                            </li>
                                      @endif
                                     @endif
                                    @endif

                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="hotline d-none d-lg-block">
                        <p><i class="fi-rs-smartphone"></i><span>Toll Free</span> {{$setting->phone}} </p>
                    </div>
                    <p class="mobile-promotion">Happy <span class="text-brand">Mother's Day</span>. Big Sale Up to 40%</p>
                    <div class="header-action-right d-block d-lg-none">
                        <div class="header-action-2">
                            <div class="header-action-icon-2">
                                <a href="shop-wishlist.php">
                                    <img alt="Surfside Media" src="{{asset('website/imgs/theme/icons/icon-heart.svg')}}">
                                    <span class="pro-count white">4</span>
                                </a>
                            </div>
                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon" href="{{route('cart')}}">
                                    <img alt="Surfside Media" src="{{asset('website/imgs/theme/icons/icon-cart.svg')}}">
                                    <span class="pro-count white">2</span>
                                </a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                    <ul>
                                        <li>
                                            <div class="shopping-cart-img">
                                                <a href="product-details.html"><img alt="Surfside Media" src="{{asset('website/imgs/shop/thumbnail-3.jpg')}}"></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="product-details.html">Plain Striola Shirts</a></h4>
                                                <h3><span>1 × </span>$800.00</h3>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <a href="#"><i class="fi-rs-cross-small"></i></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="shopping-cart-img">
                                                <a href="product-details.html"><img alt="Surfside Media" src="{{asset('website/imgs/shop/thumbnail-4.jpg')}}"></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="product-details.html">Macbook Pro 2022</a></h4>
                                                <h3><span>1 × </span>$3500.00</h3>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <a href="#"><i class="fi-rs-cross-small"></i></a>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="shopping-cart-footer">
                                        <div class="shopping-cart-total">
                                            <h4>Total <span>$383.00</span></h4>
                                        </div>
                                        <div class="shopping-cart-button">
                                            <a href="{{route('cart')}}">View cart</a>
                                            <a href="shop-checkout.php">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="header-action-icon-2 d-block d-lg-none">
                                <div class="burger-icon burger-icon-white">
                                    <span class="burger-icon-top"></span>
                                    <span class="burger-icon-mid"></span>
                                    <span class="burger-icon-bottom"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</header>
<div class="mobile-header-active mobile-header-wrapper-style">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                <div class="mobile-header-logo">
                    <a href="index.html"><img src="{{asset('website/imgs/logo/logo.png')}}" alt="logo"></a>
                </div>
                <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                    <button class="close-style search-close">
                        <i class="icon-top"></i>
                        <i class="icon-bottom"></i>
                    </button>
                </div>
            </div>
            <div class="mobile-header-content-area">
                <div class="mobile-search search-style-3 mobile-header-border">
                    <form action="#">
                        <input type="text" placeholder="Search for items…">
                        <button type="submit"><i class="fi-rs-search"></i></button>
                    </form>
                </div>
                <div class="mobile-menu-wrap mobile-header-border">
                    <div class="main-categori-wrap mobile-header-border">
                        <a class="categori-button-active-2" href="#">
                            <span class="fi-rs-apps"></span> Browse Categories
                        </a>
                        <div class="categori-dropdown-wrap categori-dropdown-active-small">
                            <ul>
                                <li><a href="shop.html"><i class="surfsidemedia-font-dress"></i>Women's Clothing</a></li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-tshirt"></i>Men's Clothing</a></li>
                                <li> <a href="shop.html"><i class="surfsidemedia-font-smartphone"></i> Cellphones</a></li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-desktop"></i>Computer & Office</a></li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-cpu"></i>Consumer Electronics</a></li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-home"></i>Home & Garden</a></li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-high-heels"></i>Shoes</a></li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-teddy-bear"></i>Mother & Kids</a></li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-kite"></i>Outdoor fun</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- mobile menu start -->
                    <nav>
                        <ul class="mobile-menu">
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="index.html">Home</a></li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="shop.html">shop</a></li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Our Collections</a>
                                <ul class="dropdown">
                                    <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Women's Fashion</a>
                                        <ul class="dropdown">
                                            <li><a href="product-details.html">Dresses</a></li>
                                            <li><a href="product-details.html">Blouses & Shirts</a></li>
                                            <li><a href="product-details.html">Hoodies & Sweatshirts</a></li>
                                            <li><a href="product-details.html">Women's Sets</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Men's Fashion</a>
                                        <ul class="dropdown">
                                            <li><a href="product-details.html">Jackets</a></li>
                                            <li><a href="product-details.html">Casual Faux Leather</a></li>
                                            <li><a href="product-details.html">Genuine Leather</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Technology</a>
                                        <ul class="dropdown">
                                            <li><a href="product-details.html">Gaming Laptops</a></li>
                                            <li><a href="product-details.html">Ultraslim Laptops</a></li>
                                            <li><a href="product-details.html">Tablets</a></li>
                                            <li><a href="product-details.html">Laptop Accessories</a></li>
                                            <li><a href="product-details.html">Tablet Accessories</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="blog.html">Blog</a></li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Language</a>
                                <ul class="dropdown">
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">German</a></li>
                                    <li><a href="#">Spanish</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <!-- mobile menu end -->
                </div>
                <div class="mobile-header-info-wrap mobile-header-border">
                    <div class="single-mobile-header-info mt-30">
                        <a href="contact.html"> Our location </a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="login.html">Log In </a>                        
                    </div>
                    <div class="single-mobile-header-info">                        
                        <a href="register.html">Sign Up</a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="#">(+1) 0000-000-000 </a>
                    </div>
                </div>
                <div class="mobile-social-icon">
                    <h5 class="mb-15 text-grey-4">Follow Us</h5>
                    <a href="#"><img src="{{asset('website/imgs/theme/icons/icon-facebook.svg')}}" alt=""></a>
                    <a href="#"><img src="{{asset('website/imgs/theme/icons/icon-twitter.svg')}}" alt=""></a>
                    <a href="#"><img src="{{asset('website/imgs/theme/icons/icon-instagram.svg')}}" alt=""></a>
                    <a href="#"><img src="{{asset('website/imgs/theme/icons/icon-pinterest.svg')}}" alt=""></a>
                    <a href="#"><img src="{{asset('website/imgs/theme/icons/icon-youtube.svg')}}" alt=""></a>
                </div>
            </div>
        </div>
</div>
