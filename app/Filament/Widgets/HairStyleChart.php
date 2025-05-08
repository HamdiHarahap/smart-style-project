<?php

namespace App\Filament\Widgets;

use App\Models\Report;
use Filament\Widgets\ChartWidget;

class HairStyleChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {

        $hairstyleCounts = Report::with('rule.hairStyle')
            ->get()
            ->groupBy(fn ($report) => optional($report->rule->hairStyle)->nama)
            ->map(fn ($group) => $group->count());

        return [
            'datasets' => [
                [
                    'label' => 'Most Frequent Hairstyles',
                    'data' => array_values($hairstyleCounts->toArray()),
                ],
            ],
            'labels' => array_keys($hairstyleCounts->toArray()),
        ];
    }


    protected function getType(): string
    {
        return 'line';
    }
}
