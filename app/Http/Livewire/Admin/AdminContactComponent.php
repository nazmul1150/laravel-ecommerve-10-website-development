<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Contact;
use Livewire\WithPagination;

class AdminContactComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function deleteMessage($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return redirect()->route('admin.contact')->with('message', 'Message delete successfully!');
    }

    public function render()
    {
        $contacts = Contact::orderBy('id','DESC')->paginate(10);

        return view('livewire.admin.admin-contact-component',['contacts'=>$contacts])->layout('admin.layouts.base');
    }
}
