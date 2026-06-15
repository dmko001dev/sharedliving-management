<?php

namespace App\Filament\Resources\ServiceAudienceCardResource\Pages;

use App\Filament\Resources\ServiceAudienceCardResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditServiceAudienceCard extends EditRecord
{
    protected static string $resource = ServiceAudienceCardResource::class;

    protected function getHeaderActions(): array
    {
        return [Actions\DeleteAction::make()];
    }
}
