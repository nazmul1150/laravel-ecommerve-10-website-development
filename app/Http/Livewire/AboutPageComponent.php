<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\FeaturedBrands;

class AboutPageComponent extends Component
{
    public function render()
    {
        $featured_brands = FeaturedBrands::where('status', 0)->orderBy('created_at','DESC')->take(8)->get();

        return view('livewire.about-page-component',['featured_brands'=>$featured_brands])->layout('website.layouts.base');
    }
}
