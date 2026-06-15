<?php

namespace App\Filament\Resources\ServiceAudienceCardResource\Pages;

use App\Filament\Resources\ServiceAudienceCardResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListServiceAudienceCards extends ListRecords
{
    protected static string $resource = ServiceAudienceCardResource::class;

    protected function getHeaderActions(): array
    {
        return [Actions\CreateAction::make()];
    }
}
