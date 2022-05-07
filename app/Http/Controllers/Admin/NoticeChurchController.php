<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Admin;

use App\Models\NoticeChurch;
use App\Http\Controllers\Admin\NoticeController;

class NoticeChurchController extends NoticeController
{
    /**
     * Set the resource and model names.
     */
    function __construct()
    {
        $this->resource = 'notice-church';
        $this->model = NoticeChurch::class;
        parent::__construct();
    }
}
