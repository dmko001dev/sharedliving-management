<?php

namespace App\Filament\Resources\GallerySlideResource\Pages;

use App\Filament\Resources\GallerySlideResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGallerySlides extends ListRecords
{
    protected static string $resource = GallerySlideResource::class;

    protected function getHeaderActions(): array
    {
        return [Actions\CreateAction::make()];
    }
}
