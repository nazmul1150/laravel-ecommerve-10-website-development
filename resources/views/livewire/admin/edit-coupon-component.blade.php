@section('title')
Edit Coupon
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
                        <a class="btn btn-primary" href="{{route('admin.coupon')}}" role="button">
                           Back
                        </a>
                    </div>
              </div>
            </div>
            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                <p>Edit Coupon<p>
                   
                <form method="POST" action="" wire:submit.prevent="editCoupon">
                    @csrf
                   
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Name</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="name" placeholder="Name" wire:model="name">
                            @error('name') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Type</label>
                        <div class="col-sm-12 col-md-10">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="type" id="type_fixed" value="fixed" wire:model="type">
                              <label class="form-check-label" for="type_fixed">fixed</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="type" id="type_percent" value="percent" wire:model="type">
                              <label class="form-check-label" for="type_percent">percent</label>
                            </div>
                             @error('type') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Discount Value</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="dicount_value" placeholder="Discount Value" wire:model="dicount_value">
                            @error('dicount_value') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Price</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="price" placeholder="Price" wire:model="price">
                            @error('price') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Expiry Date</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" id="expiry_date" type="date" name="expiry_date" placeholder="Expiry Date" wire:model="expiry_date">
                            @error('expiry_date') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label"></label>
                        <div class="col-sm-12 col-md-10">
                            <input type="submit" value="Update Coupon" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
