<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Spatie\Health\Health;
use Illuminate\View\View;
use App\Models\StaticPage;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Spatie\Health\ResultStores\ResultStore;
use Spatie\Health\Commands\RunHealthChecksCommand;

class DashboardController extends Controller
{
    public function __invoke(Request $request, ResultStore $resultStore, Health $health): JsonResponse|View {

        if ($request->has('fresh')) {
            Artisan::call(RunHealthChecksCommand::class);
        }

        $checkResults = $resultStore->latestResults();

        return view('admin.dashboard.index', [
            'lastRanAt'    => new Carbon($checkResults?->finishedAt),
            'checkResults' => $checkResults,
            'pages'        => StaticPage::query()
                                ->select(['title', 'url', 'check_url'])
                                ->orderBy('slug')
                                ->get(),
        ]);
    }
}
