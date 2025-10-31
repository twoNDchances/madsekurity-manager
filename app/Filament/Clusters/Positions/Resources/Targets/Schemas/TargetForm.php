<?php

namespace App\Filament\Clusters\Positions\Resources\Targets\Schemas;

use App\Filament\Components\Forms\TargetForm\TargetForm as Form;
use Filament\Schemas\Schema;

class TargetForm
{
    use Form;

    public static function configure(Schema $schema): Schema
    {
        return $schema
        ->components(self::main());
    }

    public static function main()
    {
        return [];
    }
}
