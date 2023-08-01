@section('title')
 Order Details
@endsection

<main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>                    
                    <span></span> <a href="{{route('dashboard')}}" rel="nofollow">Dashbord</a>
                    <span></span> Order Details
                </div>
            </div>
        </div>
            <div class="container">
                <div class="card p-3 mt-50 mb-30">
                     <h3 class="post-title mb-20">Order Items</h3>
                     <table class="table table-striped">
                       <thead>
                           <tr>
                               <th scope="col">Image</th>
                               <th scope="col">Name</th>
                               <th scope="col">Price</th>
                               <th scope="col">Quantity</th>
                               <th scope="col">Subtotal</th>
                               <th scope="col">Rstatus</th>
                           </tr>
                       </thead>
                       <tbody>
                        @foreach($order->orderitem as $item)
                           <tr>
                               <td>
                                   <a href="{{route('product.details',$item->product->slug)}}">
                                    <img src="{{asset('website/imgs/shop/product')}}/{{$item->product->image}}" alt="{{$item->product->name}}" width="60" />
                                    </a>
                               </td>
                               <td>
                                   <a href="{{route('product.details',$item->product->slug)}}">
                                    {{$item->product->name}}
                                    </a>
                               </td>
                               <td>{{$item->price}}</td>
                               <td>{{$item->quantity}}</td>
                               <td>{{$item->price * $item->quantity}}</td>
                               @if($order->status == 'delivered' && $item->rstatus == false)
                               <td>
                                   <a href="{{route('review',$item->id)}}">
                                     Write Review
                                    </a>
                               </td>
                               @elseif($item->rstatus == 1)
                                <td>
                                   yes
                                </td>
                                @else
                                <td>
                                   no
                                </td>
                               @endif
                           </tr>
                        @endforeach
                       </tbody>
                   </table>
                </div>
                <div class="card p-3 mb-30">
                     <h3 class="post-title mb-20">Order Details</h3>
                       <table class="table table-striped">
                           <tr>
                               <th>Order Id :</th>
                               <td>{{$order->id}}</td>
                               <th>Order Date :</th>
                               <td>{{$order->created_at}}</td>
                               <th>Status :</th>
                               <td>{{$order->status}}</td>
                               @if($order->status == 'delivered')
                               <th>Delivery Date :</th>
                               <td>{{$order->delivery_date}}</td>
                               @endif
                               @if($order->status == 'canceled')
                               <th>Cancellation Date :</th>
                               <td>{{$order->cancel_date}}</td>
                               @endif
                           </tr>
                       </table>
                </div>
                <div class="card p-3 mb-30">
                        <h3 class="post-title mb-20">Billing Details</h3>
                        <table class="table table-striped">
                            <tr>
                                <th scope="col">First Name :</th>
                                <td>{{$order->firstname}}</td>
                                <th scope="col">Last Name :</th>
                                <td>{{$order->lastname}}</td>
                            </tr>
                            <tr>
                                <th scope="col">Phone :</th>
                                <td>{{$order->phone}}</td>
                                <th scope="col">Email :</th>
                                <td>{{$order->email}}</td>
                            </tr>
                            <tr>
                                <th scope="col">Address1 :</th>
                                <td>{{$order->add1}}</td>
                                <th scope="col">Address2 :</th>
                                <td>{{$order->add2}}</td>
                            </tr>
                            <tr>
                                <th scope="col">City :</th>
                                <td>{{$order->city}}</td>
                                <th scope="col">Zipcode :</th>
                                <td>{{$order->zipcode}}</td>
                            </tr>
                             <tr>
                                <th scope="col">County :</th>
                                <td>{{$order->country}}</td>
                                <th scope="col">Shipping Differtent :</th>
                                <td>{{$order->shipping_different == 1 ? 'Yes' : 'No'}}</td>
                            </tr>
                       </table>
                </div>
                @if($order->shipping_different == 1)
                <div class="card p-3 mb-30">
                     <h3 class="post-title mb-20">Shipping Details</h3>
                    <table class="table table-striped">
                        <tr>
                            <th scope="col">First Name :</th>
                            <td>{{$order->shipping->firstname}}</td>
                            <th scope="col">Last Name :</th>
                            <td>{{$order->shipping->lastname}}</td>
                        </tr>
                        <tr>
                            <th scope="col">Phone :</th>
                            <td>{{$order->shipping->phone}}</td>
                            <th scope="col">Email :</th>
                            <td>{{$order->shipping->email}}</td>
                        </tr>
                        <tr>
                            <th scope="col">Address1 :</th>
                            <td>{{$order->shipping->add1}}</td>
                            <th scope="col">Address2 :</th>
                            <td>{{$order->shipping->add2}}</td>
                        </tr>
                        <tr>
                            <th scope="col">City :</th>
                            <td>{{$order->shipping->city}}</td>
                            <th scope="col">Zipcode :</th>
                            <td>{{$order->shipping->zipcode}}</td>
                        </tr>
                   </table>
                </div>
                @endif
                <div class="card p-3 mb-50">
                    <h3 class="post-title mb-20">Transaction Details</h3>
                    <table class="table table-striped">
                        <tr>
                            <th scope="col">Transaction Mode :</th>
                            <td>{{$order->transaction->mode}}</td>
                        </tr>
                        <tr>
                            <th scope="col">Transaction Status :</th>
                            <td>{{$order->transaction->status}}</td>
                        </tr>
                        <tr>
                            <th scope="col">Transaction Date :</th>
                            <td>{{$order->transaction->created_at}}</td>
                        </tr>
                   </table>
                </div>
            </div>
</main>