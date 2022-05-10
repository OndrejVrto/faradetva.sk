<?php

namespace App\Services\Health\Checks;

use Spatie\Regex\Regex;
use Illuminate\Support\Arr;
use Spatie\Health\Checks\Check;
use Spatie\Health\Checks\Result;
use Symfony\Component\Process\Process;

class CustomUsedDiskSpaceCheck extends Check
{
    protected int $warningThreshold = 70;
    protected int $errorThreshold = 90;

    protected int $totalDiskSpace;
    protected int $usedDiskSpace;
    protected int $freeDiskSpace;

    public function warnWhenUsedSpaceIsAbovePercentage(int $percentage): self {
        $this->warningThreshold = $percentage;
        return $this;
    }

    public function failWhenUsedSpaceIsAbovePercentage(int $percentage): self {
        $this->errorThreshold = $percentage;
        return $this;
    }

    public function run(): Result {
        $this->label('health-results.disk_space.label');
        $diskSpaceUsedPercentage = $this->getDiskUsagePercentage();

        $result = Result::make()
            ->meta([
                'diskSpaceUsedPercentage' => $diskSpaceUsedPercentage,
                'totalDiskSpace' => formatBytes($this->totalDiskSpace),
                'usedDiskSpace' => formatBytes($this->usedDiskSpace),
                'freeDiskSpace' => formatBytes($this->freeDiskSpace),
            ])
            ->shortSummary('health-results.disk_space.short');

        if ($diskSpaceUsedPercentage > $this->errorThreshold) {
            return $result->failed('health-results.disk_space.failed');
        }

        if ($diskSpaceUsedPercentage > $this->warningThreshold) {
            return $result->warning('health-results.disk_space.warning');
        }

        return $result->ok('health-results.disk_space.ok');
    }

    protected function getDiskUsagePercentage(): int {
        $process = Process::fromShellCommandline('df -P .');
        $process->run();
        $output = $process->getOutput();
        $this->setSizes($output);
        return (int) Regex::match('/(\d*)%/', $output)->group(1);
    }

    private function setSizes(string $input): void {
        preg_match_all('/(\d*)/', $input, $output_array);
        $data = collect($output_array[0])->filter()->values();
        $this->totalDiskSpace = (int) $data->get(1) * 1024;
        $this->usedDiskSpace = (int) $data->get(2) * 1024;
        $this->freeDiskSpace = (int) $data->get(3) * 1024;
    }
}
