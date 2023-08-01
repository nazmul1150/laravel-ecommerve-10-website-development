@section('title')
Contact
@endsection

<main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>                    
                    <span></span> Contact us
                </div>
            </div>
        </div>                
        <section class="pt-50 pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-10 m-auto">
                        <div class="contact-from-area padding-20-row-col wow FadeInUp">
                            <h3 class="mb-10 text-center">Drop Us a Line</h3>
                            <p class="text-muted mb-30 text-center font-sm">Fill Up all fields and submit form</p>

                            @if(session()->has('message'))
                                 <div class="alert alert-success alert-dismissible fade show">{{session()->get('message')}}</div>
                            @endif
                            
                            <form class="contact-form-style text-center" id="contact-form" action="#" method="post" wire:submit.prevent="contactForm">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="input-style mb-20">
                                            <input name="name" placeholder="Name" type="text" wire:model="name">
                                            @error('name') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="input-style mb-20">
                                            <input name="email" placeholder="Your Email" type="email" wire:model="email">
                                            @error('email') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="input-style mb-20">
                                            <input name="phone" placeholder="Your Phone" type="tel" wire:model="phone">
                                            @error('phone') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="input-style mb-20">
                                            <input name="subject" placeholder="Subject" type="text" wire:model="subject">
                                            @error('subject') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="textarea-style mb-30">
                                            <textarea name="message" placeholder="Message" wire:model="message"></textarea>
                                            @error('message') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                        <button class="submit submit-auto-width" type="submit">Send message</button>
                                    </div>
                                </div>
                            </form>
                            <p class="form-messege"></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
