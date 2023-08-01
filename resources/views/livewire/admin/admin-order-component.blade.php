@section('title')
 New Order
@endsection

<div class="main-container">
    <div class="pd-ltr-20">
       <div class="min-height-200px">
         <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Order</h4>
                            </div>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <a class="btn btn-primary" href="{{route('admin.dashboard')}}" role="button">
                           Dashbord
                        </a>
                    </div>
              </div>
            </div>
            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
               <div class="row">
                <div class="col-md-6 col-sm-12 align-self-center">
                   <div class="title">
                     <h5 class="h5">New Order</h5>
                   </div>
                </div>
                <div class="col-md-6 col-sm-12 mb-4">
                  <!-- <a class="btn btn-primary float-right" href="{{route('admin.add.product.category')}}" role="button">
                    Add Category
                   </a> -->
                </div>
               </div>

                @if(session()->has('message'))
                     <div class="alert alert-success alert-dismissible fade show">{{session()->get('message')}}</div>
                @endif

               <table class="table">
                   <thead>
                       <tr>
                           <th scope="col">OrderId</th>
                           <th scope="col">Subtotal</th>
                           <th scope="col">Discount</th>
                           <th scope="col">Tax</th>
                           <th scope="col">Total</th>
                           <th scope="col">First Name</th>
                           <th scope="col">Last Name</th>
                           <th scope="col">Phone</th>
                           <th scope="col">Email</th>
                           <th scope="col">City</th>
                           <th scope="col">Zipcode</th>
                           <th scope="col">Status</th>
                           <th scope="col">Order Date</th>
                           <th scope="col" colspan="2" class="text-center">Action</th>
                       </tr>
                   </thead>
                   <tbody>
                     @foreach($orders as $order)
                       <tr>
                           <td>{{$order->id}}</td>
                           <td>{{$order->subtotal}}</td>
                           <td>{{$order->discount}}</td>
                           <td>{{$order->tax}}</td>
                           <td>{{$order->total}}</td>
                           <td>{{$order->firstname}}</td>
                           <td>{{$order->lastname}}</td>
                           <td>{{$order->phone}}</td>
                           <td>{{$order->email}}</td>
                           <td>{{$order->city}}</td>
                           <td>{{$order->zipcode}}</td>
                           <td>{{$order->status}}</td>
                           <td>{{$order->created_at}}</td>
                           <td>
                               <a href="{{route('admin.orderdetails',['order_id'=>$order->id])}}" class="btn btn-primary btn-sm">Details</a>
                           </td>
                           <td>
                               <div class="dropdown">
                                   <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown">Status<span class="caret"></span></button>
                                   <ul class="dropdown-menu">
                                       <li><a href="#" wire:click.prevent="updateOrderStatus({{$order->id}},'panding')">Panding</a></li>
                                       <li><a href="#" wire:click.prevent="updateOrderStatus({{$order->id}},'delivered')">Delivered</a></li>
                                       <li><a href="#" wire:click.prevent="updateOrderStatus({{$order->id}},'canceled')">Canceled</a></li>
                                   </ul>
                               </div>
                           </td>
                       </tr>
                     @endforeach
                     <tr>
                         <td colspan="15">
                            <div class="d-flex justify-content-end">
                            {{$orders->links()}}
                            </div>
                        </td>
                     </tr>
                   </tbody>
               </table>
            </div>
    
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.restart();
    </script>
@endpush