@section('title')
Edit Logo
@endsection

<div class="main-container">
    <div class="pd-ltr-20">
       <div class="min-height-200px">
         <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Edit Logo and Fabicon</h4>
                            </div>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <a class="btn btn-primary" href="{{route('admin.homepage')}}" role="button">
                           Back
                        </a>
                    </div>
              </div>
            </div>
            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                <p>Update Logo and Fabicon<p>
                    @if(session()->has('logo_update'))
                     <div class="alert alert-success alert-dismissible fade show">{{session()->get('logo_update')}}</div>
                    @endif
                <form method="POST" action="" wire:submit.prevent="updateLogo" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Logo</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="file" name="logo" wire:model="newlogo">
                            <br>
                            @if($newlogo)
                             <img src="{{$newlogo->temporaryUrl()}}" width="250">
                            @else
                            <img src="{{asset('website/imgs/logo')}}/{{$logo}}" width="250">
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Fabicon</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="file" name="fab_icon" wire:model="newfab_icon">
                            <br>
                            @if($newfab_icon)
                             <img src="{{$newfab_icon->temporaryUrl()}}" width="50">
                            @else
                            <img src="{{asset('website/imgs/logo')}}/{{$fab_icon}}" width="50">
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label"></label>
                        <div class="col-sm-12 col-md-10">
                            <input type="submit" value="Update" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>