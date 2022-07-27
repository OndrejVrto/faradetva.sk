<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Models\NoticeLecturer;

class NoticeLecturerController extends NoticeController {
    /**
     * Set the resource and model names.
     */
    public function __construct() {
        $this->resource = 'notice-lecturer';
        $this->model = NoticeLecturer::class;
        parent::__construct();
    }
}
