<?php

namespace App\View\Components\Frontend\Sections;

use App\Models\News;
use App\Models\Notice;
use App\Models\Subscriber;
use App\Models\Testimonial;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;

class Skills extends Component
{
    public $skills;

    public function __construct() {
        $this->skills = $this->getSkills();
    }

    public function render(): View|null {
        if (!is_null($this->skills)) {
            return view('components.frontend.sections.skills.index');
        }
        return null;
    }

    private function getSkills(): array {
        return Cache::rememberForever('SKILLS', function(): array {
            return [
                'news'         => News::whereNotified(1)->withTrashed()->count(),
                'notices'      => Notice::whereNotified(1)->withTrashed()->count(),
                'testimonials' => Testimonial::whereActive(1)->count(),
                'subscribers'  => Subscriber::whereNotNull('email_verified_at')->count(),
            ];
        });
    }
}
