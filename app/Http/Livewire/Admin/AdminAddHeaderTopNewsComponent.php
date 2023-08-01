<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\HeaderTopNews;

class AdminAddHeaderTopNewsComponent extends Component
{
    public $title;
    public $link_name;
    public $link;
    public $status;

    public function mount()
    {
        $this->status = 0;
    }

    public function update($fields)
    {
        $this->validateOnly($fields,[
            'title'=>'required'
        ]);
    }

    public function addHeaderTopNews()
    {
        $this->validate([
            'title'=>'required'
        ]);

        $news_top = new HeaderTopNews();
        $news_top->title = $this->title;
        $news_top->link_name = $this->link_name;
        $news_top->link = $this->link;
        $news_top->status = $this->status;
        $news_top->save();

        return redirect()->route('admin.homepage')->with('news_top','News add has been successfully!');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-header-top-news-component')->layout('admin.layouts.base');
    }
}
