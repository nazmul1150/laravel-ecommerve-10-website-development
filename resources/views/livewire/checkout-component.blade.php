@section('title')
Checkout Page
@endsection

<main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> Checkout
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">

             <form method="POST" action="" wire:submit.prevent="placeOrder" onsubmit="$('#processing').show();">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-25">
                            <h4>Billing Details</h4>
                        </div>
                            <!-- belling address -->
                            <div class="form-group">
                                <input type="text" name="firstname" placeholder="First name *" wire:model="firstname">
                                 @error('firstname') <span class="error text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" name="lastname" placeholder="Last name *" wire:model="lastname">
                                @error('lastname') <span class="error text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" name="add1" placeholder="Address *" wire:model="add1">
                                @error('add1') <span class="error text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" name="add2" placeholder="Address line2" wire:model="add2">
                            </div>
                             <div class="form-group">
                                <input type="text" name="phone" placeholder="Phone *" wire:model="phone">
                                 @error('phone') <span class="error text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" name="email" placeholder="Email address *" wire:model="email">
                                @error('email') <span class="error text-danger">{{$message}}</span> @enderror
                            </div>

                            <div class="form-group">
                                <input type="text" name="city" placeholder="City / Town *" wire:model="city">
                                 @error('city') <span class="error text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" name="zipcode" placeholder="Postcode / ZIP *" wire:model="zipcode">
                                 @error('zipcode') <span class="error text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" name="country" value="Bangladesh" placeholder="Bangladesh" wire:model="country" disabled>
                            </div>
                            
                           
                            <!-- shipping address -->
                            <div class="ship_detail">
                                <div class="form-group">
                                    <div class="chek-form">
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox" name="is_shipping_different" id="differentaddress" value="1" wire:model="is_shipping_different">
                                            <label class="form-check-label label_info" for="differentaddress"><span>Ship to a different address?</span></label>
                                        </div>
                                    </div>
                                </div>

                            <!-- <div id="collapseAddress" class="different_address collapse in"> -->
                             @if($is_shipping_different)
                            <div class="form-group">
                                <input type="text" required=""  name="s_firstname" placeholder="First name *" wire:model="s_firstname">
                                 @error('s_firstname') <span class="error text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" required="" name="s_lastname" placeholder="Last name *" wire:model="s_lastname">
                                @error('s_lastname') <span class="error text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" required="" name="s_add1" placeholder="Address *" wire:model="s_add1">
                                @error('s_add1') <span class="error text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" name="s_add2" placeholder="Address line2" wire:model="s_add2">
                                @error('s_add2') <span class="error text-danger">{{$message}}</span> @enderror
                            </div>
                             <div class="form-group">
                                <input type="text" required="" name="s_phone" placeholder="Phone *" wire:model="s_phone">
                                @error('s_phone') <span class="error text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" required="" name="s_email" placeholder="Email address *" wire:model="s_email">
                                @error('s_email') <span class="error text-danger">{{$message}}</span> @enderror
                            </div>

                            <div class="form-group">
                                <input type="text" required="" name="s_city" placeholder="City / Town *" wire:model="s_city">
                                @error('s_city') <span class="error text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" required="" name="s_zipcode" placeholder="Postcode / ZIP *" wire:model="s_zipcode">
                                @error('s_zipcode') <span class="error text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" name="country" value="Bangladesh" placeholder="Bangladesh" wire:model="s_country" disabled>
                            </div>
                            @endif
                            <!-- </div> -->
                           
                            </div>
                    </div>

                    <div class="col-md-6">
                        <div class="order_review">
                            <div class="mb-20">
                                <h4>Your Orders</h4>
                            </div>
                            <div class="table-responsive order_table text-center">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach(Cart::instance('cart')->content() as $data)
                                        <tr>
                                            <td class="image product-thumbnail"><img src="{{asset('website/imgs/shop/product')}}/{{$data->model->image}}" alt="{{$data->model->name}}"></td>
                                            <td>
                                                <h5><a href="{{route('product.details',$data->model->slug)}}">{{$data->model->name}}</a></h5> <span class="product-qty">x {{$data->qty}}</span>
                                            </td>
                                            <td>${{$data->model->price}}</td>
                                        </tr>
                                       @endforeach

                                        <tr>
                                            <th>SubTotal</th>
                                            <td class="product-subtotal" colspan="2"><strong>${{session()->get('checkout')['subtotal']}}</strong></td>
                                        </tr>
                                        @if(session()->get('checkout')['discount'])
                                        <tr>
                                            <th>Discount</th>
                                            <td class="product-subtotal" colspan="2"><strong>-${{session()->get('checkout')['discount']}}</strong></td>
                                        </tr>
                                        @endif
                                        <tr>
                                            <th>Tax</th>
                                            <td colspan="2" class="product-subtotal"><strong>${{session()->get('checkout')['tax']}}</strong></td>
                                        </tr>
                                        <tr>
                                            <th>Shipping</th>
                                            <td colspan="2"><em><strong>Free Shipping</strong></em></td>
                                        </tr>
                                        <tr>
                                            <th>Total</th>
                                            <td colspan="2" class="product-subtotal"><span class="font-xl text-brand fw-900">${{session()->get('checkout')['total']}}</span></td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <div class="bt-1 border-color-1 mt-30 mb-30"></div>

                            <div class="payment_method">
                                <div class="mb-25">
                                    <h5>Payment</h5>
                                </div>
                                <div class="payment_option">
                                    <div class="custome-radio">
                                        <input class="form-check-input" required="" type="radio" name="paymentmode" id="exampleRadios3" value="cas" wire:model='paymentmode'>
                                        <label class="form-check-label" for="exampleRadios3">Cash On Delivery</label>                                        
                                    </div>
                                    <div class="custome-radio">
                                        <input class="form-check-input" required="" type="radio" name="paymentmode" id="exampleRadios4" value="cart" wire:model='paymentmode'>
                                        <label class="form-check-label" for="exampleRadios4">Card Payment</label>                                  
                                    </div>
                                    @if($paymentmode == 'cart')
                                        <div class="form-group">
                                            <input required="" type="text" name="cardnumber" placeholder="Card Number" />
                                        </div>
                                    @endif
                                </div>
                            </div>

                            @if($errors->isEmpty())
                                <div wire:ignore id="processing" style="font-size: 22px;margin-bottom: 20px;padding-left: 37px; color: green;display: none;">
                                    <i class="fa fa-spinner fa-pulse fa-fw"></i>
                                    <span>Processing...</span>
                                </div>
                            @endif
                            <button class="btn btn-fill-out mt-30" type="submit" value="Place Order">Place Order</button>
                        </div>
                    </div>

                </div>
             </form>

            </div>
        </section>
    </main>
