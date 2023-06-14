<?php declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Models\NoticeMarriage;

class NoticeMarriageController extends NoticeController {
    /**
     * Set the resource and model names.
     */
    public function __construct() {
        $this->resource = 'notice-marriage';
        $this->model = NoticeMarriage::class;
        parent::__construct();
    }
}
