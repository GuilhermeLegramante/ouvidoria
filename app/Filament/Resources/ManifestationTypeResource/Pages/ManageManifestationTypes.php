<?php

namespace App\Filament\Resources\ManifestationTypeResource\Pages;

use App\Filament\Resources\ManifestationTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageManifestationTypes extends ManageRecords
{
    protected static string $resource = ManifestationTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
