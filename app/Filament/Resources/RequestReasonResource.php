<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RequestReasonResource\Pages;
use App\Filament\Resources\RequestReasonResource\RelationManagers;
use App\Models\RequestReason;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RequestReasonResource extends Resource
{
    protected static ?string $model = RequestReason::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $recordTitleAttribute = 'description';

    protected static ?string $modelLabel = 'motivo da solicitação';

    protected static ?string $pluralModelLabel = 'motivos da solicitacao';

    protected static ?string $navigationGroup = 'Parâmetros';

    protected static ?string $slug = 'motivos-da-solicitacao';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('description')
                    ->label(__('fields.description'))
                    ->afterStateUpdated(function (TextInput $component, string $state) {
                        $component->state(mb_strtoupper($state));
                    })
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('description')
                    ->label(__('fields.description'))
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
            'index' => Pages\ManageRequestReasons::route('/'),
        ];
    }
}
