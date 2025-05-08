<?php

namespace App\Filament\Widgets;

use App\Models\Activity;
use App\Models\FaceShape;
use App\Models\HairStyle;
use App\Models\HairType;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsDashboard extends BaseWidget
{
    protected function getStats(): array
    {
        $countHairType = HairType::count();
        $countFaceShape = FaceShape::count();
        $countActivitiy = Activity::count();
        $countHairStyle= HairStyle::count();
        return [
            Stat::make('Hair Types', $countHairType . ' Types'),
            Stat::make('Face Shapes', $countFaceShape . ' Shapes'),
            Stat::make('Activities ', $countActivitiy . ' Activities'),
            Stat::make('Hair Styles', $countHairStyle . ' Styles'),
        ];
    }
}
