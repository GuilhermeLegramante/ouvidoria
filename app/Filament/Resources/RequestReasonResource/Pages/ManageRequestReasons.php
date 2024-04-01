<?php

namespace App\Filament\Resources\RequestReasonResource\Pages;

use App\Filament\Resources\RequestReasonResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageRequestReasons extends ManageRecords
{
    protected static string $resource = RequestReasonResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
