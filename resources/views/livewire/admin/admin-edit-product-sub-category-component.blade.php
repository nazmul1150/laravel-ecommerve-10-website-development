@section('title')
Edit SubCategory
@endsection

<div class="main-container">
    <div class="pd-ltr-20">
       <div class="min-height-200px">
         <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>SubCategory</h4>
                            </div>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <a class="btn btn-primary" href="{{route('admin.product.subcategory')}}" role="button">
                           Back
                        </a>
                    </div>
              </div>
            </div>
            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                <p>Edit Product Sub Category<p>
                   
                <form method="POST" action="" wire:submit.prevent="editProductSubCategory" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Image</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="file" name="image" wire:model="newimage">
                            <p class="text-black">image is optional</p>
                            @if($newimage)
                             <br>
                             <img src="{{$newimage->temporaryUrl()}}" width="150">
                             @else
                             <img src="{{asset('website/imgs/shop/subcategory')}}/{{$image}}" width="150">
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Name</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="name" placeholder="Name" wire:model="name">
                            @error('name') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Category</label>
                        <div class="col-sm-12 col-md-10">
                            <select class="form-control" name="category_id" wire:model="category_id">
                                <option selected>Select Sub Category</option>
                                @foreach($categorys as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Status</label>
                        <div class="col-sm-12 col-md-10">
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
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label"></label>
                        <div class="col-sm-12 col-md-10">
                            <input type="submit" value="Update sub Category" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>