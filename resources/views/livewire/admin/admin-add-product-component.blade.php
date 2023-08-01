@section('title')
Add Product
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
                        <a class="btn btn-primary" href="{{route('admin.product')}}" role="button">
                           Back
                        </a>
                    </div>
              </div>
            </div>
            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                <p>Add Product<p>
                   
                <form method="POST" action="" wire:submit.prevent="addProduct" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="col-form-label">Image</label>
                        <div>
                            <input class="form-control" type="file" name="image" wire:model="image">
                            @error('image') <span class="text-danger">{{$message}}</span> @enderror
                            @if($image)
                             <br>
                             <img src="{{$image->temporaryUrl()}}" width="120">
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Images</label>
                        <div>
                            <input class="form-control" type="file" name="image" wire:model="images" multiple>
                            @if($images)
                             <br>
                             @foreach($images as $image)
                              <img src="{{$image->temporaryUrl()}}" width="120">
                              @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Name</label>
                        <div>
                            <input class="form-control" type="text" name="name" placeholder="Name" wire:model="name">
                            @error('name') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                          <div class="form-group">
                            <label class="col-form-label">Price</label>
                            <div>
                            <input class="form-control" type="text" name="price" placeholder="Price" wire:model="price">
                            @error('price') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                          <div class="form-group">
                            <label class="col-form-label">Discount Price</label>
                            <div>
                            <input class="form-control" type="text" name="dis_price" placeholder="Discount Price" wire:model="dis_price">
                            </div>
                           </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-4">
                          <div class="form-group">
                            <label class="col-form-label">Name Discount %</label>
                            <div>
                                <input class="form-control" type="text" name="dis_percent" placeholder="1%" wire:model="dis_percent">
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                          <div class="form-group ">
                            <label class="col-form-label">Warranty</label>
                            <div>
                                <input class="form-control" type="text" name="warranty" placeholder="Warranty" wire:model="warranty">
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                          <div class="form-group">
                            <label class="col-form-label">Return Policy</label>
                            <div>
                                <input class="form-control" type="text" name="return_policy" placeholder="Return Policy" wire:model="return_policy">
                            </div>
                          </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-4">
                         <div class="form-group">
                            <label class="col-form-label">Quantity</label>
                            <div>
                             <input class="form-control" type="text" name="quantity" placeholder="Quantity" wire:model="quantity">
                             @error('quantity') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                         </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                          <div class="form-group">
                            <label class="col-form-label">Sku</label>
                            <div>
                              <input class="form-control" type="text" name="sku" placeholder="Sku" wire:model="sku">
                              @error('sku') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                          <div class="form-group">
                            <label class="col-form-label">Tags</label>
                            <div>
                              <input class="form-control" type="text" name="tags" placeholder="Tags" wire:model="tags">
                            </div>
                          </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-form-label">Short Description</label>
                        <div>
                            <textarea class="form-control" name="short_desc" placeholder="Short Description" wire:model="short_desc"></textarea>
                            @error('short_desc') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <div class="form-group">

                        <label class="col-form-label">Description</label>
                        <div>
                            <textarea  class="form-control" name="description" placeholder="Description" wire:model="description"></textarea>
                            @error('description') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Additional Information</label>
                        <div>
                            <textarea  class="form-control" name="additional_info" placeholder="Additional Information" wire:model="additional_info"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-4">
                          <div class="form-group">
                            <label class="col-form-label">Category</label>
                            <div>
                                <select class="form-control" name="category_id" wire:model="category_id">
                                    <option selected>Select Category</option>

                                    @foreach($categorys as $category)
                                     <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('category_id') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                          <div class="form-group">
                            <label class="col-form-label">Subcategory</label>
                            <div>
                                <select class="form-control" name="subcategory_id" wire:model="subcategory_id">
                                    <option selected>Select SubCategory</option>
                                    @foreach($subcategorys as $subcategory)
                                     <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                         </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                          <div class="form-group">
                            <label class="col-form-label">Brand</label>
                            <div>
                                <select class="form-control" name="brand_id" wire:model="brand_id">
                                    <option selected>Select Brand</option>
                                    @foreach($brands as $brand)
                                     <option value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                         </div>
                        </div>
                    </div>

                    
                   <div class="row">
                      <div class="col-sm-12 col-md-3">
                        <div class="form-group">
                            <label class="col-form-label">Cash On Delivery</label>
                            <div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="cash_on_delivery" id="cash_on_delivery_active" value="0" wire:model="cash_on_delivery">
                                  <label class="form-check-label" for="cash_on_delivery_active">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="cash_on_delivery" id="cash_on_delivery_deactive" value="1" wire:model="cash_on_delivery">
                                  <label class="form-check-label" for="cash_on_delivery_deactive">No</label>
                                </div>
                            </div>
                        </div>
                      </div>
                    
                   <div class="col-sm-12 col-md-3">
                     <div class="form-group">
                        <label class="col-form-label">stock_status</label>
                        <div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="stock_status" id="stock_status_active" value="instock" wire:model="stock_status">
                              <label class="form-check-label" for="stock_status_active">instock</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="stock_status" id="stock_status_deactive" value="outofstock" wire:model="stock_status">
                              <label class="form-check-label" for="stock_status_deactive">outofstock</label>
                            </div>
                        </div>
                     </div>
                  </div>
                    
                    <div class="col-sm-12 col-md-3">
                      <div class="form-group">
                        <label class="col-form-label">Featured</label>
                        <div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="featured" id="featured_active" value="0" wire:model="featured">
                              <label class="form-check-label" for="featured_active">No</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="featured" id="featured_deactive" value="1" wire:model="featured">
                              <label class="form-check-label" for="featured_deactive">Yes</label>
                            </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-12 col-md-3">
                     <div class="form-group">
                        <label class="col-form-label">Status</label>
                        <div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="status" id="status_active" value="0" wire:model="status">
                              <label class="form-check-label" for="status_active">Active</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="status" id="status_deactive" value="1" wire:model="status">
                              <label class="form-check-label" for="status_deactive">DeActive</label>
                            </div>
                        </div>
                      </div>
                     </div>
                 </div>

                    <div class="form-group">
                            <input type="submit" value="Add Product" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@script('push')

@endscript