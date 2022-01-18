<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Frontend;

use App\Models\Notice;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;

class NoticesController extends Controller
{
    public function __invoke() {
        $notices = Notice::whereActive(1)
                    ->published()
                    ->unpublished()
                    ->latest()
                    ->with('media')
                    ->get();

        return view('frontend.notice.index', compact('notices'));
    }
}
