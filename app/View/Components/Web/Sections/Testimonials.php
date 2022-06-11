<?php

namespace App\View\Components\Web\Sections;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use App\Services\PurifiAutolinkService;
use App\Models\Testimonial as TestimonialModel;

class Testimonials extends Component
{
    public $testimonials;

    public function __construct() {
        $this->testimonials = $this->getTestimonials();
        // TODO: SEO Person
    }

    public function render(): View|null {
        if (!is_null($this->testimonials)) {
            return view('components.web.sections.testimonials.index');
        }
        return null;
    }

    private function getTestimonials(): array {
        return Cache::remember('TESTIMONIALS', now()->addHours(1), function(): array {
            $countTestimonials = TestimonialModel::query()
                ->whereActive(1)
                ->count();

            return TestimonialModel::query()
                ->whereActive(1)
                ->with('media')
                ->get()
                ->shuffle()
                ->random(min($countTestimonials, 3))
                ->map(function($data): array {
                    return [
                        'id'          => $data->id,
                        'name'        => $data->name,
                        'function'    => $data->function,
                        'description' => (new PurifiAutolinkService)->getCleanTextWithLinks($data->description),
                        'url'         => $data->url,
                        'img-url'     => $data->getFirstMediaUrl('testimonial', 'crop'),
                    ];
                })
                ->toArray();
        });
    }
}
