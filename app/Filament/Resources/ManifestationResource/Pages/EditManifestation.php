<?php

namespace App\Filament\Resources\ManifestationResource\Pages;

use App\Filament\Resources\ManifestationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Str;

class EditManifestation extends EditRecord
{
    protected static string $resource = ManifestationResource::class;

    protected static ?string $navigationLabel = 'Editar Manifestação';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
