<?php

declare(strict_types=1);

namespace App\Services\Health\Checks;

use Exception;
use Spatie\Regex\Regex;
use Spatie\Health\Checks\Check;
use Spatie\Health\Enums\Status;
use Spatie\Health\Checks\Result;
use Symfony\Component\Process\Process;

class UsedDiskSpaceCheck extends Check {
    protected int $warningThreshold = 70;
    protected int $errorThreshold = 90;

    protected int|float $totalDiskSpace;
    protected int|float $usedDiskSpace;
    protected int|float $freeDiskSpace;

    public function warnWhenUsedSpaceIsAbovePercentage(int $percentage): self {
        $this->warningThreshold = $percentage;
        return $this;
    }

    public function failWhenUsedSpaceIsAbovePercentage(int $percentage): self {
        $this->errorThreshold = $percentage;
        return $this;
    }

    public function run(): Result {
        $name = 'health-results.disk_space';
        $this->label("$name.label");

        $diskSpaceUsedPercentage = $this->getDiskUsagePercentage();

        if ($diskSpaceUsedPercentage instanceof Exception) {
            return new Result(Status::crashed(), "$name.crashed", 'health-results.crashed');
        }

        $result = Result::make()
            ->meta([
                'diskSpaceUsedPercentage' => $diskSpaceUsedPercentage,
                'totalDiskSpace' => formatBytes($this->totalDiskSpace),
                'usedDiskSpace' => formatBytes($this->usedDiskSpace),
                'freeDiskSpace' => formatBytes($this->freeDiskSpace),
            ])
            ->shortSummary("$name.short");

        if ($diskSpaceUsedPercentage > $this->errorThreshold) {
            return $result->failed("$name.failed");
        }

        if ($diskSpaceUsedPercentage > $this->warningThreshold) {
            return $result->warning("$name.warning");
        }

        return $result->notificationMessage("$name.ok")->ok();
    }

    protected function getDiskUsagePercentage(): int|Exception {
        try {
            $process = Process::fromShellCommandline('df -P .');
            $process->run();
            $output = $process->getOutput();
        } catch (\Throwable $th) {
            try {
                $drive = '.';
                $this->freeDiskSpace  = disk_free_space($drive);
                $this->totalDiskSpace = disk_total_space($drive);
                $this->usedDiskSpace  = $this->freeDiskSpace ? $this->totalDiskSpace - $this->freeDiskSpace : 0;
            } catch (\Throwable $th) {
                return new Exception('Error loading free disk space.');
            }
            return $this->freeDiskSpace ? 100 - (round($this->freeDiskSpace / $this->totalDiskSpace, 2) * 100) : 0;
        }
        $this->setSizes($output);
        return (int) Regex::match('/(\d*)%/', $output)->group(1);
    }

    private function setSizes(string $input): void {
        preg_match_all('/(\d*)/', $input, $output_array);
        $data = array_values(
            array_filter(
                array: $output_array[0],
                callback: fn ($val) => !empty($val),
                mode: ARRAY_FILTER_USE_BOTH
            )
        );
        $this->totalDiskSpace = intval($data[1]) * 1024;
        $this->usedDiskSpace  = intval($data[2]) * 1024;
        $this->freeDiskSpace  = intval($data[3]) * 1024;
    }
}
