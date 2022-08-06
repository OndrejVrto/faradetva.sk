<?php

declare(strict_types=1);

namespace App\Http\Livewire;

use Livewire\Component;
use App\Mail\ContactMail;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\View\Factory;

class ContactForm extends Component {
    public string $name = '';
    public string $email = '';
    public string $address = '';
    public string $message = '';
    public string $successMesage = '';
    public array $contact = [];

    protected array $rules = [
        'name' => [
            'required',
            'min:6',
            'max:255',
        ],
        'email' => [
            'required',
            'email:rfc,dns,filter',
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

    public function updated(mixed $property): void {
        $this->validateOnly($property);
    }

    public function submitForm(): void {
        $this->validate();

        $contact['name']    = $this->name;
        $contact['email']   = $this->email;
        $contact['contact'] = $this->contact;
        $contact['address'] = $this->address;
        $contact['message'] = $this->message;

        Mail::to(config('farnost-detva.mail_contact_form', 'detva@fara.sk'))
            ->send(new ContactMail($contact));

        $this->reset();

        $this->successMesage = 'Vaša správa bola odoslaná.';
    }

    public function render(): View|Factory {
        return view('livewire.contact-form');
    }
}
