@section('title')
Home page
@endsection

<div class="main-container">
    <div class="pd-ltr-20">
       <div class="min-height-200px">
         <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Home Page</h4>
                                <p>Website Home Page Information</p>
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
                   <h5 class="h5">All Logo and Fabicon</h5>
               </div>

               <table class="table">
                   <thead>
                       <tr>
                           <th scope="col">#</th>
                           <th scope="col">logo</th>
                           <th scope="col">Fabicon</th>
                           <th scope="col">Action</th>
                       </tr>
                   </thead>
                   <tbody>
                       <tr>
                           <td>{{$logo->id}}</td>
                           <td> <img src="{{asset('website/imgs/logo')}}/{{$logo->logo}}" width="200"> </td>
                           <td> <img src="{{asset('website/imgs/logo')}}/{{$logo->fab_icon}}" width="50"> </td>
                           <td><a href="{{route('admin.edit.logo',$logo->id)}}" class="btn btn-sm btn-primary">Update</a></td>
                       </tr>
                   </tbody>
               </table>
            </div>

            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                <div class="row">
                <div class="col-md-6 col-sm-12 align-self-center">
                   <div class="title">
                     <h5 class="h5">Header Top News</h5>
                   </div>
                </div>
                <div class="col-md-6 col-sm-12 mb-4">
                  <a class="btn btn-primary float-right" href="{{route('admin.add.headertopnews')}}" role="button">
                    Add News
                   </a>
                </div>
               </div>

                @if(session()->has('news_top'))
                     <div class="alert alert-success alert-dismissible fade show">{{session()->get('news_top')}}</div>
                @endif

                <table class="table">
                   <thead>
                       <tr>
                           <th scope="col">#</th>
                           <th scope="col">Title</th>
                           <th scope="col">Link Name</th>
                           <th scope="col">Link</th>
                           <th scope="col">Status</th>
                           <th scope="col">Action</th>
                       </tr>
                   </thead>
                   <tbody>
                    @foreach($header_top_news as $header_top_new)
                       <tr>
                           <td>{{$header_top_new->id}}</td>
                           <td>{{$header_top_new->title}}</td>
                           <td>{{$header_top_new->link_name}}</td>
                           <td>{{$header_top_new->link}}</td>
                           <td>
                              @if($header_top_new->status == 0)
                                Active
                              @else
                                DeActive
                              @endif
                           </td>
                           <td>
                             <a href="{{route('admin.edit.headertopnews',$header_top_new->id)}}" class="btn btn-sm btn-primary">Edit</a>
                             <a href="#" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure, You want to delete this News?') || event.stopImmediatePropagation()" wire:click.prevent="deleteHeaderTopNews({{$header_top_new->id}})">Delete</a>
                           </td>

                       </tr>
                       @endforeach
                   </tbody>
                 </table>
            </div>

            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                <div class="title">
                   <h5 class="h5">Banner 1</h5>

                   <table class="table">
                   <thead>
                       <tr>
                           <th scope="col">#</th>
                           <th scope="col">Image</th>
                           <th scope="col">Sub title</th>
                           <th scope="col">Title 1</th>
                           <th scope="col">Title 2</th>
                           <th scope="col">Link Name</th>
                           <th scope="col">Link</th>
                           <th scope="col">Status</th>
                           <th scope="col">Action</th>
                       </tr>
                   </thead>
                   <tbody>
                    
                       <tr>
                           <td>{{$banner_1->id}}</td>
                           <td><img src="{{asset('website/imgs/banner')}}/{{$banner_1->image}}" width="200"></td>
                           <td>{{$banner_1->subtitle}}</td>
                           <td>i{{$banner_1->title1}}</td>
                           <td>{{$banner_1->title2}}</td>
                           <td>{{$banner_1->link_name}}</td>
                           <td>{{$banner_1->link}}</td>
                           <td>{{$banner_1->status == 0 ? 'active':'Deactive'}}</td>
                           <td>
                               <a href="{{route('admin.edit.homebanner',$banner_1->id)}}" class="btn btn-sm btn-primary">Edit</a>
                           </td>
                       </tr>
                  
                   </tbody>
                 </table>
               </div>
            </div>

            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                <div class="title">
                   <h5 class="h5">Banner 2</h5>
                   <table class="table">
                   <thead>
                       <tr>
                           <th scope="col">#</th>
                           <th scope="col">Image</th>
                           <th scope="col">Sub title</th>
                           <th scope="col">Title 1</th>
                           <th scope="col">Title 2</th>
                           <th scope="col">Link Name</th>
                           <th scope="col">Link</th>
                           <th scope="col">Status</th>
                           <th scope="col">Action</th>
                       </tr>
                   </thead>
                   <tbody>
                    
                        <tr>
                           <td>{{$banner_2->id}}</td>
                           <td><img src="{{asset('website/imgs/banner')}}/{{$banner_2->image}}" width="200"></td>
                           <td>{{$banner_2->subtitle}}</td>
                           <td>i{{$banner_2->title1}}</td>
                           <td>{{$banner_2->title2}}</td>
                           <td>{{$banner_2->link_name}}</td>
                           <td>{{$banner_2->link}}</td>
                           <td>{{$banner_2->status == 0 ? 'active':'Deactive'}}</td>
                           <td>
                               <a href="{{route('admin.edit.homebanner',$banner_2->id)}}" class="btn btn-sm btn-primary">Edit</a>
                           </td>
                       </tr>

                       <tr>
                           <td>{{$banner_3->id}}</td>
                           <td><img src="{{asset('website/imgs/banner')}}/{{$banner_3->image}}" width="200"></td>
                           <td>{{$banner_3->subtitle}}</td>
                           <td>i{{$banner_3->title1}}</td>
                           <td>{{$banner_3->title2}}</td>
                           <td>{{$banner_3->link_name}}</td>
                           <td>{{$banner_3->link}}</td>
                           <td>{{$banner_3->status == 0 ? 'active':'Deactive'}}</td>
                           <td>
                               <a href="{{route('admin.edit.homebanner',$banner_3->id)}}" class="btn btn-sm btn-primary">Edit</a>
                           </td>
                       </tr>

                       <tr>
                           <td>{{$banner_4->id}}</td>
                           <td><img src="{{asset('website/imgs/banner')}}/{{$banner_4->image}}" width="200"></td>
                           <td>{{$banner_4->subtitle}}</td>
                           <td>i{{$banner_4->title1}}</td>
                           <td>{{$banner_4->title2}}</td>
                           <td>{{$banner_4->link_name}}</td>
                           <td>{{$banner_4->link}}</td>
                           <td>{{$banner_4->status == 0 ? 'active':'Deactive'}}</td>
                           <td>
                               <a href="{{route('admin.edit.homebanner',$banner_4->id)}}" class="btn btn-sm btn-primary">Edit</a>
                           </td>
                       </tr>
                  
                   </tbody>
                 </table>
               </div>
            </div>

            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                <div class="row">
                <div class="col-md-6 col-sm-12 align-self-center">
                   <div class="title">
                     <h5 class="h5">Featured Brands</h5>
                   </div>
                </div>
                <div class="col-md-6 col-sm-12 mb-4">
                  <a class="btn btn-primary float-right" href="{{route('admin.add.home.featuredbrands')}}" role="button">
                    Add New
                   </a>
                </div>
               </div>

               @if(session()->has('feature_brands'))
                     <div class="alert alert-success alert-dismissible fade show">{{session()->get('feature_brands')}}</div>
                @endif

                <table class="table">
                   <thead>
                       <tr>
                           <th scope="col">#</th>
                           <th scope="col">Image</th>
                           <th scope="col">Status</th>
                           <th scope="col">Action</th>
                       </tr>
                   </thead>
                   <tbody>
                     @foreach($featured_brands as $brand)
                       <tr>
                           <td>{{$brand->id}}</td>
                           <td><img src="{{asset('website/imgs/featured_brands')}}/{{$brand->image}}" width="100"></td>
                           <td>
                              @if($brand->status == 0)
                                Active
                              @else
                                DeActive
                              @endif
                           </td>
                           <td>
                             <a href="{{route('admin.edit.home.featuredbrands',$brand->id)}}" class="btn btn-sm btn-primary">Edit</a>
                             <a href="#" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure, You want to delete this Featured Brands?') || event.stopImmediatePropagation()" wire:click.prevent="deleteHomeFeaturedBanner({{$brand->id}})">Delete</a>
                           </td>
                       </tr>
                      @endforeach
                      <tr>
                         <td colspan="14">
                            <div class="d-flex justify-content-end">
                            {{$featured_brands->links()}}
                            </div>
                        </td>
                     </tr>
                   </tbody>
                 </table>
            </div>

            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                <div class="title">
                   <h5 class="h5">title</h5>
                   <table class="table">
                   <thead>
                       <tr>
                           <th scope="col">#</th>
                       </tr>
                   </thead>
                   <tbody>
                    
                       <tr>
                           <td>id</td>
                       </tr>
                  
                   </tbody>
                 </table>
               </div>
            </div>

        </div>
    </div>
</div>