<?php declare(strict_types=1);

namespace App\Services\Health;

use Illuminate\Support\Str;
use Spatie\Health\Checks\Result;
use Illuminate\Support\Collection;
use Spatie\Health\ResultStores\ResultStore;
use Spatie\Health\Models\HealthCheckResultHistoryItem;
use Spatie\Health\Exceptions\CouldNotSaveResultsInStore;
use Spatie\Health\ResultStores\EloquentHealthResultStore;
use Spatie\Health\ResultStores\StoredCheckResults\StoredCheckResult;
use Spatie\Health\ResultStores\StoredCheckResults\StoredCheckResults;

class CustomEloquentHealthResultStore implements ResultStore {
    public static function determineHistoryItemModel(): string {
        $defaultHistoryClass = HealthCheckResultHistoryItem::class;
        $eloquentResultStore = EloquentHealthResultStore::class;

        $historyItemModel = config("health.result_stores.{$eloquentResultStore}.model", $defaultHistoryClass);

        if (! is_a($historyItemModel, $defaultHistoryClass, true)) {
            throw CouldNotSaveResultsInStore::doesNotExtendHealthCheckResultHistoryItem($historyItemModel);
        }

        return $historyItemModel;
    }

    public static function getHistoryItemInstance(): HealthCheckResultHistoryItem {
        $historyItemClassName = static::determineHistoryItemModel();

        return new $historyItemClassName();
    }

    /** @param Collection<int, Result> $checkResults */
    public function save(Collection $checkResults): void {
        $batch = Str::uuid();
        $checkResults->each(function (Result $result) use ($batch) {
            (static::determineHistoryItemModel())::create([
                'check_name' => $result->check->getName(),
                'check_label' => $result->check->getLabel(),
                'status' => $result->status,
                'notification_message' => $result->notificationMessage,
                'short_summary' => $this->getTranslatadedShortSummary($result->shortSummary, strval($result->status)),
                'meta' => $result->meta,
                'batch' => $batch,
                'ended_at' => $result->ended_at,
            ]);
        });
    }

    public function latestResults(): ?StoredCheckResults {
        if (! $latestItem = (static::determineHistoryItemModel())::latest()->first()) {
            return null;
        }

        /** @var Collection<int, StoredCheckResult> $storedCheckResults */
        $storedCheckResults = (static::determineHistoryItemModel())::query()
            ->where('batch', $latestItem->batch)
            ->get()
            ->map(fn (HealthCheckResultHistoryItem $historyItem) => new StoredCheckResult(
                name: $historyItem->check_name,
                label: $historyItem->check_label,
                notificationMessage: $historyItem->notification_message,
                shortSummary: $historyItem->short_summary,
                status: $historyItem->status,
                meta: $historyItem->meta + ['eol' => '<br>'],
            ));

        return new StoredCheckResults(
            finishedAt: $latestItem->created_at,
            checkResults: $storedCheckResults,
        );
    }

    private function getTranslatadedShortSummary(string $shortSummary, string $status): string {
        return empty($shortSummary) ? "health-results.".Str::lower($status) : $shortSummary;
    }
}
