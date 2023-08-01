@section('title')
 Category
@endsection

<div class="main-container">
    <div class="pd-ltr-20">
       <div class="min-height-200px">
         <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Category</h4>
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
                     <h5 class="h5">Product Category</h5>
                   </div>
                </div>
                <div class="col-md-6 col-sm-12 mb-4">
                  <a class="btn btn-primary float-right" href="{{route('admin.add.product.category')}}" role="button">
                    Add Category
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
                           <th scope="col">Slug</th>
                           <th scope="col">Subcategory</th>
                           <th scope="col">Product</th>
                           <th scope="col">Status</th>
                           <th scope="col">Action</th>
                       </tr>
                   </thead>
                   <tbody>
                     @foreach($categorys as $category)
                       <tr>
                           <td>{{$category->id}}</td>
                           <td> <img src="{{asset('website/imgs/shop/category')}}/{{$category->image}}" width="50"> </td>
                           <td>{{$category->name}}</td>
                           <td>{{$category->slug}}</td>
                           <td>{{$category->subcat_count}}</td>
                           <td>{{$category->product_count}}</td>
                           <td>
                              @if($category->status == 0)
                                Active
                              @else
                                DeActive
                              @endif
                           </td>
                           <td>
                             <a href="{{route('admin.edit.product.category',$category->slug)}}" class="btn btn-sm btn-primary">Edit</a>
                             <a href="#" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure, You want to delete this Category?') || event.stopImmediatePropagation()" wire:click.prevent="deleteProductCategory({{$category->id}})">Delete</a>
                           </td>
                       </tr>
                     @endforeach
                     <tr>
                         <td colspan="9">
                            <div class="d-flex justify-content-end">
                            {{$categorys->links()}}
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