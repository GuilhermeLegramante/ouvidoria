<?php

namespace App\Filament\Resources\ManifestationResource\Pages;

use App\Filament\Resources\ManifestationResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageManifestations extends ManageRecords
{
    protected static string $resource = ManifestationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
