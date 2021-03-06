<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Admin;

use App\Models\NoticeAcolyte;
use App\Http\Controllers\Admin\NoticeController;

class NoticeAcolyteController extends NoticeController
{
    /**
     * Set the resource and model names.
     */
    function __construct()
    {
        $this->resource = 'notice-acolyte';
        $this->model = NoticeAcolyte::class;
        parent::__construct();
    }
}
