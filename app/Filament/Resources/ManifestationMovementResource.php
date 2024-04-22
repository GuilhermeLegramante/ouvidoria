<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ManifestationMovementResource\Pages;
use App\Filament\Resources\ManifestationMovementResource\RelationManagers;
use App\Models\ManifestationMovement;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ManifestationMovementResource extends Resource
{
    protected static ?string $model = ManifestationMovement::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $recordTitleAttribute = 'description';

    protected static ?string $modelLabel = 'movimento da manifestação';

    protected static ?string $pluralModelLabel = 'movimento da manifestação';

    protected static ?string $navigationGroup = 'Parâmetros';

    protected static ?string $slug = 'movimentos-da-manifestação';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('current_manifestation_status_id')
                    ->label(__('fields.status'))
                    ->preload()
                    ->relationship(name: 'currentStatus', titleAttribute: 'name')
                    ->columnSpanFull(),
                TextInput::make('description')
                    ->label(__('fields.description'))
                    ->columnSpanFull()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('previousStatus.name')
                    ->label('Status Anterior')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('currentStatus.name')
                    ->label('Status Atual')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('description')
                    ->label('Descrição')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('fields.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__('fields.updated_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ManageManifestationMovements::route('/'),
        ];
    }
}
