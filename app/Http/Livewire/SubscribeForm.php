<?php

namespace App\Http\Livewire;

use App\Models\News;
use Livewire\Component;
use App\Models\Subscriber;

class SubscribeForm extends Component
{
    public $model = News::class;
    public $name = '';
    public $email = '';
    public $type;

    public $successMesage = '';

    protected $rules = [
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
    ];

    public function mount($modelName, $section = false) {
        $className = "App\\Models\\".$modelName;
        $this->type = $section ? true : false;

        if ($modelName AND class_exists($className, false)) {
            $this->model = $className;
        };
    }

    public function submitForm() {
        $this->validate();

        Subscriber::create([
            'name'  => $this->name,
            'email' => $this->email,
            'model_type' => $this->model,
        ]);

        // $this->reset();
        $this->email = '';
        $this->name = '';

        $this->successMesage = 'Boli ste zaregistrovanÃ½ k odberu noviniek.';
    }

    public function render() {
        return view('livewire.subscribe-form');
    }
}
