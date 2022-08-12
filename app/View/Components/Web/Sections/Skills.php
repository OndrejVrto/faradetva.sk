<?php declare(strict_types=1);

namespace App\View\Components\Web\Sections;

use App\Models\News;
use App\Models\Notice;
use App\Models\Subscriber;
use App\Models\Testimonial;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;

class Skills extends Component {
    public array $skills;

    public function __construct() {
        $this->skills = $this->getSkills();
    }

    public function render(): View {
        return view('components.web.sections.skills.index');
    }

    private function getSkills(): array {
        return Cache::rememberForever(
            key: 'SKILLS',
            callback: fn (): array => [
                'news'         => News::whereNotified(1)->withTrashed()->count(),
                'notices'      => Notice::whereNotified(1)->withTrashed()->count(),
                'testimonials' => Testimonial::whereActive(1)->count(),
                'subscribers'  => Subscriber::whereNotNull('email_verified_at')->count(),
            ]
        );
    }
}
