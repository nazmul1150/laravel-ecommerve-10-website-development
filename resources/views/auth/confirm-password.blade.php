@section('title')
Confirm password
@endsection

<!-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div> -->

        <!-- Validation Errors -->
        <!-- <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf -->

            <!-- Password -->
            <!-- <div>
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <div class="flex justify-end mt-4">
                <x-button>
                    {{ __('Confirm') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> -->

<x-guest-layout>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>                    
                    <span></span> Confiem password
                </div>
            </div>
        </div>
        <section class="pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 m-auto">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="login_wrap widget-taber-content p-30 background-white border-radius-10 mb-md-5 mb-lg-0 mb-sm-5">
                                    <div class="padding_eight_all bg-white">
                                        <div class="heading_s1">
                                            <h3 class="mb-5">Confirm Password</h3>
                                            <p class="mb-30">This is a secure area of the application. Please confirm your password before continuing.</p>
                                        </div>
                                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                        <form method="POST" action="{{ route('password.confirm') }}">
                                            @csrf

                                            <div class="form-group">
                                                <label class="form-check-label" for="password"><span>Password</span></label>
                                                <input id="password" type="password" name="password" placeholder="Password" required autocomplete="current-password" />
                                            </div>
                                            
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-fill-out btn-block hover-up">Confirm</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1"></div>
                            <div class="col-lg-6">
                               <img src="{{asset('website/imgs/login.png')}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    
</x-guest-layout>
