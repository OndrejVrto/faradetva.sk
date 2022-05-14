<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Web;

use App\Models\StaticPage;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class ListPagesController extends Controller
{
    public function __invoke(Request $request): View {

        $pages = StaticPage::query()->orderBy('url')->get();

        return view('web.list-all-pages.index', compact('pages'));
    }
}
