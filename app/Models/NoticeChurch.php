<?php

declare(strict_types = 1);

namespace App\Models;

use App\Models\Notice;

class NoticeChurch extends Notice
{
    protected static $singleTableType = 'Church';
}
