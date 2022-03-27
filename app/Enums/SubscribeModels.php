<?php

declare(strict_types = 1);

namespace App\Enums;

use App\Models\News;
use App\Models\NoticeChurch;
use App\Models\NoticeAcolyte;
use App\Models\NoticeLecturer;

enum SubscribeModels: string
{
    case NEWS            = News::class;
    case NOTICE_CHURCH   = NoticeChurch::class;
    case NOTICE_ACOLYTE  = NoticeAcolyte::class;
    case NOTICE_LECTURER = NoticeLecturer::class;

    public function url(): string {
        return match($this) {
            self::NEWS            => config('app.ur').'/clanok',
            self::NOTICE_CHURCH   => config('app.ur').'/oznamy-vsetky',
            self::NOTICE_ACOLYTE  => config('app.ur').'/o-nas/pastoracia/akolyti',
            self::NOTICE_LECTURER => config('app.ur').'/o-nas/pastoracia/lektori',
        };
    }
}
