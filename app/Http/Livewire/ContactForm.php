<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactForm extends Component
{

    public $name = '';
    public $email = '';
    public $contact = '';
    public $address = '';
    public $message = '';
    public $successMesage = '';

    protected $rules = [
        'name' => [
            'required',
            'min:6',
            'max:255',
        ],
        'email' => [
            'required',
            'email',
            'max:255',
        ],
        'contact' => [
            'nullable',
            'max:255',
        ],
        'address' => [
            'nullable',
            'max:255',
        ],
        'message' => [
            'required',
            'string',
            'min:20',
            'max:10000',
        ],
    ];

    public function updated($property) {
        $this->validateOnly($property);
    }

    public function submitForm(){
        $this->validate();

        $contact['name']    = $this->name;
        $contact['email']   = $this->email;
        $contact['contact'] = $this->contact;
        $contact['address'] = $this->address;
        $contact['message'] = $this->message;

        $this->reset();

        Mail::to('detva@fara.sk')->send(new ContactMail($contact));

        $this->successMesage = 'Vaša správa bola odoslaná.';
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
