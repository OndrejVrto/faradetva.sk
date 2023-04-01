<?php declare(strict_types=1);

namespace App\View\Components\partials;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class biography extends Component {

    public function __construct(
        public ?int $delay = 1,
        public ?string $title = null,
        public ?string $birthDate = null,
        public ?string $birthCity = null,

        public ?string $ordDate = null,
        public ?string $ordCity = null,

        public array $datesCV,

        public ?string $deathDate = null,
        public ?string $deathCity = null,
    ) {
    }

    public function render(): View {
        return view('components.partials.biography.index');
    }
}
