<?php

namespace App\Filament\Clusters\Configurations;

use BackedEnum;
use Filament\Clusters\Cluster;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

class ConfigurationsCluster extends Cluster
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedEllipsisHorizontalCircle;

    protected static string|UnitEnum|null $navigationGroup = 'Others';
}
