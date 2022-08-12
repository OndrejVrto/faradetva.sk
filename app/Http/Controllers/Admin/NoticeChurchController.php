<?php declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Models\NoticeChurch;

class NoticeChurchController extends NoticeController {
    /**
     * Set the resource and model names.
     */
    public function __construct() {
        $this->resource = 'notice-church';
        $this->model = NoticeChurch::class;
        parent::__construct();
    }
}
