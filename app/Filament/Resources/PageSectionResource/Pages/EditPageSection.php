<?php

namespace App\Filament\Resources\PageSectionResource\Pages;

use App\Filament\Concerns\PreservesExternalImageOnSave;
use App\Filament\Resources\PageSectionResource;
use Filament\Resources\Pages\EditRecord;

class EditPageSection extends EditRecord
{
    use PreservesExternalImageOnSave;
    protected static string $resource = PageSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
