@section('title')
Contact page
@endsection

<div class="main-container">
    <div class="pd-ltr-20">
       <div class="min-height-200px">
         <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Contact Page</h4>
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
                   <h5 class="h5">All Contact</h5>
               </div>

               @if(session()->has('message'))
                     <div class="alert alert-success alert-dismissible fade show">{{session()->get('message')}}</div>
                @endif

               <table class="table">
                   <thead>
                       <tr>
                           <th scope="col">#</th>
                           <th scope="col">Name</th>
                           <th scope="col">Email</th>
                           <th scope="col">Phone</th>
                           <th scope="col">Subject</th>
                           <th scope="col">Message</th>
                           <th scope="col">Action</th>
                       </tr>
                   </thead>
                   <tbody>
                      @foreach($contacts as $contact)
                       <tr>
                           <td>{{$contact->id}}</td>
                           <td>{{$contact->name}}</td>
                           <td>{{$contact->email}}</td>
                           <td>{{$contact->phone}}</td>
                           <td>{{$contact->subject}}</td>
                           <td>{{$contact->message}}</td>
                           <td>
                            <a href="#" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure, You want to delete this Message?') || event.stopImmediatePropagation()" wire:click.prevent="deleteMessage({{$contact->id}})">Delete</a>
                           </td>
                       </tr>
                       @endforeach
                        <tr>
                         <td colspan="14">
                            <div class="d-flex justify-content-end">
                            {{$contacts->links()}}
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