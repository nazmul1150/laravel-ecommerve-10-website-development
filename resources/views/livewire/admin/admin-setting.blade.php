@section('title')
Setting page
@endsection

<div class="main-container">
    <div class="pd-ltr-20">
       <div class="min-height-200px">
         <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Settings</h4>
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
                <div class="title">
                       <h5 class="h5">All information</h5>
                </div>

                @if(session()->has('message'))
                     <div class="alert alert-success alert-dismissible fade show">{{session()->get('message')}}</div>
                @endif

                <form action="" method="POST" wire:submit.prevent="editSetting">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Email</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="email" name="email" placeholder="Email" wire:model="email">
                            @error('email') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Phone</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="phone" placeholder="Phone" wire:model="phone">
                            @error('phone') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Phone2</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="phone2" placeholder="Phone2" wire:model="phone2">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Address</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="address" placeholder="Address" wire:model="address">
                            @error('address') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Map</label>
                        <div class="col-sm-12 col-md-10">
                            <textarea class="form-control" name="map" placeholder="Map" wire:model="map"></textarea>
                            @error('map') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Twiter Link</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="twiter" placeholder="Twiter Link" wire:model="twiter">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Facebook Link</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="facebook" placeholder="Facebook Link" wire:model="facebook">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Pinterest Link</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="pinterest" placeholder="Pinterest Link" wire:model="pinterest">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Instagarm Link</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="instagarm" placeholder="Instagarm Link" wire:model="instagarm">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Youtube Link</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="youtube" placeholder="Youtube Link" wire:model="youtube">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label"></label>
                        <div class="col-sm-12 col-md-10">
                            <input type="submit" value="Save" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
