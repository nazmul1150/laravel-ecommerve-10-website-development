<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\HeaderTopNews;

class AdminEditHeaderTopNewsComponent extends Component
{
    public $sheadetopnews_id;
    public $title;
    public $link_name;
    public $link;
    public $status;

    public function mount($sheadetopnews_id)
    {
        $news_top = HeaderTopNews::where('id', $sheadetopnews_id)->first();
        $this->title = $news_top->title;
        $this->link_name = $news_top->link_name;
        $this->link = $news_top->link;
        $this->status = $news_top->status;
        $this->sheadetopnews_id = $news_top->id;
    }

    public function update($fields)
    {
        $this->validateOnly($fields,[
            'title'=>'required'
        ]);
    }

    public function updateHeaderTopNews()
    {
        $this->validate([
            'title'=>'required'
        ]);

        $news_top = HeaderTopNews::find($this->sheadetopnews_id);
        $news_top->title = $this->title;
        $news_top->link_name = $this->link_name;
        $news_top->link = $this->link;
        $news_top->status = $this->status;
        $news_top->update();

        return redirect()->route('admin.homepage')->with('news_top','News update has been successfully!');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-header-top-news-component')->layout('admin.layouts.base');
    }
}
