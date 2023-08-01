@section('title')
 Coupon
@endsection

<div class="main-container">
    <div class="pd-ltr-20">
       <div class="min-height-200px">
         <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Coupon</h4>
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
                     <h5 class="h5">Coupon</h5>
                   </div>
                </div>
                <div class="col-md-6 col-sm-12 mb-4">
                  <a class="btn btn-primary float-right" href="{{route('admin.add.coupon')}}" role="button">
                    Add Coupon
                   </a>
                </div>
               </div>

                @if(session()->has('message'))
                     <div class="alert alert-success alert-dismissible fade show">{{session()->get('message')}}</div>
                @endif

               <table class="table">
                   <thead>
                       <tr>
                           <th scope="col">#</th>
                           <th scope="col">Name</th>
                           <th scope="col">Type</th>
                           <th scope="col">Discount</th>
                           <th scope="col">Price</th>
                           <th scope="col">Expiry Date</th>
                           <th scope="col">Action</th>
                       </tr>
                   </thead>
                   <tbody>
                     @foreach($coupons as $coupon)
                       <tr>
                           <td>{{$coupon->id}}</td>
                           <td>{{$coupon->name}}</td>
                           <td>
                              @if($coupon->type == 'fixed')
                                fixed
                              @else
                                %
                              @endif
                           </td>
                           <td>
                              @if($coupon->type == 'fixed')
                                ${{$coupon->dicount_value}}
                              @else
                                {{$coupon->dicount_value}}%
                              @endif
                           </td>
                           <td>{{$coupon->price}}</td>
                           <td>{{$coupon->expiry_date}}</td>
                           <td>
                             <a href="{{route('admin.edit.coupon',$coupon->id)}}" class="btn btn-sm btn-primary">Edit</a>
                             <a href="#" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure, You want to delete this Coupon?') || event.stopImmediatePropagation()" wire:click.prevent="deleteCoupon({{$coupon->id}})">Delete</a>
                           </td>
                       </tr>
                     @endforeach
                     <tr>
                         <td colspan="9">
                            <div class="d-flex justify-content-end">
                            {{$coupons->links()}}
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