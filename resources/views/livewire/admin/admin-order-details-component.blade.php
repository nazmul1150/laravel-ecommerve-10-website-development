@section('title')
 Order Details
@endsection

<div class="main-container">
    <div class="pd-ltr-20">
       <div class="min-height-200px">
         <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Order Id: {{$order->id}}</h4>
                            </div>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <a class="btn btn-primary" href="{{route('admin.order')}}" role="button">
                           Back
                        </a>
                    </div>
              </div>
            </div>

            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                   <div class="title">
                     <h5 class="h5">Order Items</h5>
                   </div>
                   <table class="table table-striped">
                   <thead>
                       <tr>
                           <th scope="col">Image</th>
                           <th scope="col">Name</th>
                           <th scope="col">Price</th>
                           <th scope="col">Quantity</th>
                           <th scope="col">Subtotal</th>
                       </tr>
                   </thead>
                   <tbody>
                    @foreach($order->orderitem as $item)
                       <tr>
                           <td>
                               <a href="{{route('product.details',$item->product->slug)}}">
                                <img src="{{asset('website/imgs/shop/product')}}/{{$item->product->image}}" alt="{{$item->product->name}}" width="100" />
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
                       </tr>
                    @endforeach
                   </tbody>
               </table>
            </div>

            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                   <div class="title">
                     <h5 class="h5">Order Summary</h5>
                   </div>
                   <table class="table table-striped">
                   <thead>
                       <tr>
                           <th scope="col">Subtotal</th>
                           <th scope="col">Discount</th>
                           <th scope="col">Tax</th>
                           <th scope="col">Shipping</th>
                           <th scope="col">Total</th>
                       </tr>
                   </thead>
                   <tbody>
                       <tr>
                           <td>{{$order->subtotal}}</td>
                           <td>{{$order->discount}}</td>
                           <td>{{$order->tax}}</td>
                           <td>Free Shipping</td>
                           <td>{{$order->total}}</td>
                       </tr>
                   </tbody>
               </table>
            </div>

            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                   <div class="title">
                     <h5 class="h5">Order Details</h5>
                   </div>

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

            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                   <div class="title">
                     <h5 class="h5">Billing Details</h5>
                   </div>
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
            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                   <div class="title">
                     <h5 class="h5">Shipping Details</h5>
                   </div>
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

            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                   <div class="title">
                     <h5 class="h5">Transaction Details</h5>
                   </div>
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

            <br>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.restart();
    </script>
@endpush