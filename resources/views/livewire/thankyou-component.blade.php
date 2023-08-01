@section('title')
Thankyou
@endsection

<main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> Thankyou
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="thankyou text-center">
                    <h2>Thank you for your order</h2>
                    <p>A confirmation email was sent.</p>
                    <a href="{{route('shop')}}" class="btn btn-submit btn-submitx">Continue Shopping</a>
                </div>
            </div>
        </section>
    </main>
