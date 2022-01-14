<?php

namespace App\Http\Controllers\Backend;

use App\Models\StaticPage;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __invoke() {
        $pages = StaticPage::select('title', 'url')->get();

        return view('backend.dashboard.index', compact('pages'));
    }
}
