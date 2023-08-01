@section('title')
Login
@endsection

<x-guest-layout>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>                    
                    <span></span> Login
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
                                            <h3 class="mb-30">Login</h3>
                                        </div>
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="form-group">
                                                <input type="email" id="email" name="email" placeholder="Your Email" :value="old('email')" required autofocus />
                                            </div>
                                            <div class="form-group">
                                                <input type="password" id="password" name="password" placeholder="Password" required autocomplete="current-password" />
                                            </div>
                                            <div class="login_footer form-group">
                                                <div class="chek-form">
                                                    <div class="custome-checkbox">
                                                        <input class="form-check-input" id="remember_me" type="checkbox" name="remember">
                                                        <label class="form-check-label" for="remember_me"><span>Remember me</span></label>
                                                    </div>
                                                </div>
                                                @if (Route::has('password.request'))
                                                <a class="text-muted" href="{{ route('password.request') }}">Forgot password?</a>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-fill-out btn-block hover-up" name="login">Log in</button>
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
