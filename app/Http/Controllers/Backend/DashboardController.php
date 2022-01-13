<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __invoke() {
        return view('backend.dashboard.index');
    }
}
