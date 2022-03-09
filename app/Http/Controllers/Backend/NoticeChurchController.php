<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend;

use App\Models\NoticeChurch;
use App\Http\Controllers\Backend\NoticeController;

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
