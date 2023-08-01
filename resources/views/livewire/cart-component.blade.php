@section('title')
Cart page
@endsection

<main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> Shop
                    <span></span> Your Cart
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">

                            @if(session()->has('message'))
                             <div class="alert alert-success alert-dismissible fade show">
                                {{session()->get('message')}}
                              </div>
                            @endif


                             @if(Cart::instance('cart')->count() > 0)
                            
                            <table class="table shopping-summery text-center clean">
                                <thead>
                                    <tr class="main-heading">
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Subtotal</th>
                                        <th scope="col">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>

                                   @foreach(Cart::instance('cart')->content() as $data)
                                    <tr>
                                        <td class="image product-thumbnail"><img src="{{asset('website/imgs/shop/product')}}/{{$data->model->image}}" alt="{{$data->model->name}}"></td>
                                        <td class="product-des product-name">
                                            <h5 class="product-name"><a href="{{route('product.details',$data->model->slug)}}">{{$data->model->name}}</a></h5>
                                        </td>
                                        <td class="price" data-title="Price"><span>${{$data->model->price}} </span></td>
                                        <td class="text-center" data-title="Stock">
                                            <div class="detail-qty border radius  m-auto">
                                                <a href="#" class="qty-down" wire:click.prevent="decressQuantity('{{$data->rowId}}')"><i class="fi-rs-angle-small-down"></i></a>
                                                <span class="qty-val">{{$data->qty}}</span>
                                                <a href="#" class="qty-up" wire:click.prevent="incressQuantity('{{$data->rowId}}')"><i class="fi-rs-angle-small-up"></i></a>
                                            </div>
                                        </td>
                                        <td class="text-right" data-title="Cart">
                                            <span>${{$data->subtotal}} </span>
                                        </td>
                                        <td class="action" data-title="Remove"><a href="#" class="text-muted" wire:click.prevent="deleteCartProduct('{{$data->rowId}}')"><i class="fi-rs-trash"></i></a></td>
                                    </tr>

                                     @endforeach

                                    <tr>
                                        <td colspan="6" class="text-end">
                                            <a href="#" class="text-muted" wire:click.prevent="destroyCartitem()"> <i class="fi-rs-cross-small"></i> Clear Cart</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                           

                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                @if(Cart::instance('cart')->count() == 0)
                                 <p>No item in a Cart!</p>
                                @endif
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="cart-action text-end">
                                  <a class="btn" href="{{route('shop')}}"><i class="fi-rs-shopping-bag mr-10"></i>
                                    @if(Cart::instance('cart')->count() == 0)
                                      Shopping
                                    @else
                                     Continue Shopping
                                    @endif
                                  </a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div>
                        <div class="row mb-50">
                             @if(!session()->has('coupon'))
                            <div class="col-lg-6 col-md-12">
                                <div class="mb-30 mt-50">
                                    <div class="heading_s1 mb-3">
                                        <h4>Apply Coupon</h4>
                                    </div>
                                    @if(session()->has('coupon_message'))
                                     <div class="alert alert-danger alert-dismissible fade show">
                                        {{session()->get('coupon_message')}}
                                      </div>
                                    @endif
                                    <div class="total-amount">
                                        <div class="left">
                                            <div class="coupon">
                                                <form action="" method="post" wire:submit.prevent="applyCoupon">
                                                    @csrf
                                                    <div class="form-row row justify-content-center">
                                                        <div class="form-group col-lg-6">
                                                            <input class="font-medium" name="coupon_name" placeholder="Enter Your Coupon" wire:model="coupon_name">
                                                        </div>
                                                        <div class="form-group col-lg-6">
                                                            <button class="btn  btn-sm" type="submit"><i class="fi-rs-label mr-10"></i>Apply</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="col-lg-6 col-md-12">
                                <div class="border p-md-4 p-30 border-radius cart-totals">
                                    <div class="heading_s1 mb-3">
                                        <h4>Cart Totals</h4>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                
                                                <tr>
                                                    <td class="cart_total_label">Cart Subtotal</td>
                                                    <td class="cart_total_amount"><span class="font-lg fw-900 text-brand">${{Cart::instance('cart')->subtotal()}}</span></td>
                                                </tr>
                                                @if(session()->has('coupon'))
                                                <tr>
                                                    <td class="cart_total_label">Discount ({{session()->get('coupon')['name']}}) <a href="#" wire:click.prevent="removeCoupon"><i class="fi-rs-cross-small text-danger"></i> Clear Coupon</a></td>
                                                    <td class="cart_total_amount"><span class="font-lg fw-900 text-brand">-${{number_format($discount,2)}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="cart_total_label">Subtotal with Discount</td>
                                                    <td class="cart_total_amount"><span class="font-lg fw-900 text-brand">${{number_format($subtotalAfterdiscount,2)}}</span></td>
                                                </tr>
   
                                                <tr>
                                                    <td class="cart_total_label">Tax ({{config('cart.tax')}})</td>
                                                    <td class="cart_total_amount"><strong><span class="font-xl fw-900 text-brand">${{number_format($taxAfterdiscount,2)}}</span></strong></td>
                                                </tr>
                                                <tr>
                                                    <td class="cart_total_label">Shipping</td>
                                                    <td class="cart_total_amount"> <i class="ti-gift mr-5"></i> Free Shipping</td>
                                                </tr>
                                                <tr>
                                                    <td class="cart_total_label">Total</td>
                                                    <td class="cart_total_amount"><strong><span class="font-xl fw-900 text-brand">${{number_format($totalAfterdiscount,2)}}</span></strong></td>
                                                </tr>
                                                @else
                                                <tr>
                                                    <td class="cart_total_label">Tax</td>
                                                    <td class="cart_total_amount"><span class="font-lg fw-900 text-brand">${{Cart::instance('cart')->tax()}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="cart_total_label">Shipping</td>
                                                    <td class="cart_total_amount"> <i class="ti-gift mr-5"></i> Free Shipping</td>
                                                </tr>
                                                <tr>
                                                    <td class="cart_total_label">Total</td>
                                                    <td class="cart_total_amount"><strong><span class="font-xl fw-900 text-brand">${{Cart::instance('cart')->total()}}</span></strong></td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <a href="checkout.html" class="btn" wire:click.prevent="checkout"> <i class="fi-rs-box-alt mr-10"></i> Proceed To CheckOut</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
