<?php declare(strict_types=1);

namespace App\View\Components\Partials;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use App\Models\DayIdea as ModelsDayIdea;

class DayIdea extends Component {
    public ?array $dayIdea;

    public function __construct() {
        $this->dayIdea = ModelsDayIdea::query()
            ->inRandomOrder()
            ->limit(1)
            ->get()
            ->map(fn (ModelsDayIdea $idea): array => [
                'id'     => $idea->id,
                'idea'   => $idea->idea,
                'author' => $idea->author,
            ])
            ->first();
    }

    public function render(): ?View {
        return is_null($this->dayIdea)
            ? null
            : view('components.partials.day-idea.index');
    }
}
