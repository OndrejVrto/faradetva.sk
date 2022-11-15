<?php declare(strict_types=1);

namespace App\View\Components\Web\Sections;

use Illuminate\Support\Str;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;

class Notice extends Component {
    public array $notices;

    private readonly string $model;

    private const NAMESPACE = '\\App\\Models\\';

    private const TYPE = [
        'church'  => 'NoticeChurch',
        'acolyta' => 'NoticeAcolyte',
        'lector'  => 'NoticeLecturer'
    ];

    public function __construct(
        public string $typeNotice = self::TYPE['church']
    ) {
        $this->model = $this->getModelName($typeNotice);
        $this->notices = $this->getNotice(self::NAMESPACE.$this->model);
    }

    public function render(): ?View {
        return view('components.web.sections.notice.index');
    }

    private function getModelName(string $type): string {
        $nameModel = Str::of($type)
                        ->lower()
                        ->ucfirst()
                        ->start('Notice')
                        ->value();

        return in_array($nameModel, self::TYPE)
                ? $nameModel
                : self::TYPE['church'];
    }

    private function getNotice(string $fullModel): array {
        $cacheName = Str::of($this->model)->kebab();
        return Cache::rememberForever(
            key: 'NOTICE_'.$cacheName,
            callback: fn (): array => $fullModel::query()
                ->visible()
                ->with('media')
                ->get()
                ->map(fn ($notice): array => [
                    'id'    => $notice->id,
                    'title' => $notice->title,
                    'url'   => $notice->getFirstMedia('notice_pdf')->getFullUrl(),
                ])
                ->toArray()
        );
    }
}
