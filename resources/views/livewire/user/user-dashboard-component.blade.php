@section('title')
 User Dashboart
@endsection
<main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>                    
                    <span></span> My Account
                </div>
            </div>
        </div>
        <section class="pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 m-auto">
                        <div class="row">
                            @if(session()->has('message'))
                                 <div class="alert alert-success alert-dismissible fade show">{{session()->get('message')}}</div>
                            @endif
                            <div class="col-md-4">
                                <div class="dashboard-menu">
                                    <ul class="nav flex-column" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>Orders</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="track-orders-tab" data-bs-toggle="tab" href="#track-orders" role="tab" aria-controls="track-orders" aria-selected="false"><i class="fi-rs-shopping-cart-check mr-10"></i>Track Your Order</a>
                                        </li>
                                        <!-- <li class="nav-item">
                                            <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true"><i class="fi-rs-marker mr-10"></i>My Address</a>
                                        </li> -->
                                        <li class="nav-item">
                                            <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="fi-rs-user mr-10"></i>Change Password</a>
                                        </li>
                                        <li class="nav-item">
                                            <form method="POST" action="{{route('logout')}}">
                                             @csrf
                                                <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault();this.closest('form').submit();"><i class="fi-rs-sign-out mr-10"></i>Logout</a>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="tab-content dashboard-content">
                                    <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="mb-0">Hello {{Auth::user()->name}}! </h5>
                                            </div>
                                            <div class="card-body">
                                                <p>From your account dashboard. you can easily check &amp; view your <a href="#">recent orders</a>, manage your <a href="#">shipping and billing addresses</a> and <a href="#">edit your password and account details.</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="mb-0">Your Orders</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">

                                                    @if($orders->count() > 0)
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Order</th>
                                                                <th>Date</th>
                                                                <th>Status</th>
                                                                <th>Total</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                              $i=0;
                                                              $quantity = 0;
                                                            @endphp
                                                            @foreach($orders as $order)
                                                            <tr>
                                                                <td>{{$order->id}}</td>
                                                                <td>{{$order->created_at}}</td>
                                                                <td>
                                                                    @if($order->status == 'ordered')
                                                                     Processing
                                                                    @elseif($order->status == 'panding')
                                                                    Panding
                                                                    @elseif($order->status == 'delivered')
                                                                    Delivered
                                                                    @elseif($order->status == 'canceled')
                                                                    Canceled
                                                                    @endif
                                                                </td>
                                                                <td>${{$order->total}}</td>
                                                                <td>
                                                                    <a href="{{route('orderdetails',$order->id)}}" class="btn-small d-block">View</a>
                                                                    @if($order->status == 'ordered')
                                                                    <a href="#" class="btn-small d-block" onclick="return confirm('Are you sure, You want to cancel this Order?') || event.stopImmediatePropagation()" wire:click.prevent="updateOrderStatus({{$order->id}},'canceled')">Cancel</a>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                             <tr>
                                                                 <td colspan="5">
                                                                    <div class="pagination-area mt-15 mb-sm-5 mb-lg-0 d-flex justify-content-end">
                                                                    {{$orders->links()}}
                                                                    </div>
                                                                </td>
                                                             </tr>
                                                        </tbody>
                                                    </table>
                                                    @else
                                                    <div class="text-center">
                                                    <h3>Your Order is Empty</h3>
                                                    <br>
                                                    <a href="{{route('shop')}}" class="btn btn-submit btn-sm">Shop Now</a>
                                                    </div>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="track-orders" role="tabpanel" aria-labelledby="track-orders-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="mb-0">Orders tracking</h5>
                                            </div>
                                            <div class="card-body contact-from-area">
                                                <p>To track your order please enter your OrderID in the box below and press "Track" button. This was given to you on your receipt and in the confirmation email you should have received.</p>
                                                <div class="row">
                                                    <div class="col-lg-8">
                                                        <form class="contact-form-style mt-30 mb-50" action="#" method="post">
                                                            <div class="input-style mb-20">
                                                                <label>Order ID</label>
                                                                <input name="order-id" placeholder="Found in your order confirmation email" type="text" class="square">
                                                            </div>
                                                            <div class="input-style mb-20">
                                                                <label>Billing email</label>
                                                                <input name="billing-email" placeholder="Email you used during checkout" type="email" class="square">
                                                            </div>
                                                            <button class="submit submit-auto-width" type="submit">Track</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="card mb-3 mb-lg-0">
                                                    <div class="card-header">
                                                        <h5 class="mb-0">Billing Address</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <address>000 Interstate<br> 00 Business Spur,<br> Sault Ste. <br>Marie, MI 00000</address>
                                                        <p>New York</p>
                                                        <a href="#" class="btn-small">Edit</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="mb-0">Shipping Address</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <address>4299 Express Lane<br>
                                                            Sarasota, <br>FL 00000 USA <br>Phone: 1.000.000.0000</address>
                                                        <p>Sarasota</p>
                                                        <a href="#" class="btn-small">Edit</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->

                                    <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Change Password</h5>
                                            </div>
                                            <div class="card-body">
                                                <p>Already have an account? <a href="{{route('login')}}">Log in instead!</a></p>

                                                @if(Session::has('password_success'))
                                                    <div class="alert alert-success" role="alert">{{Session::get('password_success')}}</div>
                                                @endif
                                         
                                                <form method="post" name="enq" wire:submit.prevent="changePassword">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label>Current Password <span class="required">*</span></label>
                                                            <input type="password" class="form-control square" placeholder="Current Password" name="current_password" wire:model="current_password" />
                                                            @error('current_password') <p class="text-danger">{{$message}}</p> @enderror
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>New Password <span class="required">*</span></label>
                                                            <input type="password" class="form-control square" placeholder="New Password" name="password" wire:model="password" />
                                                            @error('password') <p class="text-danger">{{$message}}</p> @enderror
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Confirm Password <span class="required">*</span></label>
                                                            <input type="password" class="form-control square" placeholder="Confirm Password" name="password_confirmation" wire:model="password_confirmation" />
                                                            @error('password_confirmation') <p class="text-danger">{{$message}}</p> @enderror
                                                        </div>
                                                        <div class="col-md-12">
                                                            <button type="submit" class="btn btn-fill-out submit" name="submit" value="Submit">Save</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@push('scripts')
    <script>
        Livewire.restart();
    </script>
@endpush
    