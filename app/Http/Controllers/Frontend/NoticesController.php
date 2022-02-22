<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Frontend;

use App\Models\Notice;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class NoticesController extends Controller
{
    public function __invoke(): View  {
        $notices = Notice::whereActive(1)
                    ->published()
                    ->unpublished()
                    ->latest()
                    ->with('media')
                    ->get();

        return view('frontend.notice.index', compact('notices'));
    }
}
