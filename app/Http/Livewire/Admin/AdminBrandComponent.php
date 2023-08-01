<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\Brand;
use Livewire\WithPagination;

class AdminBrandComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function deleteBrand($id)
    {
        $bran = Brand::find($id);

        $bran->delete();

        return redirect()->route('admin.brand')->with('message', 'Brand Delete Succesfully!');
    }


    public function render()
    {
        $brans = Brand::orderBy('id','DESC')->paginate(6);

        return view('livewire.admin.admin-brand-component',['brans'=>$brans])->layout('admin.layouts.base');
    }
}
