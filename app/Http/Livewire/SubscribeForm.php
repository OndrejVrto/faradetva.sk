<?php

declare(strict_types=1);

namespace App\Http\Livewire;

use App\Models\News;
use Livewire\Component;
use App\Models\Subscriber;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;

class SubscribeForm extends Component {
    public string $model = News::class;
    public string $name = '';
    public string $email = '';
    public bool $type;

    public string $successMesage = '';

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
    ];

    public function mount(string $modelName, bool|string|int|null $section = false): void {
        $className = "App\\Models\\".$modelName;
        $this->type = $section ? true : false;

        if ($modelName and class_exists($className, false)) {
            $this->model = $className;
        };
    }

    public function submitForm(): void {
        $this->validate();

        Subscriber::create([
            'name'  => $this->name,
            'email' => $this->email,
            'model_type' => $this->model,
        ]);

        // $this->reset();
        $this->email = '';
        $this->name = '';

        $this->successMesage = 'Boli ste zaregistrovaný k odberu noviniek.';
    }

    public function render(): View|Factory {
        return view('livewire.subscribe-form');
    }
}
