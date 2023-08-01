@section('title')
Review
@endsection

<main class="main">
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="comment-form" style="border-top:0px;">
                <div class="review-product" wire:ignore>
                    <div class="image">
                        <img src="{{asset('website/imgs/shop/product')}}/{{$orderitem->product->image}}" alt="#" />
                    </div>
                    <div class="review-title">
                        <h5>
                            <a href="{{route('product.details',$orderitem->product->slug)}}">
                                {{$orderitem->product->name}}
                            </a>
                        </h5>
                    </div>
                </div>

                <h4 class="mb-15">Add a review</h4>
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
                        <style type="text/css">
                            .review-product{
                                display: flex;
                                margin-bottom: 30px;
                            }
                            .review-product .image{
                                width: 150px;
                            }
                            .review-product .review-title{
                                margin-left: 20px;
                            }
                            .review-product .review-title h5{
                                font-size: 20px;
                                margin-top: 5px;
                            }
                            .comment-form-rating>span{
                                font-size: 14px;
                                line-height: 20px;
                                display: block;
                                float: left;
                                margin-right: 7px;
                                color: #666;
                            }
                            .comment-form-rating ~ p{
                                margin-bottom: 0 !important;
                            }
                            .comment-form-rating p.stars{
                                display: inline-block;
                                margin-bottom: 0 !important;
                            }
                            .comment-form-rating .stars input[type=radio]{
                                display: none;
                            }
                            .comment-form-rating .stars label{
                                display: block;
                                float: left;
                                margin: 0;
                                padding: 0 2px;
                            }
                            .comment-form-rating .stars label::before{
                                content: "\f005";
                                font-family: FontAwesome;
                                font-size: 15px;
                                /*color: #e6e6e6;*/
                                color: #efce4a;
                            }
                            .comment-form-rating .stars input[type=radio]:checked ~ label::before{
                                color: #e6e6e6 ;
                            }
                            .comment-form-rating .stars:hover label::before{
                                color: #efce4a !important;
                            }
                            .comment-form-rating .stars label:hover ~ label::before{
                                color: #e6e6e6 !important;
                            }
                            .comment-form-rating{
                                margin-bottom: 15px;
                            }
                        </style>
                        <form action="" wire:submit.prevent="addReview">
                            @csrf
                            <div class="comment-form-rating">
                                <span>Your rating</span>
                                <p class="stars">                         
                                    <label for="rated-1"></label>
                                    <input type="radio" id="rated-1" name="rating" value="1" wire:model="rating">
                                    <label for="rated-2"></label>
                                    <input type="radio" id="rated-2" name="rating" value="2" wire:model="rating">
                                    <label for="rated-3"></label>
                                    <input type="radio" id="rated-3" name="rating" value="3" wire:model="rating">
                                    <label for="rated-4"></label>
                                    <input type="radio" id="rated-4" name="rating" value="4" wire:model="rating">
                                    <label for="rated-5"></label>
                                    <input type="radio" id="rated-5" name="rating" value="5" checked="checked" wire:model="rating">
                                    @error('rating') <span class="text-danger">{{$message}}</span> @enderror
                                </p>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Write Comment" wire:model="comment"></textarea>
                                        @error('comment') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="button button-contactForm">Submit Review</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
</main>

