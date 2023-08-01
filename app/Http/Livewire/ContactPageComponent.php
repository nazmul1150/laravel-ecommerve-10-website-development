<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Setting;
use App\Models\Contact;

class ContactPageComponent extends Component
{

    public $name;
    public $email;
    public $phone;
    public $subject;
    public $message;

     public function update($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);
    }


    public function contactForm()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        $contact = new Contact();
        $contact->name = $this->name;
        $contact->email = $this->email;
        $contact->phone = $this->phone;
        $contact->subject = $this->subject;
        $contact->message = $this->message;
        $contact->save();

        return redirect()->route('contact')->with('message', 'Thanks, Your message has been sent successfully!');
    }

    public function render()
    {
        return view('livewire.contact-page-component')->layout('website.layouts.base');
    }
}
