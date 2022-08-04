<?php

declare(strict_types=1);

namespace App\View\Components\Partials;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class EmailLink extends Component {
    public $name;
    public $domain;

    public function __construct(
        string $email,
        public ?string $nonce = null,
        public string $class = 'link-secondary',
        public ?string $icon = 'fa-regular fa-paper-plane fa-flip-horizontal ps-2'
    ) {
        $partsEmail = explode('@', $email);

        $this->name   = implode("\"+\"", str_split($partsEmail[0]));
        $this->domain = implode("\"+\"", str_split($partsEmail[1]));
    }

    public function render(): View {
        return view('components.partials.email-link.index');
    }
}
