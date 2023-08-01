@section('title')
 Dashboard
@endsection

<div class="main-container">
        <div class="pd-ltr-20">
            <div class="card-box pd-20 height-100-p mb-30">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <img src="vendors/images/banner-img.png" alt="">
                    </div>
                    <div class="col-md-8">
                        <h4 class="font-20 weight-500 mb-10 text-capitalize">
                            Welcome back <div class="weight-600 font-30 text-blue">{{Auth::user()->name}}!</div>
                        </h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 mb-30">
                    <div class="card-box height-100-p widget-style1">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="progress-data">
                                <div id="chart"></div>
                            </div>
                            <div class="widget-data">
                                <div class="h4 mb-0">${{$totalRevenue}}</div>
                                <div class="weight-600 font-14">Total Revenue</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 mb-30">
                    <div class="card-box height-100-p widget-style1">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="progress-data">
                                <div id="chart2"></div>
                            </div>
                            <div class="widget-data">
                                <div class="h4 mb-0">${{$totalSales}}</div>
                                <div class="weight-600 font-14">Total Sales</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 mb-30">
                    <div class="card-box height-100-p widget-style1">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="progress-data">
                                <div id="chart3"></div>
                            </div>
                            <div class="widget-data">
                                <div class="h4 mb-0">${{$todayRevenue}}</div>
                                <div class="weight-600 font-14">Today Revenue</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 mb-30">
                    <div class="card-box height-100-p widget-style1">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="progress-data">
                                <div id="chart4"></div>
                            </div>
                            <div class="widget-data">
                                <div class="h4 mb-0">${{$todaySales}}</div>
                                <div class="weight-600 font-14">Today Sales</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-xl-8 mb-30">
                    <div class="card-box height-100-p pd-20">
                        <h2 class="h4 mb-20">Activity</h2>
                        <div id="chart5"></div>
                    </div>
                </div>
                <div class="col-xl-4 mb-30">
                    <div class="card-box height-100-p pd-20">
                        <h2 class="h4 mb-20">Lead Target</h2>
                        <div id="chart6"></div>
                    </div>
                </div>
            </div> -->
            <div class="card-box mb-30">
                <h2 class="h4 pd-20">Best Selling Products</h2>
                <table class="data-table table nowrap">
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
                           <th scope="col">Action</th>
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
                       </tr>
                     @endforeach
                     <tr>
                         <td colspan="14">
                            <div class="d-flex justify-content-end">
                            {{$orders->links()}}
                            </div>
                        </td>
                     </tr>
                   </tbody>
                </table>
            </div>
            <div class="footer-wrap pd-20 mb-20 card-box">
                Laravel Ecommerce single vendor website
            </div>
        </div>
    </div>