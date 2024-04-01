<?php

namespace App\Filament\Resources\ManifestationStatusResource\Pages;

use App\Filament\Resources\ManifestationStatusResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageManifestationStatuses extends ManageRecords
{
    protected static string $resource = ManifestationStatusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
