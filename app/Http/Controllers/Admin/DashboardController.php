<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\View\View;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Redirect;
use Spatie\Health\ResultStores\ResultStore;
use Spatie\Health\Commands\RunHealthChecksCommand;
use App\Services\Dashboard\SettingsSwitcherService;

class DashboardController extends Controller
{
    public function index(Request $request, ResultStore $resultStore): JsonResponse|View {
        $checkResults = $resultStore->latestResults();

        return view('admin.dashboard.index', [
            'lastRanAt'    => new Carbon($checkResults?->finishedAt),
            'checkResults' => $checkResults,
        ]);
    }

    public function fresh(): RedirectResponse {
        Artisan::call(RunHealthChecksCommand::class);

        toastr()->success('Stav aplikácie aktualizovaný.');
        return to_route('admin.dashboard');
    }

    public function maintenance(Request $request): RedirectResponse {
        $service = $this->runSwitcher($request);

        toastr()->success('Prostredie nastavené.');
        return $service->secretKey
            ? Redirect::to(route('home')."/$service->secretKey")
            : to_route('admin.dashboard');
    }

    public function settings(Request $request): RedirectResponse {
        $this->runSwitcher($request);

        toastr()->success('Nastavenia uložené.');
        return to_route('admin.dashboard');
    }


    private function runSwitcher(Request $request) {
        $service= new SettingsSwitcherService();

        foreach($request->all() as $key => $attribute){
            // convert all attributes to boolean
            $validated[$key] = filter_var($attribute, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
        }
        $validated = Arr::except($validated, ['_method', '_token']);

        $switcher = new $service();

        foreach ($validated as $key => $value) {
            if (method_exists($switcher, $key)){
                $switcher->$key($value);
            }
        }

        return $switcher;
    }
}
