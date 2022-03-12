<?php

namespace App\View\Components\Frontend\Sections;

use App\Models\Priest as PriestModel;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;

class Priests extends Component
{
    public $priests;

    public function __construct() {
        $this->priests = $this->getPriests();
    }

    public function render(): View|null {
        if (!is_null($this->priests)) {
            return view('components.frontend.sections.priests.index');
        }
        return null;
    }

    private function getPriests(): array {
        return Cache::rememberForever('PRIESTS', function(): array {
            return PriestModel::whereActive(1)
                ->with('media')
                ->get()
                ->map(function($priest): array {
                    return [
                        'id'               => $priest->id,
                        'full_name_titles' => $priest->full_name_titles,
                        'phone'            => $priest->phone,
                        'phone_digits'     => $priest->phone_digits,
                        'email'            => $priest->email,
                        'function'         => $priest->function,
                        'description'      => $priest->description,
                        'img-url'          => $priest->getFirstMediaUrl('priest', 'crop'),
                    ];
            })->toArray();
        });
    }
}
