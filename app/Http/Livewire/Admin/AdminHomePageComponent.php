<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Logo;
use Livewire\WithPagination;
use App\Models\HeaderTopNews;
use App\Models\HomeBanner;
use App\Models\FeaturedBrands;

class AdminHomePageComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function deleteHeaderTopNews($id)
    {
        $news_top = HeaderTopNews::find($id);
        $news_top->delete();
        return redirect()->route('admin.homepage')->with('news_top','News delete has been successfully!');
    }

    public function deleteHomeFeaturedBanner($id)
    {
       $FeaturedBrand = FeaturedBrands::find($id);
       if($FeaturedBrand->image)
        {
            unlink(public_path('website/imgs/featured_brands/'.$FeaturedBrand->image));
        }

        $FeaturedBrand->delete();
        
        return redirect()->route('admin.homepage')->with('news_top','Featured Brands delete has been successfully!');
    }

    public function render()
    {
        $logo = Logo::find(1);

        $header_top_news = HeaderTopNews::orderBy('id','DESC')->paginate(5);

        $banner_1 = HomeBanner::where('id',1)->where('status', 0)->first();
        $banner_2 = HomeBanner::where('id',2)->where('status', 0)->first();
        $banner_3 = HomeBanner::where('id',3)->where('status', 0)->first();
        $banner_4 = HomeBanner::where('id',4)->where('status', 0)->first();

        $featured_brands = FeaturedBrands::orderBy('created_at','DESC')->paginate(8);

        return view('livewire.admin.admin-home-page-component',['logo'=>$logo,'header_top_news'=>$header_top_news,'banner_1'=>$banner_1,'banner_2'=>$banner_2,'banner_3'=>$banner_3,'banner_4'=>$banner_4,'featured_brands'=>$featured_brands])->layout('admin.layouts.base');
    }
}
