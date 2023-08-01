<div class="header-action-icon-2">
    <a href="{{route('wishlist')}}">
        <img class="svgInject" alt="Surfside Media" src="{{asset('website/imgs/theme/icons/icon-heart.svg')}}">
        <span class="pro-count blue">
        @if(Cart::instance('wishlist')->count() > 0)
        {{Cart::instance('wishlist')->count()}}
        @else
        0
        @endif
        </span>
    </a>
</div>