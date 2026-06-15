<?php

namespace App\Filament\Concerns;

trait PreservesExternalImageOnSave
{
    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (empty($data['image']) && $this->record?->image) {
            $data['image'] = $this->record->image;
        }

        return $data;
    }
}
