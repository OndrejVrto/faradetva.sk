<?php

namespace App\View\Components\Frontend\Sections;

use Illuminate\Support\Str;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;

class Notice extends Component
{
    public $notices;

    private $model;

    private const NAMESPACE = '\\App\\Models\\';

    private const TYPE = [
        'church'  => 'NoticeChurch',
        'acolyta' => 'NoticeAcolyte',
        'lector'  => 'NoticeLecturer'
    ];

    public function __construct(
        public $typeNotice
    ) {
        $this->model = $this->getModelName($typeNotice);
        $this->notices = $this->getNotice(self::NAMESPACE.$this->model);
    }

    public function render(): View|null {
        if (!is_null($this->notices)) {
            return view('components.frontend.sections.notice.index');
        }
        return null;
    }

    private function getModelName(string|null $type): string {
        $nameModel = Str::of($type)->lower()->ucfirst()->start('Notice');
        return in_array($nameModel, self::TYPE) ? $nameModel : self::TYPE['church'];
    }

    private function getNotice(string $fullModel): array {
        $cacheName = Str::of($this->model)->kebab();
        return Cache::rememberForever('NOTICE_'.$cacheName, function() use($fullModel): array {
            return $fullModel::query()
                ->visible()
                ->with('media')
                ->get()
                ->map(function($notice): array {
                    return [
                        'id'    => $notice->id,
                        'title' => $notice->title,
                        'url'   => $notice->getFirstMedia('notice_pdf')->getFullUrl(),
                    ];
            })->toArray();
        });
    }
}
