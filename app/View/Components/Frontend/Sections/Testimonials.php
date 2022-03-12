<?php

namespace App\View\Components\Frontend\Sections;

use App\Models\Testimonial as TestimonialModel;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;

class Testimonials extends Component
{
    public $testimonials;

    public function __construct() {
        $this->testimonials = $this->getTestimonials();
        // dd($this->testimonials);
    }

    public function render(): View|null {
        if (!is_null($this->testimonials)) {
            return view('components.frontend.sections.testimonials.index');
        }
        return null;
    }

    private function getTestimonials(): array {
        return Cache::remember('TESTIMONIALS-random', now()->addHours(1), function(): array {
            $countTestimonials = TestimonialModel::whereActive(1)->count();
            return TestimonialModel::whereActive(1)
                ->with('media')
                ->get()
                ->shuffle()
                ->random(min($countTestimonials, 3))
                ->map(function($data): array {
                    return [
                        'id'          => $data->id,
                        'name'        => $data->name,
                        'phone'       => $data->phone,
                        'function'    => $data->function,
                        'description' => $data->description,
                        'img-url'     => $data->getFirstMediaUrl('testimonial', 'crop'),
                    ];
            })->toArray();
        });
    }
}
