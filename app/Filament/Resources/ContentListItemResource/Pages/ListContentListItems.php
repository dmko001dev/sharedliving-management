<?php

namespace App\Filament\Resources\ContentListItemResource\Pages;

use App\Filament\Resources\ContentListItemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListContentListItems extends ListRecords
{
    protected static string $resource = ContentListItemResource::class;

    protected function getHeaderActions(): array
    {
        return [Actions\CreateAction::make()];
    }
}
