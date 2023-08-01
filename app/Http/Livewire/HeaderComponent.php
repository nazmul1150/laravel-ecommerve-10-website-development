<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Logo;
use App\Models\HeaderTopNews;

use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use Cart;

use App\Models\Setting;

class HeaderComponent extends Component
{
    public function deleteCartProduct($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        return redirect()->route('cart')->with('message','Successfully Item has been removed');
    }

    public function render()
    {
        $logo = Logo::find(1);

        $news_top = HeaderTopNews::orderBy('id','DESC')->take(5)->get();

        $categorys = ProductCategory::orderBy('id','DESC')->get();

        $setting = Setting::find(1);

        return view('livewire.header-component',['logo'=>$logo,'news_top'=>$news_top,'categorys'=>$categorys,'setting'=>$setting]);
    }
}
