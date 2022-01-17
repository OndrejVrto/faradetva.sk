<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Frontend;

use App\Models\Notice;
use App\Http\Controllers\Controller;

class NoticesController extends Controller
{
    public function __invoke() {
        // TODO: Date Published
        $notices = Notice::whereActive(1)->with('media')->latest('published_at', 'created_at')->get();

        return view('frontend.notice.index', compact('notices'));
    }
}
