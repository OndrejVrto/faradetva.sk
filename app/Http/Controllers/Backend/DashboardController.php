<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend;

use App\Models\StaticPage;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __invoke(): View  {
        $pages = StaticPage::select([
            'title',
            'url',
            'check_url'
        ])->orderBy('slug')->get();

        return view('backend.dashboard.index', compact('pages'));
    }
}
