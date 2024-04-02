<?php

namespace App\Filament\Resources;

use App\Filament\Forms\DefaultForm;
use App\Filament\Resources\ManifestationResource\Pages;
use App\Filament\Resources\ManifestationResource\RelationManagers;
use App\Models\Manifestation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ManifestationResource extends Resource
{
    protected static ?string $model = Manifestation::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $recordTitleAttribute = 'protocol_number';

    protected static ?string $modelLabel = 'manifestação';

    protected static ?string $pluralModelLabel = 'manifestações';

    protected static ?string $slug = 'manifestacoes';

    public static function form(Form $form): Form
    {
        dd($form->fill()->model->id);

        return $form
            ->schema(DefaultForm::form());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('protocol_number')
                    ->label(__('fields.protocol_number'))
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageManifestations::route('/'),
            'view' => Pages\ViewManifestation::route('/{record}')
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }
}
