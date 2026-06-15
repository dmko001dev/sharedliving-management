<?php

namespace App\Filament\Resources\GallerySlideResource\Pages;

use App\Filament\Concerns\PreservesExternalImageOnSave;
use App\Filament\Resources\GallerySlideResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGallerySlide extends EditRecord
{
    use PreservesExternalImageOnSave;
    protected static string $resource = GallerySlideResource::class;

    protected function getHeaderActions(): array
    {
        return [Actions\DeleteAction::make()];
    }
}
