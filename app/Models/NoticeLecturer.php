<?php

declare(strict_types = 1);

namespace App\Models;

use App\Models\Notice;

class NoticeLecturer extends Notice
{
    protected static $singleTableType = 'Lecturer';
}
