@section('title')
Add Slider Home Page
@endsection

<div class="main-container">
    <div class="pd-ltr-20">
       <div class="min-height-200px">
         <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Slider</h4>
                            </div>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <a class="btn btn-primary" href="{{route('admin.sliderhomepage')}}" role="button">
                           Back
                        </a>
                    </div>
              </div>
            </div>
            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                <p>Add Slider Home Page<p>
                   
                <form method="POST" action="" wire:submit.prevent="addSliderHome" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Image</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="file" name="image" wire:model="image">
                            @error('image') <span class="text-danger">{{$message}}</span> @enderror
                            @if($image)
                             <br>
                             <img src="{{$image->temporaryUrl()}}" width="250">
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">SubTitle</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="subtitle" placeholder="SubTitle" wire:model="subtitle">
                            @error('subtitle') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Title 1</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="title1" placeholder="Title 1" wire:model="title1">
                            @error('title1') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Title 2</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="title2" placeholder="Title 2" wire:model="title2">
                            @error('title2') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Short Description</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="short_desc" placeholder="Short Description" wire:model="short_desc">
                            @error('short_desc') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Link</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="link" placeholder="Product Link" wire:model="link">
                            @error('link') <span class="text-danger">{{$message}}</span> @enderror
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
                            <input type="submit" value="Add Slider" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>