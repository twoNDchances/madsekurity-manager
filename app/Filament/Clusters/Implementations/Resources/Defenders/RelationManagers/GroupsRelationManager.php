<?php

namespace App\Filament\Clusters\Implementations\Resources\Defenders\RelationManagers;

use App\Filament\Clusters\Initializations\Resources\Groups\GroupResource;
use App\Filament\Clusters\Initializations\Resources\Groups\Tables\GroupsTable;
use App\Filament\Components\Forms\DefenderForm\DefenderAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class GroupsRelationManager extends RelationManager
{
    use DefenderAction;

    protected static string $relationship = 'groups';

    protected static ?string $relatedResource = GroupResource::class;

    public function table(Table $table): Table
    {
        return $table
        ->headerActions(GroupsTable::relationManagerHeaderActionGroup())
        ->recordActions(GroupsTable::relationManagerRecordActionGroup(more: [self::applyAction(), self::revokeAction()]))
        ->toolbarActions(GroupsTable::relationManagerToolbarActionGroup(more: [self::bulkApplyAction(), self::bulkRevokeAction()]))
        ->reorderable('order');
    }
}
