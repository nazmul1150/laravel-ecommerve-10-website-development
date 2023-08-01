@section('title')
 Product
@endsection

<div class="main-container">
    <div class="pd-ltr-20">
       <div class="min-height-200px">
         <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Product</h4>
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
                     <h5 class="h5">Products</h5>
                   </div>
                </div>
                <div class="col-md-6 col-sm-12 mb-4">
                  <a class="btn btn-primary float-right" href="{{route('admin.add.product')}}" role="button">
                    Add Product
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
                           <th scope="col">Image</th>
                           <th scope="col">Name</th>
                           <th scope="col">Price</th>
                           <th scope="col">Dis Price</th>
                           <th scope="col">Quantity</th>
                           <th scope="col">Category</th>
                           <th scope="col">SubCategory</th>
                           <th scope="col">Brand</th>
                           <th scope="col">Featured</th>
                           <th scope="col">Status</th>
                           <th scope="col">Action</th>
                       </tr>
                   </thead>
                   <tbody>
                     @foreach($products as $product)
                       <tr>
                           <td>{{$product->id}}</td>
                           <td> <img src="{{asset('website/imgs/shop/product')}}/{{$product->image}}" width="50"> </td>
                           <td>{{$product->name}}</td>
                           <td>{{$product->price}}</td>
                           <td>{{$product->dis_price}}</td>
                           <td>{{$product->quantity}}</td>
                           <td>{{$product->category->name}}</td>
                           <td>
                            @if($product->subcategory_id)
                            {{$product->subcategory->name}}
                            @endif
                           </td>
                           <td>
                            @if($product->brand_id)
                            {{$product->brand->name}}
                            @endif
                          </td>
                           <td>
                            @if($product->featured == 1)
                             yes
                            @else
                            no
                            @endif
                           </td>
                           <td>
                              @if($product->status == 0)
                                Active
                              @else
                                DeActive
                              @endif
                           </td>
                           <td>
                             <a href="{{route('admin.edit.product',$product->slug)}}" class="btn btn-sm btn-primary">Edit</a>
                             <a href="#" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure, You want to delete this Product?') || event.stopImmediatePropagation()" wire:click.prevent="deleteProduct({{$product->id}})">Delete</a>
                           </td>
                       </tr>
                     @endforeach
                     <tr>
                         <td colspan="12">
                            <div class="d-flex justify-content-end">
                            {{$products->links()}}
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