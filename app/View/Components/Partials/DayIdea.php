<?php

namespace App\View\Components\Partials;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use App\Models\DayIdea as ModelsDayIdea;

class DayIdea extends Component {
    public $dayIdea;

    public function __construct() {
        $this->dayIdea = ModelsDayIdea::query()
            ->inRandomOrder()
            ->limit(1)
            ->get()
            ->map(function ($idea) {
                return [
                    'id'     => $idea->id,
                    'idea'   => $idea->idea,
                    'author' => $idea->author,
                ];
            })
            ->first();
    }

    public function render(): View {
        return view('components.partials.day-idea.index');
    }
}
