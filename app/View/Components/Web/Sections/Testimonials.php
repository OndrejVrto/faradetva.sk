<?php declare(strict_types=1);

namespace App\View\Components\Web\Sections;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use App\Services\PurifiAutolinkService;
use App\Models\Testimonial as TestimonialModel;

class Testimonials extends Component {
    final public const LIMIT = 3;
    public array $testimonials;

    public function __construct() {
        $this->testimonials = $this->getTestimonials();
        // TODO: SEO Person
    }

    public function render(): ?View {
        if (empty($this->testimonials)) {
            return null;
        }
        return view('components.web.sections.testimonials.index');
    }

    private function getTestimonials(): array {
        return Cache::remember(
            key: 'TESTIMONIALS',
            ttl: now()->addHours(1),
            callback: function (): array {
                $countTestimonials = TestimonialModel::query()
                    ->whereActive(1)
                    ->count();

                if ($countTestimonials < self::LIMIT) {
                    return [];
                }

                return TestimonialModel::query()
                    ->whereActive(1)
                    ->inRandomOrder()
                    ->limit(self::LIMIT)
                    ->with('media')
                    ->get()
                    ->map(fn ($data): array => [
                        'id'          => $data->id,
                        'name'        => $data->name,
                        'function'    => $data->function,
                        'description' => (new PurifiAutolinkService())->getCleanTextWithLinks($data->description),
                        'url'         => $data->url,
                        'img-url'     => $data->getFirstMediaUrl('testimonial', 'crop'),
                    ])
                    ->toArray();
            }
        );
    }
}
