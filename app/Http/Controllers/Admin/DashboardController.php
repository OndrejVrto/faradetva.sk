<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Admin;

use App\Models\StaticPage;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __invoke(): View  {
        $pages = StaticPage::query()
            ->select([
                'title',
                'url',
                'check_url'
            ])
            ->orderBy('slug')
            ->get();

        return view('admin.dashboard.index', compact('pages'));
    }
}
