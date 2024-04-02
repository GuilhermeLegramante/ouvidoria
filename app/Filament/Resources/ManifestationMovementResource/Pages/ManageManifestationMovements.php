<?php

namespace App\Filament\Resources\ManifestationMovementResource\Pages;

use App\Filament\Resources\ManifestationMovementResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageManifestationMovements extends ManageRecords
{
    protected static string $resource = ManifestationMovementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
