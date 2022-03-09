<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend;

use App\Models\NoticeLecturer;
use App\Http\Controllers\Backend\NoticeController;

class NoticeLecturerController extends NoticeController
{
    /**
     * Set the resource and model names.
     */
    function __construct()
    {
        $this->resource = 'notice-lecturer';
        $this->model = NoticeLecturer::class;
        parent::__construct();
    }
}
