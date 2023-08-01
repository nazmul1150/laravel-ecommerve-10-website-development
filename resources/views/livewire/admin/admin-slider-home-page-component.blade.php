@section('title')
Slider Home Page
@endsection

<div class="main-container">
    <div class="pd-ltr-20">
       <div class="min-height-200px">
         <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Slider Home Page</h4>
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
                     <h5 class="h5">All Slider</h5>
                   </div>
                </div>
                <div class="col-md-6 col-sm-12 mb-4">
                  <a class="btn btn-primary float-right" href="{{route('admin.add.sliderhomepage')}}" role="button">
                    Add Slider
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
                           <th scope="col">Sub Title</th>
                           <th scope="col">Title 1</th>
                           <th scope="col">Title 2</th>
                           <th scope="col">Short Description</th>
                           <th scope="col">Link</th>
                           <th scope="col">Status</th>
                           <th scope="col">Action</th>
                       </tr>
                   </thead>
                   <tbody>
                     @foreach($home_sliders as $home_slider)
                       <tr>
                           <td>{{$home_slider->id}}</td>
                           <td> <img src="{{asset('website/imgs/slider')}}/{{$home_slider->image}}" width="100"> </td>
                           <td>{{$home_slider->subtitle}}</td>
                           <td>{{$home_slider->title1}}</td>
                           <td>{{$home_slider->title2}}</td>
                           <td>{{$home_slider->short_desc}}</td>
                           <td>{{$home_slider->link}}</td>
                           <td>
                              @if($home_slider->status == 0)
                                Active
                              @else
                                DeActive
                              @endif
                           </td>
                           <td>
                             <a href="{{route('admin.edit.sliderhomepage',$home_slider->id)}}" class="btn btn-sm btn-primary">Edit</a>
                             <a href="#" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure, You want to delete this Slider?') || event.stopImmediatePropagation()" wire:click.prevent="deleteSlider({{$home_slider->id}})">Delete</a>
                           </td>
                       </tr>
                     @endforeach
                     <tr>
                         <td colspan="9">
                            <div class="d-flex justify-content-end">
                            {{$home_sliders->links()}}
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